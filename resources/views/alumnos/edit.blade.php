@extends('layouts/template')
@section('title', 'Editar Alumnos')
@section('contenido')
<main>
    <div class="container py-4">
        <h2>Editar Alumnos</h2>
        @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>
                    {{ $error}}
                </li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
        <form action="{{ url('alumnos/'.$alumnos->id)}}" method="POST">
        @method("PUT")
            @csrf
        <div class="mb-3 row">
            <label for="matricula" class="col-sm-2 col-form-label">Matricula</label>
                <input type="text" class="form-control" name="matricula" id="matricula" value="{{ $alumnos->matricula}}" required>
        </div>
        <div class="mb-3 row">
            <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="{{$alumnos->nombre}}" required>
        </div>
        <div class="mb-3 row">
            <label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" id="apellido" value="{{$alumnos->apellido}}" required>
        </div>
        <div class="mb-3 row">
            <label for="domicilio" class="col-sm-2 col-form-label">Domicilio</label>
                <input type="text" class="form-control" name="domicilio" id="domicilio" value="{{$alumnos->domicilio}}" required>
        </div>
        <div class="mb-3 row">
            <label for="celular" class="col-sm-2 col-form-label">Celular</label>
                <input type="text" class="form-control" name="celular" id="celular" value="{{$alumnos->celular}}" required>
        </div>
        <div class="mb-3 row">
            <label for="fecha_nacimiento" class="col-sm-2 col-form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="{{$alumnos->fecha_nacimiento}}" required>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="{{$alumnos->email}}">
        </div>
        <div class="mb-3 row">
            <label for="curso" class="col-sm-2 col-form-label">Curso</label>
                <select name="curso" id="curso" class="form-select" required>
                    <option value="">Seleccionar Curso</option>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}" @if($curso->id == $alumnos->cursos_id) {{'selected'}} @endif >{{$curso->nombre}}</option>
                    @endforeach
                </select>
        </div>
        <a href="{{ url('alumnos')}}" class="btn btn-secondary">Regresar</a>
        <button type="submit" class="btn btn-success">Guardar</button>
        </form>

    </div>
</main>