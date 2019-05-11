@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6">
            <h2 class="text-white mt-5">Nueva Cancion</h2>
            <form method="POST" action="{{url('cancione/store')}}">
                @csrf
                <div class="form-group">
                    <label class="col-form-label text-white" for="txtNombres">Titulo:</label>
                    <input id="txtNombres" type="text" required="required" name="titulo" class="form-control"/>
                </div>
                <div class="form-group">
                    <label class="col-form-label text-white" for="txtNombres">Audio:</label>
                    <input id="txtNombres" type="text" required="required" name="audio" class="form-control"/>
                </div>
                <div class="form-group">
                    <label class="col-form-label text-white" for="txtFechaNacimiento">Arista:</label>
                    <select class="form-control" name="artista"  required="required">
                        <option value="">Seleccione un Artista</option>
                        @foreach($listaArtistas as $objArtista)
                            <option value="{{$objArtista->id}}">{{$objArtista->nombre}}</option>
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
