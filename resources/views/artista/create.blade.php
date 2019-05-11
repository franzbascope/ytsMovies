@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6">
            <h2 class="text-white mt-5">Artistas</h2>
            <form method="POST" enctype="multipart/form-data" action="{{url('artista/store')}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="col-form-label text-white" for="txtNombres">Nombre:</label>
                    <input id="txtNombres" type="text" required="required" name="nombres" class="form-control"/>
                </div>
                <div class="form-group">
                    <label class="col-form-label text-white" for="txtApellidos">Foto:</label>
                    <input id="txtApellidos" type="file" required="required" name="imagen" class="form-control"/>
                </div>
                <div class="form-group">
                    <label class="col-form-label text-white" for="txtFechaNacimiento">Genero:</label>
                    <select class="form-control" name="genero"  required="required">
                        <option value="">Seleccione un Genero</option>
                        @foreach($listaGeneros as $objGenero)
                            <option value="{{$objGenero->id}}">{{$objGenero->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Guardar" class="btn btn-dark"/>
                </div>

            </form>
        </div>
    </div>
@endsection
