
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $titulo }} | Crédito</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen">

<div class="flex min-h-screen">

    <!-- MENÚ LATERAL -->
    <aside class="w-64 bg-blue-950 text-white p-5 hidden md:block">

        <h1 class="text-3xl font-bold mb-2">
            Crédito
        </h1>

        <p class="text-blue-300 text-sm mb-8">
            Sistema de Créditos
        </p>

        @if($tipo === 'admin')

            <p class="text-blue-300 text-xs mb-3">
                ADMINISTRADOR
            </p>

            <nav class="space-y-2">

                <a href="{{ route('admin.dashboard') }}"
                   class="block px-4 py-3 rounded-lg hover:bg-blue-800">
                    🏠 Dashboard
                </a>

                <a href="{{ route('admin.clientes') }}"
                   class="block px-4 py-3 rounded-lg hover:bg-blue-800">
                    👥 Clientes
                </a>

                <a href="{{ route('admin.solicitudes') }}"
                   class="block px-4 py-3 rounded-lg hover:bg-blue-800">
                    📄 Solicitudes
                </a>

                <a href="{{ route('admin.creditos') }}"
                   class="block px-4 py-3 rounded-lg hover:bg-blue-800">
                    💰 Créditos
                </a>

                <a href="{{ route('admin.pagos') }}"
                   class="block px-4 py-3 rounded-lg hover:bg-blue-800">
                    💳 Pagos
                </a>

                <a href="{{ route('admin.cobranza') }}"
                   class="block px-4 py-3 rounded-lg hover:bg-blue-800">
                    📊 Cobranza y Reportes
                </a>

                <a href="{{ route('admin.portal.cliente') }}"
                   class="block px-4 py-3 rounded-lg bg-blue-700 hover:bg-blue-600">
                    👤 Portal Cliente
                </a>

            </nav>

        @else

            <p class="text-blue-300 text-xs mb-3">
                CLIENTE
            </p>

            <nav class="space-y-2">

                <a href="{{ route('cliente.dashboard') }}"
                   class="block px-4 py-3 rounded-lg hover:bg-blue-800">
                    🏠 Inicio
                </a>

                <a href="{{ route('cliente.solicitar') }}"
                   class="block px-4 py-3 rounded-lg hover:bg-blue-800">
                    📝 Solicitar Crédito
                </a>

                <a href="{{ route('cliente.creditos') }}"
                   class="block px-4 py-3 rounded-lg hover:bg-blue-800">
                    💰 Mis Créditos
                </a>

                <a href="{{ route('cliente.pagos') }}"
                   class="block px-4 py-3 rounded-lg hover:bg-blue-800">
                    💳 Mis Pagos
                </a>

                <a href="{{ route('cliente.facturas') }}"
                   class="block px-4 py-3 rounded-lg hover:bg-blue-800">
                    🧾 Facturas
                </a>

                <a href="{{ route('cliente.perfil') }}"
                   class="block px-4 py-3 rounded-lg hover:bg-blue-800">
                    👤 Mi Perfil
                </a>

            </nav>

        @endif

        <form method="POST"
              action="{{ route('logout') }}"
              class="mt-8">

            @csrf

            <button type="submit"
                    class="w-full bg-red-700 hover:bg-red-600 px-4 py-3 rounded-lg text-left">
                🚪 Cerrar Sesión
            </button>

        </form>

    </aside>

    <!-- CONTENIDO -->
    <main class="flex-1">

        <header class="bg-white shadow px-6 py-5">

            <h2 class="text-2xl font-bold text-blue-950">
                {{ $titulo }}
            </h2>

            <p class="text-gray-500 mt-1">
                {{ $descripcion }}
            </p>

        </header>

        <section class="p-6">

            <div class="bg-white rounded-2xl shadow p-6">

                <h1 class="text-2xl font-bold text-blue-950 mb-3">
                    {{ $titulo }}
                </h1>

                <p class="text-gray-600 mb-6">
                    {{ $descripcion }}
                </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                    <div class="bg-blue-950 text-white rounded-xl p-5">
                        <p class="text-blue-200 text-sm">
                            Estado
                        </p>

                        <h3 class="text-xl font-bold mt-2">
                            Sistema activo
                        </h3>
                    </div>

                    <div class="bg-blue-50 rounded-xl p-5">
                        <p class="text-blue-700 text-sm">
                            Área
                        </p>

                        <h3 class="text-xl font-bold text-blue-950 mt-2">
                            {{ ucfirst($tipo) }}
                        </h3>
                    </div>

                    <div class="bg-slate-100 rounded-xl p-5">
                        <p class="text-gray-500 text-sm">
                            Acceso
                        </p>

                        <h3 class="text-xl font-bold text-blue-950 mt-2">
                            Autorizado
                        </h3>
                    </div>

                </div>

                <div class="mt-8">

                    <a href="{{ $tipo === 'admin'
                        ? route('admin.dashboard')
                        : route('cliente.dashboard') }}"
                       class="inline-block bg-blue-800 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

                        ← Volver al inicio

                    </a>

                </div>

            </div>

        </section>

    </main>

</div>

</body>
</html>