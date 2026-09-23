
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Crédito</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-slate-900 text-slate-200 font-sans min-h-screen flex flex-col">

    <nav class="bg-slate-950 border-b border-slate-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                <div class="flex items-center gap-2">
                    <i class="fas fa-university text-blue-500 text-2xl"></i>

                    <a href="{{ url('/') }}"
                       class="text-xl font-bold text-white tracking-wider">
                        Crédito
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-1">
                    @auth

                        @if(Auth::user()->rol === 'admin')

                            <a href="{{ route('admin.dashboard') }}"
                               class="menu-link">Dashboard</a>

                            <a href="{{ route('admin.clientes') }}"
                               class="menu-link">Clientes</a>

                            <a href="{{ route('admin.solicitudes') }}"
                               class="menu-link">Solicitudes</a>

                            <a href="{{ route('admin.creditos') }}"
                               class="menu-link">Créditos</a>

                            <a href="{{ route('admin.pagos') }}"
                               class="menu-link">Pagos</a>

                            <a href="{{ route('admin.reportes') }}"
                               class="menu-link">Reportes</a>

                        @else

                            <a href="{{ route('cliente.dashboard') }}"
                               class="menu-link">Dashboard</a>

                            <a href="{{ route('cliente.solicitar') }}"
                               class="menu-link">Solicitar Crédito</a>

                            <a href="{{ route('cliente.creditos') }}"
                               class="menu-link">Mis Créditos</a>

                            <a href="{{ route('cliente.pagos') }}"
                               class="menu-link">Mis Pagos</a>

                            <a href="{{ route('cliente.facturas') }}"
                               class="menu-link">Facturas</a>

                            <a href="{{ route('cliente.perfil') }}"
                               class="menu-link">Mi Perfil</a>

                        @endif

                    @endauth
                </div>

                <div class="flex items-center gap-4">
                    @auth

                        <span class="text-sm text-slate-400 hidden sm:block">
                            <i class="fas fa-user-circle mr-1"></i>
                            {{ Auth::user()->name }}
                        </span>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit"
                                    class="text-sm text-red-400 hover:text-red-300 transition font-medium">
                                Cerrar Sesión
                            </button>
                        </form>

                    @endauth
                </div>

            </div>
        </div>
    </nav>

    <main class="flex-grow max-w-7xl mx-auto w-full p-4 sm:p-6 lg:p-8">
        @yield('content')
    </main>

    <footer class="bg-slate-950 border-t border-slate-800 py-4 text-center text-sm text-slate-500">
        Crédito &copy; {{ date('Y') }} - Todos los derechos reservados.
    </footer>

</body>
</html>