@extends("../layouts.plantilla")

@section("cabecera")
	
	Editar Registros

@endsection

@section("contenido")
@if (session('danger'))
	<div class="alert alert-danger text-center">
        {{ session('danger') }}
    </div>
@endif
@if(count($errors)>0)
	<ul class="alert alert-danger text-center">	
		@foreach($errors->all() as $error)
		
		<li>{{$error}}</li>
		
		@endforeach
	</ul>	
@endif
<form method="POST" action="{{ route('archivo.update', $archivo->id) }}" enctype="multipart/form-data">
	@csrf  
	@method('PATCH')
	<div class="d-flex justify-content-center">
		@if(!empty($archivo))
				@if($archivo->codigo == 1)
					<table class="table text-center" border=1>
						<tr>
							<td class="bg-success" colspan="4">Usuario Activo</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>Nombre</td>
							<td>Apellido</td>
							<td>Código</td>
						</tr>
						<tr> 
							<td><input type="email" name="email" value="{{$archivo->email}}"></td>
							<td><input type="text" name="nombre" value="{{$archivo->nombre}}"></td>
							<td><input type="text" name="apellido" value="{{$archivo->apellido}}"></td>
							<td><input type="text" name="codigo" value="{{$archivo->codigo}}"></td>
						</tr>
					</table>
				@elseif($archivo->codigo == 2)
					<table class="table text-center" border=1>
						<tr>
							<td class="bg-danger" colspan="4">Usuario Inactivo</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>Nombre</td>
							<td>Apellido</td>
							<td>Código</td>
						</tr>
						<tr> 
							<td><input type="email" name="email" value="{{$archivo->email}}"></td>
							<td><input type="text" name="nombre" value="{{$archivo->nombre}}"></td>
							<td><input type="text" name="apellido" value="{{$archivo->apellido}}"></td>
							<td><input type="text" name="codigo" value="{{$archivo->codigo}}"></td>
						</tr>
					</table>
				@else
					<table class="table text-center" border=1>
						<tr>
							<td class="bg-warning" colspan="4">Usuario En proceso de Espera</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>Nombre</td>
							<td>Apellido</td>
							<td>Código</td>
						</tr>
						<tr> 
							<td><input type="email" name="email" value="{{$archivo->email}}"></td>
							<td><input type="text" name="nombre" value="{{$archivo->nombre}}"></td>
							<td><input type="text" name="apellido" value="{{$archivo->apellido}}"></td>
							<td><input type="text" name="codigo" value="{{$archivo->codigo}}"></td>
						</tr>
					</table>
				@endif
			</table>
		@endif
	</div>
	<button  class="btn btn-success">Guardar Cambios</button>
	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
		Eliminar Registro
	</button>
</form>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminando Registro...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Realmente desea eliminar este registro? Esta acción no se puede desahcer.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <form method="POST" action="{{ route('archivo.destroy', $archivo->id) }}">
			@csrf @method('DELETE')
        	<button type="submit" class="btn btn-primary">Confirmar</button>
   		</form>
      </div>
    </div>
  </div>
</div>

	        

@endsection
	
	@section("pie")
	
@endsection