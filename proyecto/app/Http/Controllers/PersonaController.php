<?php

namespace App\Http\Controllers;

use App\Dominio\Aprendiz;
use App\Models\Aprendiz as AprendizModelo;
use App\Dominio\Persona;


use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function mostrar()
    {
        $persona = new Persona('Carlos');
        $aprendiz = new Aprendiz('Ana', 'ADSO');

        $personas = [$persona, $aprendiz];
        return view('personas', [
            'personas' => $personas,
        ]);
    }

    public function presentar(Request $request)
    {
        $datos = $request->validate(
            [
                'nombre' => ['Required', 'string', 'max:100'],
                'programa' => ['Required', 'string', 'max:150'],
            ],


            [
                'nombre.required' => 'Debe ingresar el nombre del aprendiz',
                'nombre.string' => 'El nombre debe ser texto',
                'nombre.max' => 'El nombre no puede superar los 100 caracteres',

                'programa.required' => 'Debe ingresar el programa de formacion',
                'programa.string' => 'El nombre debe ser texto',
                'programa.max' => 'El nombre no puede superar los 150 caracteres',
            ]
        );
        AprendizModelo::create($datos);
        $aprendiz = new Aprendiz(
            $datos['nombre'],
            $datos['programa']
        );
        return view('personas', [
            'personas' => [$aprendiz],
        ]);
    }

    public function listar()
    {
        $aprendices = AprendizModelo::orderByDesc('id')->get();
        return view('aprendices.index', ['aprendices' => $aprendices]);
    }

    public function editar($id)
    {
        $aprendiz = AprendizModelo::findOrFail($id);
        return view('aprendices.editar', ['aprendiz' => $aprendiz]);
    }

    public function actualizar(Request $request, $id)
    {
        // Validamos los datos enviados desde el formulario de edición
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'programa' => ['required', 'string', 'max:150'],
        ], [
            'nombre.required' => 'Debes ingresar el nombre del aprendiz.',
            'nombre.string' => 'El nombre debe ser un texto.',
            'nombre.max' => 'El nombre no puede superar los 100 caracteres.',
            'programa.required' => 'Debes ingresar el programa de formación.',
            'programa.string' => 'El programa debe ser un texto.',
            'programa.max' => 'El programa no puede superar los 150 caracteres.',
        ]);

        // Buscamos el aprendiz por su ID y actualizamos sus datos
        $aprendiz = AprendizModelo::findOrFail($id);
        $aprendiz->update($datos);

        // Redirigimos de vuelta al listado de aprendices
        return redirect('/aprendices');
    }
}
