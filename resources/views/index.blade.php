@extends("../layouts.plantilla")

@section("cabecera")
	
	Registros

@endsection

@section("contenido")
@if (session('status'))
    <div class="alert alert-success text-center">
        {{ session('status') }}
    </div>
@elseif (session('danger'))
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
<form method="POST" action="{{ route('archivo.store') }}" enctype="multipart/form-data">
	@csrf
	@if(empty($archivos))
	<table class="table" border=1>
		<tr>
			<td>Email</td>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Código</td>
		</tr>
		<tr> 
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>
	@else
		@foreach($archivos as $archivo)
			@if($archivo['codigo'] == 1)
				<table class="table" border=1>
					<tr>
						<td class="bg-success" colspan="4">Usuarios Activos</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>Nombre</td>
						<td>Apellido</td>
						<td>Código</td>
					</tr>
					<tr> 
						<td><a href="{{route('archivo.edit', $archivo->id)}}">{{$archivo->email}}</a></td>
						<td>{{$archivo->nombre}}</td>
						<td>{{$archivo->apellido}}</td>
						<td>{{$archivo->codigo}}</td>
					</tr>
				</table>
			@elseif($archivo['codigo'] == 2)
				<table class="table" border=1>
					<tr>
						<td class="bg-danger" colspan="4">Usuarios Inactivos</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>Nombre</td>
						<td>Apellido</td>
						<td>Código</td>
					</tr>
					<tr> 
						<td><a href="{{route('archivo.edit', $archivo->id)}}">{{$archivo->email}}</a></td>
						<td>{{$archivo->nombre}}</td>
						<td>{{$archivo->apellido}}</td>
						<td>{{$archivo->codigo}}</td>
					</tr>
				</table>
			@else
				<table class="table" border=1>
					<tr>
						<td class="bg-warning" colspan="4">Usuarios En proceso de Espera</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>Nombre</td>
						<td>Apellido</td>
						<td>Código</td>
					</tr>
					<tr> 
						<td><a href="{{route('archivo.edit', $archivo->id)}}">{{$archivo->email}}</a></td>
						<td>{{$archivo->nombre}}</td>
						<td>{{$archivo->apellido}}</td>
						<td>{{$archivo->codigo}}</td>
					</tr>
				</table>
			@endif
		@endforeach
		</table>
	@endif
	
	<input type="file" name="archivo" required>
	<button type="submit" class="btn btn-primary mt-2">Subir registro</button>
	
</form>

@endsection
	
	@section("pie")
	
@endsection