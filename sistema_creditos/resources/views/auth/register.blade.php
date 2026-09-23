
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Crear cuenta | Sistema de Créditos</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-900 flex items-center justify-center p-6">

    <div class="w-full max-w-md bg-slate-800 rounded-2xl shadow-2xl p-8">

        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-white">
                SISTEMA DE CRÉDITOS
            </h1>

            <p class="text-slate-300 mt-2">
                Crear una nueva cuenta
            </p>
        </div>

        @if ($errors->any())
            <div class="bg-red-500/20 text-red-300 p-3 rounded-lg mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-slate-200 mb-2">
                    Nombre completo
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    class="w-full rounded-lg p-3 bg-slate-700 text-white border border-slate-600"
                    placeholder="Tu nombre"
                >
            </div>

            <div class="mb-4">
                <label class="block text-slate-200 mb-2">
                    Correo electrónico
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full rounded-lg p-3 bg-slate-700 text-white border border-slate-600"
                    placeholder="correo@ejemplo.com"
                >
            </div>

            <div class="mb-4">
                <label class="block text-slate-200 mb-2">
                    Teléfono
                </label>

                <input
                    type="text"
                    name="telefono"
                    value="{{ old('telefono') }}"
                    class="w-full rounded-lg p-3 bg-slate-700 text-white border border-slate-600"
                    placeholder="Tu teléfono"
                >
            </div>

            <div class="mb-4">
                <label class="block text-slate-200 mb-2">
                    Contraseña
                </label>

                <input
                    type="password"
                    name="password"
                    required
                    class="w-full rounded-lg p-3 bg-slate-700 text-white border border-slate-600"
                    placeholder="Mínimo 8 caracteres"
                >
            </div>

            <div class="mb-6">
                <label class="block text-slate-200 mb-2">
                    Confirmar contraseña
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    required
                    class="w-full rounded-lg p-3 bg-slate-700 text-white border border-slate-600"
                    placeholder="Repite tu contraseña"
                >
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg transition"
            >
                Crear cuenta
            </button>
        </form>

        <div class="text-center mt-6">
            <a
                href="{{ route('login') }}"
                class="text-blue-400 hover:text-blue-300"
            >
                ¿Ya tienes una cuenta? Iniciar sesión
            </a>
        </div>

        <p class="text-center text-slate-400 text-sm mt-8">
            Sistema de Créditos © 2026
        </p>

    </div>

</body>
</html>