<h1>Aprendices registrados</h1>

<div style="margin-bottom: 12px;">
    <a href="{{ url('/aprendices/pdf') }}"
        style="display: inline-block;
         padding: 6px 12px; 
         background-color: #1b4332; 
         color: #ffffff; 
         text-decoration: none;
         border-radius: 4px; 
         font-family: sans-serif; 
         font-size: 14px;">
        Generar PDF
    </a>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Programa de formacion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($aprendices as $aprendiz)
        <tr>
            <td>{{ $aprendiz->id }}</td>
            <td>{{ $aprendiz->nombre }}</td>
            <td>{{ $aprendiz->programa }}</td>
            <td>
                <a href="{{ url('/aprendices/' . $aprendiz->id . '/editar') }}">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<p>
    <a href="{{ url('/aprendices/crear') }}">Registrar otro aprendiz</a>
</p>