<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de aprendices</title>
</head>

<body>
    <h1>Aprendices registrados</h1>

    <table>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Programa de formacion</th>
                <th scope="col">Acciones</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($aprendices as $aprendiz)
            <tr>
                <td>{{$aprendiz->id}}</td>
                <td>{{$aprendiz->nombre}}</td>
                <td>{{$aprendiz->programa}}</td>
                <td>
                    <a href="{{url('/aprendices/' . $aprendiz->id . '/editar')}}">Editar</a>
                </td>
            </tr>
            @empty

            <tr>
                <td colspan="3"></td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <p><a href="{{url('/aprendices/crear')}}">Registrar otro aprendiz</a></p>
</body>

</html>