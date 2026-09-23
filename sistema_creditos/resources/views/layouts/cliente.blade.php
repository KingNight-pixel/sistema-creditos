<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Sistema de Créditos')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

<header class="cliente-header">

    <div class="cliente-logo">
        CRÉDITOS<span>+</span>
    </div>

    <nav class="cliente-menu">

        <a href="{{ route('cliente.dashboard') }}">
            Inicio
        </a>

        <a href="{{ route('cliente.solicitar') }}">
            Solicitar crédito
        </a>

        <a href="{{ route('cliente.creditos') }}">
            Consultar mi crédito
        </a>

        <a href="{{ route('cliente.facturas') }}">
            Facturas
        </a>

        <a href="{{ route('cliente.pagos') }}">
            Historial de pagos
        </a>

        <a href="{{ route('cliente.perfil') }}">
            Mis datos
        </a>

        <a href="{{ route('cliente.dashboard') }}" class="btn-salir">
            Salir
        </a>

    </nav>

</header>


<main class="cliente-contenido">

    @yield('content')

</main>

</body>

</html>