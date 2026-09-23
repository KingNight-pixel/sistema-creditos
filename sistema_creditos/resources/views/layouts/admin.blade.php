<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Administrador')</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f6fa;
            color: #172033;
        }

        .topbar {
            background: #061a33;
            color: white;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .logo span {
            color: #38bdf8;
        }

        .admin-name {
            color: #cbd5e1;
        }

        .menu {
            background: #0b2545;
            padding: 0 30px;
            display: flex;
            gap: 5px;
            align-items: center;
            min-height: 55px;
        }

        .menu a {
            color: #dbeafe;
            text-decoration: none;
            padding: 18px 14px;
            font-size: 14px;
        }

        .menu a:hover,
        .menu a.active {
            background: #12365d;
            color: #38bdf8;
        }

        .container {
            max-width: 1400px;
            margin: auto;
            padding: 30px;
        }

        .page-title {
            margin-bottom: 25px;
        }

        .page-title h1 {
            color: #061a33;
            margin-bottom: 5px;
        }

        .page-title p {
            color: #64748b;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 18px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 22px;
            box-shadow: 0 3px 12px rgba(0,0,0,.07);
            border: 1px solid #e2e8f0;
        }

        .card h3 {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 12px;
        }

        .number {
            font-size: 28px;
            font-weight: bold;
            color: #061a33;
        }

        .section {
            background: white;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 3px 12px rgba(0,0,0,.06);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #061a33;
            color: white;
            padding: 14px;
            text-align: left;
            font-size: 14px;
        }

        td {
            padding: 13px;
            border-bottom: 1px solid #e5e7eb;
        }

        .btn {
            display: inline-block;
            padding: 9px 14px;
            border-radius: 6px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 13px;
            margin: 2px;
        }

        .btn-primary {
            background: #0b6fa4;
            color: white;
        }

        .btn-primary:hover {
            background: #075985;
        }

        .btn-dark {
            background: #061a33;
            color: white;
        }

        .btn-danger {
            background: #b91c1c;
            color: white;
        }

        .btn-success {
            background: #15803d;
            color: white;
        }

        .btn-warning {
            background: #b45309;
            color: white;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 7px;
            font-weight: bold;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            padding: 11px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 14px;
        }

        .full {
            grid-column: 1 / -1;
        }

        .status {
            padding: 5px 9px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
        }

        .activo {
            background: #dcfce7;
            color: #166534;
        }

        .pendiente {
            background: #fef3c7;
            color: #92400e;
        }

        .vencido {
            background: #fee2e2;
            color: #991b1b;
        }

        .pagado {
            background: #dbeafe;
            color: #1e40af;
        }

        .footer {
            text-align: center;
            padding: 25px;
            color: #64748b;
        }

        @media(max-width: 1000px) {
            .cards {
                grid-template-columns: repeat(3, 1fr);
            }

            .menu {
                overflow-x: auto;
            }
        }

        @media(max-width: 700px) {
            .cards,
            .form-grid {
                grid-template-columns: 1fr;
            }

            .container {
                padding: 15px;
            }
        }

         .btn-logout {
        background-color: #dc3545;
        color: #ffffff;
        border: none;
        padding: 8px 16px;
        font-size: 14px;
        font-weight: 600;
        border-radius: 6px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s ease;
    }

    .btn-logout:hover {
        background-color: #bb2d3b;
    }
    </style>
</head>

<body>

<header class="topbar">
    <div class="logo">
        Sistema<span>Créditos</span>
    </div>

    <div class="admin-name">
        Administrador
    </div>
</header>

<nav class="menu">

    <a href="{{ route('admin.dashboard') }}">
        Dashboard
    </a>

    <a href="{{ route('admin.clientes') }}">
        Clientes
    </a>

    <a href="{{ route('admin.creditos.create') }}">
        Crear crédito
    </a>

    <a href="{{ route('admin.solicitudes') }}">
        Solicitudes
    </a>

    <a href="{{ route('admin.creditos') }}">
        Créditos
    </a>

    <a href="{{ route('admin.pagos') }}">
        Pagos
    </a>

    <a href="{{ route('admin.reportes') }}">
        Reportes
    </a>

    <a href="{{ route('admin.usuarios') }}">
        Usuarios
    </a>

    <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn-logout">Cerrar sesión</button>
</form>

</nav>

<main class="container">

    @yield('content')

</main>

<footer class="footer">
    Sistema de Administración de Créditos
</footer>

</body>
</html>