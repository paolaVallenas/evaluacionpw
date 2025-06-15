<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-pink-100 to-blue-100 min-h-screen flex items-center justify-center">

    <form action="{{ route('registro.procesar') }}" method="POST" class="bg-white p-8 rounded shadow-md w-full max-w-md space-y-4">
        @csrf
        <h1 class="text-2xl font-bold text-center text-pink-600">Crear cuenta</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-2 rounded">
                <ul class="text-sm">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded text-sm">
                {{ session('success') }}
            </div>
        @endif

        <input name="name" placeholder="Nombre completo" value="{{ old('name') }}" required class="w-full border p-2 rounded" />

        <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" required class="w-full border p-2 rounded" />

        <input type="password" name="password" placeholder="Contraseña" required class="w-full border p-2 rounded" />

        <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required class="w-full border p-2 rounded" />

        <select name="tipo_usuario" class="w-full border p-2 rounded" required>
            <option value="">Seleccione tipo de usuario</option>
            <option value="admin" {{ old('tipo_usuario') == 'admin' ? 'selected' : '' }}>Administrador</option>
            <option value="user" {{ old('tipo_usuario') == 'user' ? 'selected' : '' }}>Usuario</option>
        </select>

        <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white w-full p-2 rounded font-semibold">Registrarse</button>
    </form>

</body>
</html>
