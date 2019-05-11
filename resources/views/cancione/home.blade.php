@extends('layouts.app')
@section('content')

    <h1 class=" pt-5 pb-2  text-white font-weight-bold ml-4">Canciones </h1>
    <a href="{{url('cancione/create')}}"  class="btn btn-dark m-4">Nueva Cancion</a>
    <div class="flex-container " >
        @foreach($listaCanciones as $objCancione)
            <div class="container mb-6"  style="margin-right: 150px">
                <figure >
                    {{--{{$objCancione["mp3"]}}--}}
                    <iframe  width="300px" height="300px" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/319291684&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
                    <div class="overlay" style="margin-top: 60px">
                        {{--<a    href="/artista/genero/{{$objCancione["id"]}}"   >--}}
                            {{--<i  class="far fa-eye icon"></i>--}}
                        {{--</a>--}}
                        <a class="edit " data-id=""  href="{{action('CancioneController@edit',$objCancione["id"])}}"  >
                            <i   class="far fa-edit icon"></i>
                        </a>
                        <form method="POST" action="{{action('CancioneController@destroy',$objCancione["id"])}}">
                            @csrf
                            @method('DELETE')
                            <button style="background:transparent;border-style:none"  type="submit" onclick="return confirm('Está Seguro que desea eliminar?');" class="btnEliminar">
                                <a class="edit " data-id=""  href="java"  >
                                    <i style="margin-left:32px;"  class="fas fa-trash-alt icon"></i>
                                </a>
                            </button>
                        </form>
                    </div>
                    <figcaption></figcaption>
                    <h5 class="text-white ">{{$objCancione['titulo']}}</h5>
                </figure>
            </div>
        @endforeach
    </div>


@endsection