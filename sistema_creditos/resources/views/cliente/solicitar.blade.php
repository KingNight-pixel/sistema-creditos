```blade
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Crédito+ | Solicitar crédito</title>

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
            display: grid;
            grid-template-columns: 0.9fr 1.2fr;
            gap: 28px;
        }

        .informacion {
            background: linear-gradient(145deg, #082f49, #075985);
            color: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 10px 25px #082f4930;
        }

        .informacion h1 {
            font-size: 32px;
            margin-bottom: 18px;
        }

        .informacion p {
            color: #dbeafe;
            line-height: 1.7;
        }

        .beneficio {
            margin-top: 28px;
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .icono {
            background: #38bdf8;
            color: #082f49;
            padding: 9px;
            border-radius: 50%;
            font-weight: bold;
        }

        .formulario {
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 10px 25px #0000000d;
        }

        .formulario h2 {
            color: #082f49;
            margin-bottom: 8px;
        }

        .descripcion {
            color: #64748b;
            margin-bottom: 25px;
        }

        .grupo {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #334155;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 14px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
        }

        input:focus,
        textarea:focus {
            border-color: #0284c7;
            box-shadow: 0 0 0 3px #0284c720;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        .alerta {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alerta ul {
            margin-top: 8px;
            margin-left: 20px;
        }

        .acciones {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .boton {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }

        .enviar {
            background: #0369a1;
            color: white;
        }

        .enviar:hover {
            background: #075985;
        }

        .volver {
            background: #e2e8f0;
            color: #334155;
        }

        .volver:hover {
            background: #cbd5e1;
        }

        @media (max-width: 750px) {
            .contenedor {
                grid-template-columns: 1fr;
                margin: 25px auto;
            }

            .encabezado {
                padding: 20px;
            }

            .acciones {
                flex-direction: column;
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

    <!-- INFORMACIÓN -->

    <section class="informacion">

        <h1>
            Solicita tu crédito
        </h1>

        <p>
            Completa el formulario para enviar tu solicitud.
            Nuestro equipo revisará la información proporcionada.
        </p>


        <div class="beneficio">

            <span class="icono">
                ✓
            </span>

            <span>
                Solicitud rápida y sencilla
            </span>

        </div>


        <div class="beneficio">

            <span class="icono">
                ✓
            </span>

            <span>
                Consulta el estado desde tu cuenta
            </span>

        </div>


        <div class="beneficio">

            <span class="icono">
                ✓
            </span>

            <span>
                Información protegida
            </span>

        </div>

    </section>


    <!-- FORMULARIO -->

    <section class="formulario">

        <h2>
            Formulario de solicitud
        </h2>

        <p class="descripcion">
            Ingresa los datos del crédito que deseas solicitar.
        </p>


        <!-- ERRORES -->

        @if ($errors->any())

            <div class="alerta">

                <strong>
                    Revisa los siguientes errores:
                </strong>

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- FORMULARIO CORREGIDO -->

        <form
            method="POST"
            action="{{ route('cliente.solicitar.store') }}"
        >

            @csrf


            <!-- MONTO -->

            <div class="grupo">

                <label for="monto">
                    Monto solicitado ($)
                </label>

                <input
                    type="number"
                    id="monto"
                    name="monto"
                    value="{{ old('monto') }}"
                    min="1"
                    step="0.01"
                    placeholder="Ejemplo: 2500"
                    required
                >

            </div>


            <!-- PLAZO -->

            <div class="grupo">

                <label for="plazo">
                    Plazo en meses
                </label>

                <input
                    type="number"
                    id="plazo"
                    name="plazo"
                    value="{{ old('plazo') }}"
                    min="1"
                    placeholder="Ejemplo: 12"
                    required
                >

            </div>


            <!-- MOTIVO -->

            <div class="grupo">

                <label for="motivo">
                    Motivo de la solicitud
                </label>

                <textarea
                    id="motivo"
                    name="motivo"
                    placeholder="Escribe el motivo de tu solicitud..."
                >{{ old('motivo') }}</textarea>

            </div>


            <!-- BOTONES -->

            <div class="acciones">

                <button
                    type="submit"
                    class="boton enviar"
                >
                    Enviar solicitud
                </button>


                <a
                    href="{{ route('cliente.dashboard') }}"
                    class="boton volver"
                >
                    Volver al inicio
                </a>

            </div>

        </form>

    </section>

</main>

</body>
</html>
```
