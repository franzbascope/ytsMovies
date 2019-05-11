@extends('layouts.app')
@section('content')

    <div class="flex-container " style="padding-top: 85px;padding-left: 125px" >
        @foreach($listaPeliculas as $objPelicula)
            <div class="container mb-5">
                <figure >
                    <img  class="image"  style="height: 290px;border: 5px solid white;border-radius: 8px" alt="Sube una Imagen"
                          src="{{asset('images').'/'.$objPelicula['imagen']}}">
                    <div class="overlay">


                        <a style="margin-top: 125px" href="{{action('PeliculaController@detalle',$objPelicula["id"])}}" class="btn btn-success  btn-lg" >
                            Ver detalle
                        </a>
                    </div>
                    <figcaption></figcaption>
                    <h5 class="text-white mt-2">{{$objPelicula['nombre']}}</h5>
                </figure>
            </div>
        @endforeach
    </div>


@endsection