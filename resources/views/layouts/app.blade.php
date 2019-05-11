<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}" ></script>--}}
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}" ></script>
    <script src="{{ asset('js/jquery.form.min.js') }}" ></script>
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <script type="text/javascript" src="{{asset('js/bootstrap-multiselect.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/bootstrap-multiselect.css')}}" type="text/css"/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <style>
        #buscador
        {
            width: 250px;
            height: 35px;
            font-size: 15px;
            font-weight: 700;
            color: #919191;
            border: 2px solid #333;
            padding: 4px 30px;
            background: #1d1d1d;
            border-radius: 15px;
            text-decoration: none;

        }
        #buscador:hover
        {
            border: none;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #171717">
    <img style="width: 7%" src="{{asset('images/Logo-YTS.svg.png')}}" alt="">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
           <h3 class="text-secondary mt-2 mr-4 ml-3">HD movies at the smallest file size.</h3>

        </ul>
        <form id="buscar" class="form-inline" method="POST"  action="{{url('pelicula/buscar')}}">
            @csrf
            <input id="buscador" type="search"  name="pelicula" placeholder="Quick Search">
        </form>
        <div id="movieList">
        </div>
        <a href="/" class="btn btn-link text-secondary btn-lg">Browse</a>
        <a href="{{url('pelicula')}}"  class="btn btn-link text-secondary btn-lg"> Peliculas</a>
        <a href="{{url('calidade')}}"  class="btn btn-link text-secondary btn-lg">Formatos de Calidad</a>


    </div>
</nav>


<div style="background-color: #1d1d1d;height: 1024px">
    @yield('content')
</div>



</body>
<script>
    $('#buscador').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {$.ajax({
                url:"{{ route('autocomplete.fetch') }}",
                method:"POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{query:query},
                success:function(data){
                    $('#movieList').fadeIn();
                    $('#movieList').html(data);
                }
            });
        }
    });

    $(document).on('click', 'li', function(){
        debugger
        $('#buscador').val($(this).text());
        $('#movieList').fadeOut();
        $( "#buscar" ).submit();
    });
    $(document).click(function() {
        $('#movieList').fadeOut();
    });
    $('#buscador').keypress(function (e) {
        var key = e.which;
        if(e.keyCode ==13)
        {
            $( "#buscar" ).submit();

        }
    });

</script>
</html>
