<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de usuario</title>
</head>

<body>
    <h1>Crear cuenta</h1>

    <form action="{{ url('/registro') }}" method="POST">
        @csrf

        <div>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            @error('password')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label for="password_confirmation">Confirmar contraseña:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <br>

        <button type="submit">Registrarse</button>
    </form>
</body>

</html>