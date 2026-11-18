<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Presentación de Personas y Aprendices</title>
</head>

<body>
    <h1>Listado de Presentación</h1>

    <ul>
        {{-- Recorremos el arreglo de objetos enviado desde el controlador --}}
        @foreach ($personas as $elemento)
        <li>
            {{-- Si la clase tiene el método presentarse(), lo ejecutamos --}}
            {{ $elemento->presentarse() }}
        </li>
        @endforeach
    </ul>

    <p><a href="{{ url('/aprendices') }}">Ir al listado de aprendices en base de datos</a></p>
</body>

</html>