@extends('layouts.master')


@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=}, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de cultivos</title>
</head>
<body>
    <center><h1>Listado de Cultivos </h1>

    <br>

    <div class="card" style="width: 70rem">
       
        <div class="card-body">
            <div class="row">
            </div>
        </div>
        <div class="table table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                    <th>
                        <center>Nombre Cultivo</center>
                    </th>
                  
                    <th>
                        <center>Tipo</center>
                    </th>
                    <th>
                        <center>Fecha</center>
                    </th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    @foreach ($cultivos as $item)
                    <tr>
                         <td>
                            <center>{{ $item->nombre }}</center>
                        </td>
                        <td>
                            <center>{{ $item->tipo }}</center>
                        </td>
                          <td>
                            <center>{{ $item->fecha }}</center>
                        </td>
    
                            <td>
                                <center><button type="button" class="btn btn-success editbtn" data-id="{{$item->id}}" 
                                     data-nombre="{{$item->nombre}}"
                                     data-tipo="{{$item->tipo}}"  data-fecha="{{$item->fecha}}"
                                        data-bs-toggle="modal" data-bs-target="#editar"> <i class="fas fa-edit"></i></button></center>
                            </td>
                        </td>
                        <td>
                            <center><button type="button" class="btn btn-danger deletebtn" data-id="{{ $item->id }}"
                                data-bs-toggle="modal" data-bs-target="#eliminar">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </center>
                       </td>
@endforeach
                </tbody>
            </table>
            <!--Aqui Inicia Modal de Editar -->
            <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="formEditar" action="{{ route('cultivos.update', 0) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editarLabel">Editar Cultivo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" id="edit-id">
                          
                                <div class="mb-3">
                                    <label for="edit-nombre" class="form-label">Nombre Cultivo</label>
                                    <input type="text" class="form-control" id="edit-nombre" name="nombre">
                                </div>
                              
                               
                                <div class="mb-3">
                                    <label for="edit-tipo" class="form-label">Tipo</label>
                                    <input type="text" class="form-control" id="edit-tipo" name="tipo">
                                </div>
                                  <div class="mb-3">
                                    <label for="edit-fecha" class="form-label">Fecha</label>
                                    <input type="date" class="form-control" id="edit-fecha" name="fecha">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                <!--Aqui termina Modal Editar -->
                 <!--Aqui Inicia Modal Eliminar -->
                 <div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="eliminarLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="formEliminar" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="eliminarLabel">Confirmar Eliminación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>¿Está seguro de que desea eliminar este cultivo?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
         </div>
     </div>


        </center>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.editbtn').forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        document.getElementById('formEditar').action = `/cultivos/${id}`;
                        document.getElementById('edit-id').value = id;         
                        document.getElementById('edit-nombre').value = this.getAttribute('data-nombre');
                        document.getElementById('edit-tipo').value = this.getAttribute('data-tipo');
                        document.getElementById('edit-fecha').value = this.getAttribute('data-fecha');
    
                    });
    
                });
            });
        </script>
         <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.deletebtn').forEach(button => {
                    button.addEventListener('click', function () {
                        const id = this.getAttribute('data-id');
                        document.getElementById('formEliminar').action = `/cultivos/${id}`;
                    });
                });
            });
        </script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Editar cultivo
    document.getElementById('formEditar').addEventListener('submit', function (e) {
        e.preventDefault();
        const form = this;
        const url = form.action;
        const formData = new FormData(form);

        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': form.querySelector('[name="_token"]').value,
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => {
            if (response.ok) {
                window.location.href = "{{ route('cultivos.index') }}";
            } else {
                return response.json().then(data => {
                    alert('Error al editar el cultivo');
                });
            }
        });
    });

    // Eliminar cultivo
    document.getElementById('formEliminar').addEventListener('submit', function (e) {
        e.preventDefault();
        const form = this;
        const url = form.action;
        const formData = new FormData(form);

        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': form.querySelector('[name="_token"]').value,
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => {
            if (response.ok) {
                window.location.href = "{{ route('cultivos.index') }}";
            } else {
                return response.json().then(data => {
                    alert('Error al eliminar el cultivo');
                });
            }
        });
    });
});
</script>
</body>
</html>

@endsection