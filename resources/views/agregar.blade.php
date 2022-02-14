@extends('layout/plantilla')

@section('tituloPagina'.'Crear un nuevo registro')

@section('contenido')
<div class="card">
    <div class="card-header">
      Ingresar datos del nuevo registro
    </div>
    <div class="card-body">
      <p class="card-text">
          <form action="{{ route('personas.store') }}" method="POST">
            @csrf
            <label for="">Apellido paterno</label>
            <input type="texte" name="paterno" class="form-control" required>
            <label for="">Apellido materno</label>
            <input type="texte" name="materno" class="form-control" required>
            <label for="">Nombre</label>
            <input type="texte" name="nombre" class="form-control" required>
            <label for="">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control" required> 
            <br>
            <a href="{{  route('personas.index')  }}" class="btn btn-info">
              <span class="fas fa-angle-left"></span> Regresar
            </a>
            <button class="btn btn-primary">
              <span class="fas fa-user-plus"></span> Agregar

              </button>
            
          </form>
      </p>
    </div>
  </div>    
@endsection<i class=""></i>