@extends('layout/plantilla')

@section('tituloPagina'.'Eliminar un registro')

@section('contenido')
<div class="card">
    <div class="card-header">
      Eliminar registro
    </div>
    <div class="card-body">
      <p class="card-text">
        <div class="alert alert-danger" role="alert">
           Estas seguro de eliminar este registro!!
           <table class="table table-sm table-hover" style="background-color: bisque">
               <thead>
                   <th>Apellido paterno</th>
                   <th>Apellido materno</th>
                   <th>Nombre</th>
                   <th>Fecha de nacimiento</th>
               </thead>
               <tbody>
                   <tr>
                       <td>{{ $personas->paterno }}</td>
                       <td>{{ $personas->materno }}</td>
                       <td>{{ $personas->nombre }}</td>
                       <td>{{ $personas->fecha_nacimiento }}</td>
                   </tr>    
               </tbody>
           </table>
           <hr>
           <form action="{{  route('personas.destroy',$personas->id)  }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{  route('personas.index')  }}" class="btn btn-info">
              <span class="fas fa-angle-left"></span> Regresar
            </a>
               <button class="btn btn-danger">
                <span class="fas fa-user-times"></span>Eliminar

                </button>
           </form>

          </div>
      </p>
    </div>
  </div>    
@endsection