<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientePortalController;


/*
|--------------------------------------------------------------------------
| INICIO
|--------------------------------------------------------------------------
*/

Route::redirect('/', '/login');


/*
|--------------------------------------------------------------------------
| AUTENTICACIÓN
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', [
        AuthController::class,
        'showLogin'
    ])->name('login');

    Route::post('/login', [
        AuthController::class,
        'autenticar'
    ])->name('login.post');

    Route::get('/register', [
        AuthController::class,
        'showRegister'
    ])->name('register');

    Route::post('/register', [
        AuthController::class,
        'register'
    ])->name('register.store');

});


/*
|--------------------------------------------------------------------------
| CERRAR SESIÓN
|--------------------------------------------------------------------------
*/

Route::post('/logout', [
    AuthController::class,
    'logout'
])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| ADMINISTRADOR
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });

        Route::get('/dashboard', [
            AdminController::class,
            'dashboard'
        ])->name('dashboard');

        Route::get('/clientes', [
            AdminController::class,
            'clientes'
        ])->name('clientes');

        Route::get('/clientes/create', [
            AdminController::class,
            'clienteCreate'
        ])->name('clientes.create');

        Route::get('/clientes/{cliente}', [
            AdminController::class,
            'clienteShow'
        ])->name('clientes.show');

        Route::get('/clientes/{cliente}/edit', [AdminController::class, 'clienteEdit'])->name('clientes.edit');
        Route::post('/clientes', [AdminController::class, 'clienteStore'])->name('clientes.store');
        Route::put('/clientes/{cliente}', [AdminController::class, 'clienteUpdate'])->name('clientes.update');


        // CRÉDITOS

        Route::get('/creditos', [
            AdminController::class,
            'creditos'
        ])->name('creditos');

        Route::get('/creditos/create', [
            AdminController::class,
            'creditoCreate'
        ])->name('creditos.create');

        Route::get('/creditos/activos', [
            AdminController::class,
            'creditosActivos'
        ])->name('creditos.activos');

        Route::get('/creditos/pagados', [
            AdminController::class,
            'creditosPagados'
        ])->name('creditos.pagados');

        Route::get('/creditos/vencidos', [
            AdminController::class,
            'creditosVencidos'
        ])->name('creditos.vencidos');

        Route::get('/creditos/{credito}', [AdminController::class, 'creditoShow'])->name('creditos.show');
        Route::post('/creditos', [AdminController::class, 'creditoStore'])->name('creditos.store');


        // SOLICITUDES

        Route::get('/solicitudes', [
            AdminController::class,
            'solicitudes'
        ])->name('solicitudes');

        Route::get('/solicitudes/{solicitud}', [
            AdminController::class,
            'solicitudShow'
        ])->name('solicitudes.show');

        Route::post('/solicitudes/{id}/aprobar', [
            AdminController::class,
            'aprobar'
        ])->name('solicitudes.aprobar');

        Route::post('/solicitudes/{id}/rechazar', [
            AdminController::class,
            'rechazar'
        ])->name('solicitudes.rechazar');


        // PAGOS

        Route::get('/pagos', [
            AdminController::class,
            'pagos'
        ])->name('pagos');

        Route::get('/pagos/create', [
            AdminController::class,
            'pagoCreate'
        ])->name('pagos.create');

        Route::get('/pagos/{pago}/comprobante', [AdminController::class, 'comprobante'])->name('pagos.comprobante');
        Route::post('/pagos', [AdminController::class, 'pagoStore'])->name('pagos.store');


        // REPORTES Y COBRANZA

        Route::get('/reportes', [
            AdminController::class,
            'reportes'
        ])->name('reportes');

        Route::get('/cobranza', [
            AdminController::class,
            'reportes'
        ])->name('cobranza');


        // USUARIOS

        Route::get('/usuarios', [
            AdminController::class,
            'usuarios'
        ])->name('usuarios');

        Route::get('/usuarios/create', [
            AdminController::class,
            'usuarioCreate'
        ])->name('usuarios.create');

        Route::get('/usuarios/{usuario}/edit', [AdminController::class, 'usuarioEdit'])->name('usuarios.edit');
        Route::post('/usuarios', [AdminController::class, 'usuarioStore'])->name('usuarios.store');
        Route::put('/usuarios/{usuario}', [AdminController::class, 'usuarioUpdate'])->name('usuarios.update');


        // PASAR AL PORTAL CLIENTE

        Route::get('/portal/cliente', function () {
            return redirect()->route('cliente.dashboard');
        })->name('portal.cliente');

    });


/*
|--------------------------------------------------------------------------
| CLIENTE
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:cliente'])
    ->prefix('cliente')
    ->name('cliente.')
    ->group(function () {

        Route::get('/', function () {
            return redirect()->route('cliente.dashboard');
        });

        // INICIO

        Route::get('/dashboard', [
            ClientePortalController::class,
            'dashboard'
        ])->name('dashboard');


        // SOLICITAR CRÉDITO

        Route::get('/solicitar', [
            ClientePortalController::class,
            'solicitar'
        ])->name('solicitar');

        Route::post('/solicitar', [
            ClientePortalController::class,
            'guardarSolicitud'
        ])->name('solicitar.store');


        // CONSULTAR CRÉDITOS

        Route::get('/creditos', [
            ClientePortalController::class,
            'creditos'
        ])->name('creditos');

        Route::get('/creditos/{credito}', [
            ClientePortalController::class,
            'creditoShow'
        ])->name('creditos.show');


        // FACTURAS

        Route::get('/facturas', [
            ClientePortalController::class,
            'facturas'
        ])->name('facturas');

        Route::get('/facturas/{factura}', [
            ClientePortalController::class,
            'facturaShow'
        ])->name('facturas.show');


        // HISTORIAL DE PAGOS

        Route::get('/pagos', [
            ClientePortalController::class,
            'pagos'
        ])->name('pagos');


        // MIS DATOS

        Route::get('/perfil', [
            ClientePortalController::class,
            'perfil'
        ])->name('perfil');

    });



// ===============================
// REGISTRO DE ADMINISTRADOR
// ===============================

Route::middleware('guest')->group(function () {
Route::get('/admin/register', function () {
    return view('admin.register');
})->name('admin.register');

Route::post('/admin/register', function (Illuminate\Http\Request $request) {

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        'rol' => 'admin',
    ]);

    auth()->login($user);

    return redirect('/admin')
        ->with('success', 'Administrador creado correctamente.');
})->name('admin.register.post');
});

