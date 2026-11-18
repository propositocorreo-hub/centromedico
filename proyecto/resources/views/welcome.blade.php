<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Aprendiz</title>
</head>

<body>
    <h1>Registro de aprendiz</h1>
    <br>
    <form action="{{url('/aprendices')}}" method="POST">
        <div>
            <label for="nombre">Nombre</label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                value="{{old('nombre')}}"
                required>

            @error('nombre')
            <p style="color:red;">{{message}}</p>
            @enderror
        </div>

        <br>

        <div>
            <label for="programa">Programa de formacion</label>
            <input
                type="text"
                id="programa"
                name="programa"
                value="{{old('programa')}}"
                required>

            @error('programa')
            <p style="color:red;">{{message}}</p>
            @enderror
        </div>

        <br>

        <button type="submit">Presentar aprendiz</button>

        <p><a href="{{url('/aprendices')}}">Ver aprendices registrados</a></p>


    </form>
</body>

</html>