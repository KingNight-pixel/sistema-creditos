```blade
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Crédito+ | Mis facturas</title>

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

        .tarjetas {
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

        .tarjeta .icono {
            width: 45px;
            height: 45px;
            background: #e0f2fe;
            color: #0369a1;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 15px;
        }

        .tarjeta h3 {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .tarjeta strong {
            color: #082f49;
            font-size: 25px;
        }

        .facturas {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 25px #0000000d;
        }

        .facturas h2 {
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
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background: #dcfce7;
            color: #166534;
            font-size: 12px;
            font-weight: bold;
        }

        .estado.pendiente {
            background: #fef3c7;
            color: #92400e;
        }

        .estado.vencida {
            background: #fee2e2;
            color: #991b1b;
        }

        .ver {
            display: inline-block;
            background: #0369a1;
            color: white;
            padding: 8px 12px;
            border-radius: 7px;
            text-decoration: none;
            font-size: 13px;
        }

        .ver:hover {
            background: #075985;
        }

        .vacio {
            padding: 35px;
            text-align: center;
            color: #64748b;
        }

        .vacio h3 {
            margin-bottom: 8px;
            color: #082f49;
        }

        @media (max-width: 800px) {
            .tarjetas {
                grid-template-columns: 1fr;
            }

            .facturas {
                overflow-x: auto;
            }

            .tabla {
                min-width: 700px;
            }
        }

        @media (max-width: 600px) {
            .encabezado {
                padding: 20px;
            }

            .contenedor {
                margin: 25px auto;
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
            Mis facturas
        </h1>

        <p>
            Consulta las facturas relacionadas con tus créditos.
        </p>

    </div>


    @php
        /*
         * Si el controlador todavía no envía $facturas,
         * utilizamos una colección vacía.
         *
         * Esto evita el error:
         * Undefined variable $facturas
         */
        $facturas = $facturas ?? collect();
    @endphp


    <div class="tarjetas">

        <div class="tarjeta">

            <div class="icono">
                $
            </div>

            <h3>
                Total facturado
            </h3>

            <strong>
                ${{ number_format($facturas->sum('monto'), 2) }}
            </strong>

        </div>


        <div class="tarjeta">

            <div class="icono">
                ✓
            </div>

            <h3>
                Facturas registradas
            </h3>

            <strong>
                {{ $facturas->count() }}
            </strong>

        </div>


        <div class="tarjeta">

            <div class="icono">
                #
            </div>

            <h3>
                Estado
            </h3>

            <strong>
                Activo
            </strong>

        </div>

    </div>


    <section class=
```
