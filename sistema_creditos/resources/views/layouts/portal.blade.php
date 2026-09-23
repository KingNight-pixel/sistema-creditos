<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Créditos')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0b1e3a] text-white min-h-screen">

    {{-- Barra superior --}}
    <nav class="bg-[#12294d] border-b border-blue-900/50 px-6 py-3 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="bg-blue-600 rounded-lg p-2">🏛️</div>
            <span class="font-bold text-lg">Crédito</span>
        </div>
        <div class="flex items-center gap-4 text-sm">
            <span class="text-blue-300">Bienvenido, {{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-600 hover:bg-red-700 px-4 py-1.5 rounded-lg transition">
                    Cerrar Sesión
                </button>
            </form>
        </div>
    </nav>

    <div class="flex">
        {{-- Menú lateral --}}
        <aside class="w-56 bg-[#0e2342] min-h-screen p-4 space-y-1">
            @yield('menu')
        </aside>

        {{-- Contenido --}}
        <main class="flex-1 p-8">
            @if(session('success'))
                <div class="bg-green-600/20 border border-green-500 text-green-300 px-4 py-3 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>