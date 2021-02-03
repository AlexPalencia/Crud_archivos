@extends("../layouts.plantilla")

@section("cabecera")
    
    Inicio

@endsection

@section("contenido")
<div class="text-center">
    <a class="display-4" href="{{ route('archivo.index') }}">Quiero subir un archivo</a>
</div>
@endsection
    
    @section("pie")
    
@endsection