```blade
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Crédito+ | Historial de pagos</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #eef4f8;
            color: #1e293b;
        }

        .encabezado {
            background: #082f49;
            color: white;
            padding: 22px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 26px;
            font-weight: bold;
        }

        .subtitulo {
            color: #bae6fd;
            font-size: 13px;
            margin-top: 5px;
        }

        .regresar {
            color: white;
            text-decoration: none;
            border: 1px solid #7dd3fc;
            padding: 10px 16px;
            border-radius: 8px;
        }

        .regresar:hover {
            background: #0c4a6e;
        }

        .contenedor {
            max-width: 1050px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .titulo {
            margin-bottom: 25px;
        }

        .titulo h1 {
            color: #082f49;
            font-size: 32px;
            margin-bottom: 8px;
        }

        .titulo p {
            color: #64748b;
        }

        .resumen {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 28px;
        }

        .tarjeta {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 10px 25px #0000000d;
        }

        .tarjeta h3 {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .tarjeta strong {
            color: #082f49;
            font-size: 26px;
        }

        .pagos {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 25px #0000000d;
        }

        .pagos h2 {
            color: #082f49;
            margin-bottom: 20px;
        }

        .tabla {
            width: 100%;
            border-collapse: collapse;
        }

        .tabla th {
            background: #082f49;
            color: white;
            padding: 14px;
            text-align: left;
        }

        .tabla td {
            padding: 14px;
            border-bottom: 1px solid #e2e8f0;
        }

        .estado {
            background: #dcfce7;
            color: #166534;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .vacio {
            text-align: center;
            padding: 40px;
            color: #64748b;
        }

        @media (max-width: 800px) {
            .resumen {
                grid-template-columns: 1fr;
            }

            .pagos {
                overflow-x: auto;
            }

            .tabla {
                min-width: 650px;
            }
        }

        @media (max-width: 600px) {
            .encabezado {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<header class="encabezado">

    <div>
        <div class="logo">
            CRÉDITO+
        </div>

        <div class="subtitulo">
            Portal del cliente
        </div>
    </div>

    <a
        class="regresar"
        href="{{ route('cliente.dashboard') }}"
    >
        Inicio
    </a>

</header>


<main class="contenedor">

    <div class="titulo">

        <h1>
            Historial de pagos
        </h1>

        <p>
            Consulta todos los pagos realizados de tus créditos.
        </p>

    </div>


    <div class="resumen">

        <div class="tarjeta">

            <h3>
                Total de pagos
            </h3>

            <strong>
                {{ $pagos->count() }}
            </strong>

        </div>


        <div class="tarjeta">

            <h3>
                Total pagado
            </h3>

            <strong>
                ${{ number_format($pagos->sum('monto'), 2) }}
            </strong>

        </div>


        <div class="tarjeta">

            <h3>
                Último pago
            </h3>

            <strong>
                @if($pagos->count())
                    ${{ number_format($pagos->first()->monto ?? 0, 2) }}
                @else
                    $0.00
                @endif
            </strong>

        </div>

    </div>


    <section class="pagos">

        <h2>
            Mis pagos
        </h2>


        @if($pagos->count())

            <table class="tabla">

                <thead>

                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Monto</th>
                        <th>Estado</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($pagos as $pago)

                        <tr>

                            <td>
                                #{{ $pago->id }}
                            </td>

                            <td>
                                {{ optional($pago->created_at)->format('d/m/Y') }}
                            </td>

                            <td>
                                ${{ number_format($pago->monto ?? 0, 2) }}
                            </td>

                            <td>
                                <span class="estado">
                                    Registrado
                                </span>
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        @else

            <div class="vacio">

                <h3>
                    No tienes pagos registrados
                </h3>

                <p>
                    Cuando realices un pago aparecerá aquí.
                </p>

            </div>

        @endif

    </section>

</main>

</body>
</html>
```
