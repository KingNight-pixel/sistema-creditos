```blade
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Crédito+ | Mi perfil</title>

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
            grid-template-columns: 0.8fr 1.2fr;
            gap: 28px;
        }

        .presentacion {
            background: linear-gradient(145deg, #082f49, #075985);
            color: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 10px 25px #082f4930;
        }

        .avatar {
            width: 90px;
            height: 90px;
            background: #38bdf8;
            color: #082f49;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 35px;
            font-weight: bold;
            margin-bottom: 22px;
        }

        .presentacion h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .presentacion p {
            color: #dbeafe;
            line-height: 1.7;
        }

        .dato {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #ffffff30;
        }

        .dato small {
            display: block;
            color: #bae6fd;
            margin-bottom: 5px;
        }

        .perfil {
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 10px 25px #0000000d;
        }

        .perfil h2 {
            color: #082f49;
            margin-bottom: 25px;
        }

        .campo {
            margin-bottom: 20px;
        }

        .campo label {
            display: block;
            color: #64748b;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 7px;
        }

        .valor {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 14px;
            border-radius: 10px;
            color: #334155;
        }

        .acciones {
            margin-top: 25px;
        }

        .boton {
            display: inline-block;
            background: #0369a1;
            color: white;
            text-decoration: none;
            padding: 13px 20px;
            border-radius: 10px;
            font-weight: bold;
        }

        .boton:hover {
            background: #075985;
        }

        @media (max-width: 750px) {
            .contenedor {
                grid-template-columns: 1fr;
                margin: 25px auto;
            }

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

    <!-- PRESENTACIÓN -->

    <section class="presentacion">

        <div class="avatar">
            {{ strtoupper(substr($cliente->nombres ?? 'C', 0, 1)) }}
        </div>


        <h1>
            {{ $cliente->nombres ?? 'Cliente' }}
        </h1>


        <p>
            Información de tu cuenta y datos personales.
        </p>


        <div class="dato">

            <small>
                Estado de cuenta
            </small>

            <strong>
                Activo
            </strong>

        </div>

    </section>


    <!-- DATOS -->

    <section class="perfil">

        <h2>
            Mis datos
        </h2>


        <div class="campo">

            <label>
                Nombres
            </label>

            <div class="valor">
                {{ $cliente->nombres ?? 'No registrado' }}
            </div>

        </div>


        <div class="campo">

            <label>
                Apellidos
            </label>

            <div class="valor">
                {{ $cliente->apellidos ?? 'No registrado' }}
            </div>

        </div>


        <div class="campo">

            <label>
                Documento de identidad
            </label>

            <div class="valor">
                {{ $cliente->documento_identidad ?? 'No registrado' }}
            </div>

        </div>


        <div class="campo">

            <label>
                Correo electrónico
            </label>

            <div class="valor">
                {{ $cliente->email ?? auth()->user()->email ?? 'No registrado' }}
            </div>

        </div>


        <div class="campo">

            <label>
                Teléfono
            </label>

            <div class="valor">
                {{ $cliente->telefono ?? 'No registrado' }}
            </div>

        </div>


        <div class="acciones">

            <a
                href="{{ route('cliente.dashboard') }}"
                class="boton"
            >
                Volver al inicio
            </a>

        </div>

    </section>

</main>

</body>
</html>
```
