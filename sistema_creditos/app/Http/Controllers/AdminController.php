<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cliente;
use App\Models\Credito;
use App\Models\Pago;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'totalClientes' => Cliente::count(),
            'creditosActivos' => Credito::where('estado', 'activo')->count(),
            'creditosVencidos' => Credito::where('estado', 'vencido')->count(),
            'totalOtorgado' => Credito::sum('monto'),
        ]);
    }

    public function clientes() { return view('admin.clientes.index', ['clientes' => Cliente::latest()->paginate(15)]); }
    public function clienteCreate() { return view('admin.clientes.create'); }

    public function clienteStore(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required','string','max:100'],
            'dui' => ['required','string','max:50','unique:clientes,documento_identidad'],
            'telefono' => ['nullable','string','max:20'],
            'email' => ['nullable','email','max:100'],
            'direccion' => ['nullable','string'],
        ]);

        $partes = preg_split('/\s+/', trim($data['nombre']), 2);
        Cliente::create([
            'nombres' => $partes[0],
            'apellidos' => $partes[1] ?? '',
            'documento_identidad' => $data['dui'],
            'telefono' => $data['telefono'] ?? null,
            'correo' => $data['email'] ?? null,
            'direccion' => $data['direccion'] ?? null,
            'estado' => 'activo',
        ]);

        return redirect()->route('admin.clientes')->with('success', 'Cliente creado correctamente.');
    }

    public function clienteShow(Cliente $cliente) { $cliente->load('creditos'); return view('admin.clientes.show', compact('cliente')); }
    public function clienteEdit(Cliente $cliente) { return view('admin.clientes.edit', compact('cliente')); }

    public function clienteUpdate(Request $request, Cliente $cliente)
    {
        $data = $request->validate([
            'nombre' => ['required','string','max:200'],
            'dui' => ['required','string','max:50','unique:clientes,documento_identidad,'.$cliente->id],
            'telefono' => ['nullable','string','max:20'],
            'email' => ['nullable','email','max:100'],
            'direccion' => ['nullable','string'],
            'estado' => ['required','in:activo,inactivo'],
        ]);
        $partes = preg_split('/\s+/', trim($data['nombre']), 2);
        $cliente->update([
            'nombres' => $partes[0], 'apellidos' => $partes[1] ?? '',
            'documento_identidad' => $data['dui'], 'telefono' => $data['telefono'] ?? null,
            'correo' => $data['email'] ?? null, 'direccion' => $data['direccion'] ?? null,
            'estado' => $data['estado'],
        ]);
        return redirect()->route('admin.clientes')->with('success', 'Cliente actualizado correctamente.');
    }

    public function creditos() { $creditos = Credito::with('cliente')->latest()->paginate(15); return view('creditos.index', compact('creditos')); }

    public function creditoCreate() { $clientes = Cliente::where('estado','activo')->orderBy('nombres')->get(); return view('creditos.create', compact('clientes')); }

    public function creditoStore(Request $request)
    {
        $data = $request->validate([
            'cliente' => ['required','exists:clientes,id'],
            'monto' => ['required','numeric','min:0.01'],
            'interes' => ['required','numeric','min:0'],
            'plazo' => ['required','integer','min:1'],
            'cuotas' => ['required','integer','min:1'],
            'fecha_inicio' => ['required','date'],
            'fecha_vencimiento' => ['required','date','after_or_equal:fecha_inicio'],
        ]);
        $total = $data['monto'] + ($data['monto'] * $data['interes'] / 100);
        Credito::create([
            'cliente_id' => $data['cliente'], 'user_id' => optional(Cliente::find($data['cliente']))->user_id,
            'monto' => $data['monto'], 'interes' => $data['interes'], 'plazo' => $data['plazo'],
            'cuota' => $total / $data['cuotas'], 'saldo' => $total, 'estado' => 'activo',
            'fecha_inicio' => $data['fecha_inicio'], 'fecha_fin' => $data['fecha_vencimiento'],
        ]);
        return redirect()->route('admin.creditos')->with('success','Crédito creado correctamente.');
    }

    public function creditosActivos() { $creditos = Credito::where('estado','activo')->paginate(15); return view('creditos.activos', compact('creditos')); }
    public function creditosPagados() { $creditos = Credito::where('estado','pagado')->paginate(15); return view('creditos.pagados', compact('creditos')); }
    public function creditosVencidos() { $creditos = Credito::where('estado','vencido')->paginate(15); return view('creditos.vencidos', compact('creditos')); }
    public function creditoShow($credito) { $credito = Credito::with(['cliente','usuario'])->findOrFail($credito); return view('creditos.show', compact('credito')); }

    public function solicitudes() { $solicitudes = Solicitud::with('usuario')->latest()->get(); return view('admin.solicitudes', compact('solicitudes')); }
    public function solicitudShow($solicitud) { $solicitud = Solicitud::with('usuario')->findOrFail($solicitud); return view('admin.solicitud-show', compact('solicitud')); }
    public function aprobar($id) { Solicitud::findOrFail($id)->update(['estado'=>'aprobado']); return back()->with('success','Solicitud aprobada.'); }
    public function rechazar($id) { Solicitud::findOrFail($id)->update(['estado'=>'rechazado']); return back()->with('success','Solicitud rechazada.'); }

    public function pagos() { $pagos = Pago::with('credito.cliente')->latest()->paginate(15); return view('admin.pagos.index', compact('pagos')); }
    public function pagoCreate() { $creditos = Credito::with('cliente')->whereIn('estado',['activo','vencido'])->get(); return view('admin.pagos.create', compact('creditos')); }

    public function pagoStore(Request $request)
    {
        $data = $request->validate([
            'credito_id' => ['required','exists:creditos,id'],
            'monto' => ['required','numeric','min:0.01'],
            'fecha_pago' => ['required','date'],
            'metodo_pago' => ['required','string','max:50'],
            'referencia' => ['nullable','string','max:100'],
            'observaciones' => ['nullable','string'],
        ]);
        $credito = Credito::findOrFail($data['credito_id']);
        if ($data['monto'] > (float)$credito->saldo) return back()->withErrors(['monto'=>'El pago no puede ser mayor que el saldo.'])->withInput();
        Pago::create($data + ['user_id' => auth()->id()]);
        $credito->saldo = max(0, (float)$credito->saldo - (float)$data['monto']);
        if ((float)$credito->saldo === 0.0) $credito->estado = 'pagado';
        $credito->save();
        return redirect()->route('admin.pagos')->with('success','Pago registrado correctamente.');
    }

    public function comprobante($pago) { $pago = Pago::with('credito.cliente')->findOrFail($pago); return view('admin.pagos.comprobante', compact('pago')); }
    public function reportes() { return view('admin.reportes.index'); }
    public function usuarios() { $usuarios = User::latest()->paginate(15); return view('admin.usuarios.index', compact('usuarios')); }
    public function usuarioCreate() { return view('admin.usuarios.create'); }

    public function usuarioStore(Request $request)
    {
        $data = $request->validate(['name'=>'required|string|max:255','email'=>'required|email|unique:users,email','password'=>'required|string|min:8|confirmed','rol'=>'required|in:admin,cliente']);
        User::create(['name'=>$data['name'],'email'=>$data['email'],'password'=>Hash::make($data['password']),'rol'=>$data['rol']]);
        return redirect()->route('admin.usuarios')->with('success','Usuario creado correctamente.');
    }

    public function usuarioEdit(User $usuario) { return view('admin.usuarios.edit', compact('usuario')); }

    public function usuarioUpdate(Request $request, User $usuario)
    {
        $data = $request->validate(['rol'=>'required|in:admin,cliente']);
        $usuario->update(['rol'=>$data['rol']]);
        return redirect()->route('admin.usuarios')->with('success','Usuario actualizado correctamente.');
    }
}
