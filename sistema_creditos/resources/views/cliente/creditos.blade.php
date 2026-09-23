<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mis créditos</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #071b35;
            color: white;
            padding: 30px;
        }

        .contenedor {
            max-width: 1100px;
            margin: auto;
        }

        h1 {
            color: #ffffff;
        }

        .tarjeta {
            background: #102d50;
            border-radius: 15px;
            padding: 25px;
            margin-top: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,.25);
        }

        .credito {
            background: #173d67;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
        }

        .credito p {
            margin: 10px 0;
        }

        .estado {
            color: #75d6a0;
            font-weight: bold;
        }

        .boton {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .vacio {
            color: #cbd5e1;
        }
    </style>
</head>

<body>
    <div class="contenedor">

        <h1>Mis créditos</h1>

        <div class="tarjeta">

            @if($creditos->count() > 0)

                @foreach($creditos as $credito)

                    <div class="credito">
                        <h2>Crédito #{{ $credito->id }}</h2>

                        <p>
                            <strong>Monto:</strong>
                            ${{ number_format($credito->monto, 2) }}
                        </p>

                        <p>
                            <strong>Total del crédito:</strong>
                            ${{ number_format($credito->total_credito, 2) }}
                        </p>

                        <p>
                            <strong>Saldo pendiente:</strong>
                            ${{ number_format($credito->saldo_pendiente, 2) }}
                        </p>

                        <p>
                            <strong>Estado:</strong>
                            <span class="estado">
                                {{ ucfirst($credito->estado) }}
                            </span>
                        </p>

                        <p>
                            <strong>Plazo:</strong>
                            {{ $credito->plazo }} meses
                        </p>
                    </div>

                @endforeach

            @else

                <p class="vacio">
                    No tienes créditos registrados actualmente.
                </p>

            @endif

            <a href="{{ route('cliente.dashboard') }}" class="boton">
                Volver al inicio
            </a>

        </div>

    </div>
</body>
</html>