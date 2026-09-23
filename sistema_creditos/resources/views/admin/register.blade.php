<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Crédito | Crear administrador</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background:
                radial-gradient(circle at 15% 20%, rgba(42,91,145,.35), transparent 30%),
                radial-gradient(circle at 85% 80%, rgba(19,61,105,.4), transparent 35%),
                #06182b;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        .container {
            width: 100%;
            max-width: 1000px;
            min-height: 620px;
            display: grid;
            grid-template-columns: .9fr 1.1fr;
            background: white;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 30px 80px rgba(0,0,0,.35);
        }

        .left {
            background: linear-gradient(145deg, #0d355c, #06182b);
            color: white;
            padding: 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 65px;
        }

        .shield {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            background: rgba(255,255,255,.12);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
            margin-bottom: 25px;
        }

        .left h1 {
            font-size: 39px;
            line-height: 1.15;
            margin-bottom: 20px;
        }

        .left p {
            color: #c4d3e3;
            line-height: 1.7;
            font-size: 15px;
        }

        .right {
            padding: 55px 65px;
            display: flex;
            align-items: center;
        }

        .form {
            width: 100%;
            max-width: 430px;
            margin: auto;
        }

        .form h2 {
            color: #102b48;
            font-size: 30px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #718096;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .error {
            background: #fff1f2;
            color: #be123c;
            border: 1px solid #fecdd3;
            border-radius: 10px;
            padding: 12px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .field {
            margin-bottom: 18px;
        }

        .field label {
            display: block;
            color: #334e68;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .input {
            width: 100%;
            height: 50px;
            border: 1px solid #d7e0ea;
            border-radius: 11px;
            padding: 0 15px;
            font-size: 14px;
            outline: none;
            background: #fbfcfe;
        }

        .input:focus {
            border-color: #174a78;
            background: white;
            box-shadow: 0 0 0 4px rgba(29,93,145,.08);
        }

        .password {
            position: relative;
        }

        .password input {
            padding-right: 48px;
        }

        .eye {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            border: 0;
            background: transparent;
            cursor: pointer;
            font-size: 17px;
        }

        .button {
            width: 100%;
            height: 52px;
            border: 0;
            border-radius: 12px;
            background: linear-gradient(135deg, #123f67, #092642);
            color: white;
            font-weight: bold;
            font-size: 15px;
            cursor: pointer;
            margin-top: 8px;
            box-shadow: 0 8px 20px rgba(9,38,66,.2);
            transition: .2s;
        }

        .button:hover {
            transform: translateY(-2px);
        }

        .back {
            text-align: center;
            margin-top: 22px;
            font-size: 13px;
        }

        .back a {
            color: #0c4776;
            font-weight: bold;
            text-decoration: none;
        }

        @media(max-width: 800px) {
            .container {
                grid-template-columns: 1fr;
            }

            .left {
                padding: 35px;
                min-height: 270px;
            }

            .logo {
                margin-bottom: 30px;
            }

            .left h1 {
                font-size: 30px;
            }

            .right {
                padding: 40px 25px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="left">

        <div class="logo">
            ₡ Crédito
        </div>

        <div class="shield">
            🛡️
        </div>

        <h1>
            Cuenta de<br>
            administrador
        </h1>

        <p>
            Crea una cuenta administrativa para gestionar
            clientes, solicitudes, créditos, pagos y cobranza
            desde el sistema.
        </p>

    </div>


    <div class="right">

        <div class="form">

            <h2>Crear administrador</h2>

            <p class="subtitle">
                Completa tus datos para crear la cuenta administrativa.
            </p>


            @if ($errors->any())
                <div class="error">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif


            <form method="POST" action="{{ route('admin.register.post') }}">

                @csrf

                <div class="field">
                    <label for="name">
                        Nombre completo
                    </label>

                    <input
                        class="input"
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Nombre del administrador"
                        required
                    >
                </div>


                <div class="field">
                    <label for="email">
                        Correo electrónico
                    </label>

                    <input
                        class="input"
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="admin@correo.com"
                        required
                    >
                </div>


                <div class="field">

                    <label for="password">
                        Contraseña
                    </label>

                    <div class="password">

                        <input
                            class="input"
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Crea una contraseña"
                            required
                        >

                        <button
                            type="button"
                            class="eye"
                            onclick="togglePassword('password', this)"
                        >
                            👁️
                        </button>

                    </div>

                </div>


                <div class="field">

                    <label for="password_confirmation">
                        Confirmar contraseña
                    </label>

                    <div class="password">

                        <input
                            class="input"
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Repite la contraseña"
                            required
                        >

                        <button
                            type="button"
                            class="eye"
                            onclick="togglePassword('password_confirmation', this)"
                        >
                            👁️
                        </button>

                    </div>

                </div>


                <button class="button" type="submit">
                    Crear cuenta de administrador
                </button>

            </form>


            <div class="back">
                <a href="{{ route('login') }}">
                    ← Volver al inicio de sesión
                </a>
            </div>

        </div>

    </div>

</div>


<script>
    function togglePassword(id, button) {

        const input = document.getElementById(id);

        if (input.type === 'password') {
            input.type = 'text';
            button.textContent = '🙈';
        } else {
            input.type = 'password';
            button.textContent = '👁️';
        }
    }
</script>

</body>
</html>

