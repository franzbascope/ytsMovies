@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6">
            <h2 class="text-white mt-5">Genero</h2>
            <form method="POST" enctype="multipart/form-data" action="{{action('GeneroController@update',$objGenero["id"])}}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label class="col-form-label text-white" for="txtNombres">Nombre:</label>
                    <input id="txtNombres" type="text" required="required" name="nombres" class="form-control" value="{{$objGenero['nombre']}}"/>
                </div>
                <div class="form-group">
                    <label class="col-form-label text-white" for="txtApellidos">Imagen:</label>
                    <input id="txtApellidos" type="file" required="required" name="imagen" class="form-control" value="{{$objGenero['imagen']}}"/>
                </div>
                <div class="form-group">
                    <input type="submit" value="Guardar" class="btn btn-dark"/>
                </div>

            </form>
        </div>
    </div>
@endsection
