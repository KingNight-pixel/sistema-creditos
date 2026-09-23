
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crédito+ | Cliente</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f1f5f9;
            color: #1e293b;
        }

        .header {
            background: #082f49;
            color: white;
            padding: 22px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
        }

        .salir {
            background: #dc2626;
            color: white;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
        }

        .menu {
            background: #0c4a6e;
            padding: 15px 30px;
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .menu a {
            color: white;
            text-decoration: none;
            padding: 10px 14px;
            border-radius: 6px;
        }

        .menu a:hover {
            background: #075985;
        }

        .contenedor {
            max-width: 1200px;
            margin: 35px auto;
            padding: 0 20px;
        }

        h1 {
            color: #082f49;
            margin-bottom: 10px;
        }

        .descripcion {
            color: #64748b;
            margin-bottom: 25px;
        }

        .tarjetas {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .tarjeta {
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 4px 15px #00000012;
            border-left: 5px solid #0284c7;
        }

        .tarjeta h3 {
            color: #64748b;
            font-size: 15px;
            margin-bottom: 12px;
        }

        .tarjeta strong {
            color: #082f49;
            font-size: 27px;
        }

        .panel {
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 4px 15px #00000012;
        }

        .panel h2 {
            color: #082f49;
            margin-bottom: 25px;
        }

        .datos {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .dato {
            background: #f8fafc;
            padding: 18px;
            border-radius: 8px;
        }

        .dato span {
            display: block;
            color: #64748b;
            margin-bottom: 8px;
        }

        .boton {
            display: inline-block;
            margin-top: 25px;
            background: #0369a1;
            color: white;
            padding: 13px 20px;
            border-radius: 8px;
            text-decoration: none;
        }

        .boton:hover {
            background: #075985;
        }
    </style>
</head>

<body>

    <header class="header">
        <div class="logo">CRÉDITOS+</div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="salir">Salir</button>
        </form>
    </header>

    <nav class="menu">
        <a href="{{ route('cliente.dashboard') }}">Inicio</a>
        <a href="{{ route('cliente.solicitar') }}">Solicitar crédito</a>
        <a href="{{ route('cliente.creditos') }}">Consultar mi crédito</a>
        <a href="{{ route('cliente.facturas') }}">Facturas</a>
        <a href="{{ route('cliente.pagos') }}">Historial de pagos</a>
        <a href="{{ route('cliente.perfil') }}">Mis datos</a>
    </nav>

    <main class="contenedor">

        <h1>
            Bienvenido,
            {{ $cliente ? $cliente->nombres . ' ' . $cliente->apellidos : Auth::user()->name }}
        </h1>

        <p class="descripcion">
            Consulta rápidamente el estado de tu crédito.
        </p>

        <section class="tarjetas">
            <div class="tarjeta">
                <h3>Crédito actual</h3>
                <strong>$2,500.00</strong>
            </div>

            <div class="tarjeta">
                <h3>Saldo pendiente</h3>
                <strong>$1,300.00</strong>
            </div>

            <div class="tarjeta">
                <h3>Próxima cuota</h3>
                <strong>$150.00</strong>
            </div>

            <div class="tarjeta">
                <h3>Fecha de pago</h3>
                <strong>30/09/2026</strong>
            </div>
        </section>

        <section class="panel">
            <h2>Mi crédito actual</h2>

            <div class="datos">
                <div class="dato">
                    <span>Número de crédito</span>
                    <strong>CR-00025</strong>
                </div>

                <div class="dato">
                    <span>Monto original</span>
                    <strong>$2,500.00</strong>
                </div>

                <div class="dato">
                    <span>Cuotas pagadas</span>
                    <strong>8</strong>
                </div>

                <div class="dato">
                    <span>Cuotas pendientes</span>
                    <strong>10</strong>
                </div>
            </div>

            <a class="boton" href="{{ route('cliente.creditos') }}">
                Consultar mi crédito
            </a>
        </section>

    </main>

</body>
</html>