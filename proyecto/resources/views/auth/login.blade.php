<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>

<body>
    <h1>Iniciar Sesión</h1>

    <form action="{{ url('/login') }}" method="POST">
        @csrf

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

        <button type="submit">Ingresar</button>
    </form>
</body>

</html>