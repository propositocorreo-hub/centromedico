<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar aprendiz</title>
</head>

<body>
    <h1>Editar aprendiz #{{$aprendiz->id}}</h1>
    <form action="{{url('/aprendices/' . $aprendiz->id )}}" method="POST">
        @csrf
        @method('PUT')
        <p>
            <label for="nombre">Nombre del aprendiz:</label>
            <input type="text" id="nombre" name="nombre"
                value="{{old('nombre', $aprendiz->nombre)}}"
                maxlength="100" required>
            @error('nombre')
            <span>{{message}}</span>
            @enderror
        </p>

        <p>
            <label for="programa">Programa de formacion:</label>
            <input type="text" id="programa" name="programa"
                value="{{old('programa', $aprendiz->programa)}}"
                maxlength="150" required>
            @error('programa')
            <span>{{$message}}</span>
            @enderror
        </p>

        <button type="submit">Guardar Cambios</button>
    </form>

    <p><a href="{{url('/aprendices')}}"></a></p>

</body>

</html>