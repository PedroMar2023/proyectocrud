<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use App\Models\Cursos;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumnos::all();
        return view('alumnos.index', ['alumnos' => $alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view('alumnos.create', ['cursos' =>  Cursos::all()]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'matricula'=> 'required|unique:alumnos|max:20',
           'nombre'=> 'required|max:70',
           'apellido'=> 'required|max:70',
           'domicilio'=> 'required|max:70',
           'celular'=> 'required|max:20',
           'fecha_nacimiento'=> 'required|date',
           'email'=> 'nullable|email',
           'curso'=> 'required',
        ]);
        $alumnos = new Alumnos();
        $alumnos->matricula = $request->input('matricula');
        $alumnos->nombre = $request->input('nombre');
        $alumnos->apellido = $request->input('apellido');
        $alumnos->domicilio = $request->input('domicilio');
        $alumnos->celular = $request->input('celular');
        $alumnos->fecha_nacimiento = $request->input('fecha_nacimiento');
        $alumnos->email = $request->input('email');
        $alumnos->cursos_id = $request->input('curso');
        $alumnos->save();
        return view("alumnos.message", ['msg' => "Registro guardado"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumnos $alumnos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $alumnos = Alumnos::find($id);
        return view('alumnos.edit', ['alumnos'=> $alumnos, 'cursos'=> Cursos::all()]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'matricula'=> 'required|max:20|unique:alumnos,matricula,' .$id,
            'nombre'=> 'required|max:70',
            'apellido'=> 'required|max:70',
            'domicilio'=> 'required|max:70',
            'celular'=> 'required|max:20',
            'fecha_nacimiento'=> 'required|date',
            'email'=> 'nullable|email',
            'curso'=> 'required',
         ]);
         $alumnos = Alumnos::find($id);
         $alumnos->matricula = $request->input('matricula');
         $alumnos->nombre = $request->input('nombre');
         $alumnos->apellido = $request->input('apellido');
         $alumnos->domicilio = $request->input('domicilio');
         $alumnos->celular = $request->input('celular');
         $alumnos->fecha_nacimiento = $request->input('fecha_nacimiento');
         $alumnos->email = $request->input('email');
         $alumnos->cursos_id = $request->input('curso');
         $alumnos->save();
         return view("alumnos.message", ['msg' => "Registro actualizado"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $alumnos = Alumnos::find($id);
        $alumnos->delete();
        return redirect("alumnos");
}
}
