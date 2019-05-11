@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6">
            <h2 class="text-white mt-5">Artista</h2>
            <form method="POST" enctype="multipart/form-data" action="{{action('CancioneController@update',$data['cancione']["id"])}}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label class="col-form-label text-white" for="txtNombres">Titulo:</label>
                    <input id="txtNombres" type="text" required="required" name="titulo" class="form-control" value="{{$data['cancione']['titulo']}}"/>
                </div>
                <div class="form-group">
                    <label class="col-form-label text-white" for="txtApellidos">Audio:</label>
                    <input id="txtApellidos" type="text" required="required" name="mp3" class="form-control" value="{{$data['cancione']['mp3']}}"/>
                </div>
                <div class="form-group">
                    <label class="col-form-label text-white" for="txtFechaNacimiento">Artista:</label>
                    <select class="form-control" name="artista"  required="required">
                        <option value="">Seleccione un Artista</option>
                        @foreach($data['artistas'] as $objArtista)
                            <option {{ ($objArtista->id == $data['cancione']["artista_id"]) ? 'selected':''  }} value="{{$objArtista->id}}">{{$objArtista->nombre}}</option>
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
