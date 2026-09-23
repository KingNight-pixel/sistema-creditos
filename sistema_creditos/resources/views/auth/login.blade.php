```blade
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Crédito | Iniciar sesión</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;
            background:
                radial-gradient(circle at 10% 20%, rgba(42, 91, 145, .35), transparent 30%),
                radial-gradient(circle at 90% 80%, rgba(19, 61, 105, .45), transparent 35%),
                #06182b;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
            color: #172b42;
        }

        .login-container {
            width: 100%;
            max-width: 1050px;
            min-height: 650px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: #ffffff;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 30px 80px rgba(0, 0, 0, .35);
        }

        /* PANEL IZQUIERDO */

        .brand-panel {
            position: relative;
            overflow: hidden;
            background:
                linear-gradient(145deg, #0b2d50 0%, #09213c 55%, #06182b 100%);
            color: white;
            padding: 55px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .brand-panel::before {
            content: "";
            position: absolute;
            width: 330px;
            height: 330px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,.08);
            right: -130px;
            top: -100px;
        }

        .brand-panel::after {
            content: "";
            position: absolute;
            width: 430px;
            height: 430px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,.06);
            left: -260px;
            bottom: -220px;
        }

        .brand-content {
            position: relative;
            z-index: 2;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 65px;
        }

        .logo-icon {
            width: 52px;
            height: 52px;
            border-radius: 15px;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.18);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        .logo-text {
            font-size: 25px;
            font-weight: 700;
            letter-spacing: .3px;
        }

        .brand-title {
            font-size: 43px;
            line-height: 1.12;
            font-weight: 700;
            margin-bottom: 22px;
        }

        .brand-description {
            max-width: 400px;
            font-size: 16px;
            line-height: 1.7;
            color: #c4d3e3;
        }

        .features {
            position: relative;
            z-index: 2;
            display: grid;
            gap: 16px;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 14px;
            color: #dbe7f2;
            font-size: 14px;
        }

        .feature-icon {
            width: 35px;
            height: 35px;
            border-radius: 10px;
            background: rgba(255,255,255,.09);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* PANEL DERECHO */

        .form-panel {
            padding: 55px 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
        }

        .form-container {
            width: 100%;
            max-width: 390px;
        }

        .welcome {
            margin-bottom: 35px;
        }

        .welcome h1 {
            font-size: 31px;
            color: #102b48;
            margin-bottom: 9px;
        }

        .welcome p {
            color: #718096;
            font-size: 14px;
        }

        /* TIPO DE ACCESO */

        .access-title {
            font-size: 13px;
            font-weight: 700;
            color: #334e68;
            margin-bottom: 12px;
        }

        .access-options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 24px;
        }

        .access-option input {
            display: none;
        }

        .access-option label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 13px;
            border: 1px solid #d7e0ea;
            border-radius: 12px;
            cursor: pointer;
            color: #526579;
            font-size: 14px;
            font-weight: 600;
            transition: .2s;
        }

        .access-option label:hover {
            border-color: #174a78;
        }

        .access-option input:checked + label {
            background: #0b2d50;
            border-color: #0b2d50;
            color: white;
            box-shadow: 0 6px 16px rgba(11,45,80,.18);
        }

        /* CAMPOS */

        .field {
            margin-bottom: 20px;
        }

        .field label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: #334e68;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #8192a5;
            font-size: 16px;
        }

        .field input {
            width: 100%;
            height: 50px;
            border: 1px solid #d7e0ea;
            border-radius: 12px;
            padding: 0 48px;
            font-size: 14px;
            color: #172b42;
            outline: none;
            transition: .2s;
            background: #fbfcfe;
        }

        .field input:focus {
            border-color: #1d5d91;
            background: white;
            box-shadow: 0 0 0 4px rgba(29,93,145,.08);
        }

        .password-toggle {
            position: absolute;
            right: 13px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            cursor: pointer;
            color: #718096;
            font-size: 17px;
            padding: 5px;
        }

        .password-toggle:hover {
            color: #0b2d50;
        }

        /* RECORDAR */

        .remember {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 2px 0 25px;
            font-size: 13px;
            color: #66788a;
        }

        .remember label {
            display: flex;
            align-items: center;
            gap: 7px;
            cursor: pointer;
        }

        .remember input {
            accent-color: #0b2d50;
        }

        /* BOTON */

        .login-button {
            width: 100%;
            height: 52px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #123f67, #092642);
            color: white;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: .25s;
            box-shadow: 0 8px 20px rgba(9,38,66,.2);
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(9,38,66,.28);
        }

        /* REGISTRO */

        .register {
            text-align: center;
            margin-top: 25px;
            padding-top: 22px;
            border-top: 1px solid #edf1f5;
            font-size: 13px;
            color: #718096;
        }

        .register a {
            color: #0c4776;
            font-weight: 700;
            text-decoration: none;
        }

        .register a:hover {
            text-decoration: underline;
        }

        .admin-register {
            margin-top: 13px;
            text-align: center;
            font-size: 12px;
        }

        .admin-register a {
            color: #526579;
            text-decoration: none;
        }

        .admin-register a:hover {
            color: #0b2d50;
            text-decoration: underline;
        }

        /* ERRORES */

        .error-message {
            background: #fff1f2;
            border: 1px solid #fecdd3;
            color: #be123c;
            border-radius: 10px;
            padding: 11px 13px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        /* RESPONSIVE */

        @media (max-width: 800px) {
            .login-container {
                grid-template-columns: 1fr;
                max-width: 520px;
            }

            .brand-panel {
                min-height: 300px;
                padding: 35px;
            }

            .logo {
                margin-bottom: 35px;
            }

            .brand-title {
                font-size: 32px;
            }

            .features {
                display: none;
            }

            .form-panel {
                padding: 40px 30px;
            }
        }

        @media (max-width: 450px) {
            body {
                padding: 12px;
            }

            .login-container {
                border-radius: 20px;
            }

            .brand-panel {
                padding: 30px 25px;
            }

            .form-panel {
                padding: 35px 22px;
            }
        }
    </style>
</head>

<body>

<div class="login-container">

    <!-- PANEL DE MARCA -->
    <section class="brand-panel">

        <div class="brand-content">

            <div class="logo">
                <div class="logo-icon">₡</div>
                <div class="logo-text">Crédito</div>
            </div>

            <h2 class="brand-title">
                Tu dinero.<br>
                Tus proyectos.<br>
                Tu futuro.
            </h2>

            <p class="brand-description">
                Administra tus créditos y pagos desde una plataforma
                sencilla, segura y diseñada para facilitar tu gestión financiera.
            </p>

        </div>

        <div class="features">

            <div class="feature">
                <div class="feature-icon">✓</div>
                <span>Gestión de créditos</span>
            </div>

            <div class="feature">
                <div class="feature-icon">✓</div>
                <span>Consulta de pagos</span>
            </div>

            <div class="feature">
                <div class="feature-icon">✓</div>
                <span>Información centralizada</span>
            </div>

        </div>

    </section>


    <!-- FORMULARIO -->
    <section class="form-panel">

        <div class="form-container">

            <div class="welcome">
                <h1>Bienvenido</h1>
                <p>Ingresa a tu cuenta para continuar.</p>
            </div>


            @if ($errors->any())
                <div class="error-message">
                    {{ $errors->first() }}
                </div>
            @endif


            <form method="POST" action="{{ route('login.post') }}">

                @csrf

                <div class="access-title">
                    Tipo de acceso
                </div>

                <div class="access-options">

                    <div class="access-option">
                        <input
                            type="radio"
                            name="tipo_acceso"
                            id="cliente"
                            value="cliente"
                            checked
                        >

                        <label for="cliente">
                            👤 Cliente
                        </label>
                    </div>

                    <div class="access-option">
                        <input
                            type="radio"
                            name="tipo_acceso"
                            id="admin"
                            value="admin"
                        >

                        <label for="admin">
                            🛡️ Administrador
                        </label>
                    </div>

                </div>


                <div class="field">

                    <label for="email">
                        Correo electrónico
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">✉</span>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="correo@ejemplo.com"
                            required
                            autocomplete="email"
                        >

                    </div>

                </div>


                <div class="field">

                    <label for="password">
                        Contraseña
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">🔒</span>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Ingresa tu contraseña"
                            required
                            autocomplete="current-password"
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            id="togglePassword"
                            aria-label="Mostrar contraseña"
                        >
                            👁
                        </button>

                    </div>

                </div>


                <div class="remember">

                    <label>
                        <input type="checkbox" name="remember">
                        Recordarme
                    </label>

                </div>


                <button type="submit" class="login-button">
                    Ingresar al sistema
                </button>

            </form>


            <div class="register">
                ¿No tienes una cuenta?
                <a href="{{ route('register') }}">
                    Crear cuenta de cliente
                </a>
            </div>


            <div class="admin-register">
                <a href="{{ route('admin.register') }}">
                    🛡️ ¿Eres administrador? Crear cuenta de administrador
                </a>
            </div>

        </div>

    </section>

</div>


<script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function () {

        if (password.type === 'password') {

            password.type = 'text';
            togglePassword.textContent = '🙈';
            togglePassword.setAttribute(
                'aria-label',
                'Ocultar contraseña'
            );

        } else {

            password.type = 'password';
            togglePassword.textContent = '👁';
            togglePassword.setAttribute(
                'aria-label',
                'Mostrar contraseña'
            );
        }
    });
</script>

</body>
</html>
```
