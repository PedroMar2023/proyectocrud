@extends('layouts/template')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"> 
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
@endsection
@section('title', 'Alumnos / Instituto')
@section('contenido')
<div class="card">
    <div class="card-body">
<main>
<div class="container py-2">
    <h2>Listado de Alumnos</h2>
    <a href="{{ url('alumnos/create')}}" class="btn btn-primary btn-sm">Nuevo Registro</a>

    <table id="alumnostable" class="table table-hover" >
    <thead>
    <tr>
        <th>id</th>
        <th>Matricula</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Domicilio</th>
        <th>Celular</th>
        <th>Fecha de Nacimiento</th>
        <th>Email</th>
        <th>Curso</th>
        <th></th>
        <th></th>
    </tr>
</thead>
<tbody>
    @foreach($alumnos as $alumno)
    <tr>
        <td>{{ $alumno->id}}</td>
        <td>{{ $alumno->matricula}}</td>
        <td>{{ $alumno->nombre}}</td>
        <td>{{ $alumno->apellido}}</td>
        <td>{{ $alumno->domicilio}}</td>
        <td>{{ $alumno->celular}}</td>
        <td>{{ $alumno->fecha_nacimiento}}</td>
        <td>{{ $alumno->email}}</td>
        <td>{{ $alumno->curso->nombre}}</td>
        <td><a href="{{url('alumnos/'. $alumno->id.'/edit')}} " class="btn btn-warning btn-sm">Editar</a></td>
        <td>
            <form action="{{url ('alumnos/' .$alumno->id)}}" method="POST">
            @method("DELETE")
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
</div>
</div>

@section('js')

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>   
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
<script>
        $(document).ready(function(){
        $('#alumnostable').DataTable({
            responsive: true
        });
    });
    //$(document).ready(function(){
        //$('#alumnostable').DataTable();
    //});
</script> 
@endsection
@endsection
</div>
</main>

