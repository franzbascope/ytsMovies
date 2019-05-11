@extends('layouts.app')
@section('content')
    <style>


        .flex-container2 {
            display: flex;
            flex-wrap: wrap;
        }

        .flex-container2 > img {
            width: 200px;
            height: 100%;
            margin: 10px;
            text-align: center;
            line-height: 75px;
            font-size: 30px;
            border: 5px solid #fff;
        }








        .flex-container {
            display: flex;
            flex-wrap: wrap;
        }

        .flex-container > div {
            width: 450px;
            margin-top: 40px;
            text-align: center;
            line-height: 75px;
        }
        .detalle
        {
            width: 500px;
            border: 5px solid #fff;
        }

        #content
        {
            padding-left: 80px;
        }
        #content *
        {
            color: white;
            text-align: left;
        }
        .califiacion
        {
            width: 50px;
            float: left;
        }
        .guardar
        {
            width: 500px;

        }
        .similares
        {
            width: 300px;
        }
        .todo
        {
            margin-top: 10px;
        }

    </style>
    <div class="flex-container">
        <div id="imgc" style="margin-left: 50px">
            <img  class="detalle mb-2" alt="Sube una Imagen"
                  src="{{asset('images').'/'.$data['pelicula']['imagen']}}">
            <button class="btn btn-lg btn-success  guardar" type="button" >Descargar</button>
        </div>
        <div id="content">
            <h1 class="pt-4" >{{$data['pelicula']['nombre']}}</h1>
            <h4>{{$data['pelicula']['año']}}</h4>
            <h4>{{$data['pelicula']['genero']}}</h4>
            <h4>Disponible en :
            @foreach($data['listaCalidad'] as $objCalidad)
               {{$objCalidad->calidad.' '}}
            @endforeach
            </h4>
            <div class="todo">
                <img class="califiacion mr-3" src="{{asset('images/tomato.png')}}" alt="">
                <h4>7.8</h4>
            </div>
            <div class="todo">

                <img class="califiacion mr-3" src="{{asset('images/imdb.png')}}" alt="">
                <h4>10.0</h4>
            </div>

        </div>
        <div class="similares text-white">
            <h2>Peliculas Similares</h2>

            <div class="flex-container2">
                @foreach($data['listaPeliculas'] as $peli)
                    <img style="width: 200px;height: 100%;"  src="{{asset('images').'/'.$peli->imagen}}" alt="">
                @endforeach
            </div>
        </div>
    </div>






@endsection