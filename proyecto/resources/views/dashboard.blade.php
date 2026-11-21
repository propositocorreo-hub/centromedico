<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>

<body>
    <h1>Bienvenido al Dashboard, {{ $usuario->name }}</h1>
    <p>Correo registrado: {{ $usuario->email }}</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>
</body>

</html>