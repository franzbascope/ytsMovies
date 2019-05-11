@extends('layouts.app')
@extends('pelicula.create')
@section('content')



    <div class="row justify-content-center" style="background-color: #1d1d1d;color: white" >
        <div class="col-md-10 pt-lg-5">
            <h2>Formatos de Calidad</h2>
            <button type="button" data-toggle="modal" data-target="#crearFormato" class="btn btn-link mb-3">Nuevo Formato de Calidad</button>
            <table class="table" style="color: white">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Año</th>
                    <th>Calificación de Rotten Tomatoes</th>
                    <th>Calificación de IMDB</th>
                    <th>Director</th>
                    <th>Genero</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listaPeliculas as $objPelicula)
                    <tr>
                        <td>{{$objPelicula["id"]}}</td>
                        <td>{{$objPelicula["nombre"]}}</td>
                        <td>{{$objPelicula["año"]}}</td>
                        <td>{{$objPelicula["ctomatoes"]}}</td>
                        <td>{{$objPelicula["cIMDB"]}}</td>
                        <td>{{$objPelicula["director"]}}</td>
                        <td>{{$objPelicula["genero"]}}</td>
                        <td><a href="/persona/{{$objPelicula["id"]}}" class="btn btn-primary">Editar</a></td>
                        <td>
                            <form method="POST" action="{{action('PersonaController@destroy',$objPelicula["id"])}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger btnEliminar" value="Eliminar" onclick="return confirm('Está Seguro que desea eliminar?');"/>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>


@endsection