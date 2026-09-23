<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;
use App\Models\Credito;
use App\Models\Solicitud;
use App\Models\Pago;

class ClientePortalController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PANEL PRINCIPAL DEL CLIENTE
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {
        $user = Auth::user();

        $cliente = Cliente::where('user_id', $user->id)->first();

        $creditos = $cliente
            ? Credito::where('cliente_id', $cliente->id)
                ->latest()
                ->get()
            : collect();

        return view('cliente.dashboard', [
            'cliente' => $cliente,
            'creditos' => $creditos,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | MOSTRAR FORMULARIO DE SOLICITUD
    |--------------------------------------------------------------------------
    */

    public function solicitar()
    {
        return view('cliente.solicitar');
    }


    /*
    |--------------------------------------------------------------------------
    | GUARDAR SOLICITUD DE CRÉDITO
    |--------------------------------------------------------------------------
    */

    public function guardarSolicitud(Request $request)
    {
        $data = $request->validate([
            'monto' => [
                'required',
                'numeric',
                'min:1',
            ],

            'plazo' => [
                'required',
                'integer',
                'min:1',
            ],

            'motivo' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);

        Solicitud::create([
            'user_id' => Auth::id(),
            'monto' => $data['monto'],
            'plazo' => $data['plazo'],
            'motivo' => $data['motivo'] ?? null,
            'estado' => 'pendiente',
        ]);

        return redirect()
            ->route('cliente.dashboard')
            ->with('success', 'Solicitud enviada correctamente.');
    }


    /*
    |--------------------------------------------------------------------------
    | CONSULTAR MIS CRÉDITOS
    |--------------------------------------------------------------------------
    */

    public function creditos()
    {
        $user = Auth::user();

        $cliente = Cliente::where('user_id', $user->id)->first();

        $creditos = $cliente
            ? Credito::where('cliente_id', $cliente->id)
                ->latest()
                ->get()
            : collect();

        return view('cliente.creditos', [
            'cliente' => $cliente,
            'creditos' => $creditos,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | VER DETALLE DE UN CRÉDITO
    |--------------------------------------------------------------------------
    */

    public function creditoShow(Credito $credito)
    {
        $user = Auth::user();

        $cliente = Cliente::where('user_id', $user->id)->first();

        abort_if(
            !$cliente || $credito->cliente_id !== $cliente->id,
            403,
            'No tienes permiso para ver este crédito.'
        );

        return view('cliente.credito-detalle', [
            'cliente' => $cliente,
            'credito' => $credito,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | CONSULTAR FACTURAS
    |--------------------------------------------------------------------------
    */

    public function facturas()
    {
        $user = Auth::user();

        $cliente = Cliente::where('user_id', $user->id)->first();

        $creditos = $cliente
            ? Credito::where('cliente_id', $cliente->id)
                ->latest()
                ->get()
            : collect();

        return view('cliente.facturas', [
            'cliente' => $cliente,
            'creditos' => $creditos,
            'facturas' => $creditos,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | VER DETALLE DE UNA FACTURA
    |--------------------------------------------------------------------------
    */

    public function facturaShow(Credito $factura)
    {
        $user = Auth::user();

        $cliente = Cliente::where('user_id', $user->id)->first();

        abort_if(
            !$cliente || $factura->cliente_id !== $cliente->id,
            403,
            'No tienes permiso para ver esta factura.'
        );

        return view('cliente.factura-detalle', [
            'cliente' => $cliente,
            'factura' => $factura,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | CONSULTAR MIS PAGOS
    |--------------------------------------------------------------------------
    */

    public function pagos()
    {
        $user = Auth::user();

        $cliente = Cliente::where('user_id', $user->id)->first();

        $pagos = collect();

        if ($cliente) {
            $pagos = Pago::whereHas('credito', function ($query) use ($cliente) {
                $query->where('cliente_id', $cliente->id);
            })
            ->latest()
            ->get();
        }

        return view('cliente.pagos', [
            'cliente' => $cliente,
            'pagos' => $pagos,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | PERFIL DEL CLIENTE
    |--------------------------------------------------------------------------
    */

    public function perfil()
    {
        $user = Auth::user();

        // Busca al cliente relacionado con el usuario.
        $cliente = Cliente::where('user_id', $user->id)->first();

        // Si todavía no está relacionado, busca por el correo.
        if (!$cliente && !empty($user->email)) {
            $cliente = Cliente::where('correo', $user->email)->first();
        }

        // Si encontró al cliente por correo, conecta la cuenta.
        if ($cliente && empty($cliente->user_id)) {
            $cliente->user_id = $user->id;
            $cliente->save();
        }

        return view('cliente.perfil', [
            'user' => $user,
            'cliente' => $cliente,
        ]);
    }
}

