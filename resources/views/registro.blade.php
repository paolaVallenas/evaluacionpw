<!DOCTYPE html>
<html lang="es">
    
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registro de Usuario</title>
    @vite('../resources/css/app.css')
    <style>
  body {
    background: #f3f4f6;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
  }
  .container {
    background: white;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgb(0 0 0 / 0.1);
    width: 100%;
    max-width: 400px;
  }
  h1 {
    text-align: center;
    margin-bottom: 1.5rem;
    font-weight: 700;
    color: #4b5563;
  }
  label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: #374151;
  }
  input, select {
    width: 100%;
    padding: 0.5rem 0.75rem;
    margin-bottom: 1rem;
    border: 1px solid #d1d5db;
    border-radius: 4px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
  }
  input:focus, select:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59,130,246,0.3);
  }
  button {
    width: 100%;
    background: #2563eb;
    color: white;
    font-weight: 700;
    padding: 0.75rem;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  button:hover {
    background: #1e40af;
  }
  .alert-success {
    background-color: #d1fae5;
    color: #065f46;
    padding: 0.75rem 1rem;
    margin-bottom: 1rem;
    border-radius: 4px;
    font-weight: 600;
    text-align: center;
  }
  .alert-error {
    background-color: #fee2e2;
    color: #991b1b;
    padding: 0.75rem 1rem;
    margin-bottom: 1rem;
    border-radius: 4px;
    font-weight: 600;
  }
</style>

</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Registro de Usuario</h1>

        @if(session('success'))
            <div class="mb-4 p-3 text-green-800 bg-green-200 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('registro.procesar') }}" method="POST" novalidate class="space-y-5">
            @csrf

            <div>
                <label for="nombre" class="block mb-1 font-medium">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required />
            </div>

            <div>
                <label for="correo" class="block mb-1 font-medium">Correo electrónico</label>
                <input type="email" name="correo" id="correo" value="{{ old('correo') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required />
            </div>

            <div>
                <label for="contrasena" class="block mb-1 font-medium">Contraseña</label>
                <input type="password" name="contrasena" id="contrasena"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required />
            </div>

            <div>
                <label for="contrasena_confirmation" class="block mb-1 font-medium">Repetir Contraseña</label>
                <input type="password" name="contrasena_confirmation" id="contrasena_confirmation"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required />
            </div>

            <div>
                <label for="tipo_usuario" class="block mb-1 font-medium">Tipo de Usuario</label>
                <select name="tipo_usuario" id="tipo_usuario" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">Seleccione...</option>
                    <option value="admin" {{ old('tipo_usuario') == 'admin' ? 'selected' : '' }}>Administrador</option>
                    <option value="user" {{ old('tipo_usuario') == 'user' ? 'selected' : '' }}>Usuario</option>
                </select>
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white font-semibold py-2 rounded hover:bg-indigo-700 transition">
                Registrarse
            </button>
        </form>
    </div>

</body>
</html>
