@extends('layouts.master')


@section('tituloPagina','Registro de Cultivo')


@section('content')
<br><br>
<center>
<div class="card" style="width: 40rem;">
    <div class="card-header">
      Registrar Cultivo Rentable
    </div>
    <div class="card-body">
    
      <p class="card-text">
    <form action="{{ route('cultivos.store') }}" method="POST">
        @csrf
       
         <label for="">Nombre del Cultivo:</label>
         <input type="text" name="nombre" placeholder="Nombre Cultivo" class="form-control" required><br>
         <label for="">Tipo del Cultivo:</label>
         <input type="text" name="tipo" placeholder="Tipo Cultivo" class="form-control" required><br>
         <label for="">Fecha del Cultivo:</label>
         <input type="date" name="fecha" placeholder="Fecha Cultivo" class="form-control" required><br>
         <br>
         <input type="submit" class="btn btn-success" value="Agregar">
      </form>
      </p>
      
    </div>
  </div>


</center>

@endsection