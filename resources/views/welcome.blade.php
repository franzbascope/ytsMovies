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
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
</head>
<body>
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand mb-3 mt-3">
                <a href="#">
                    <img src="images/Spotify_Logo_CMYK_White.png" alt="" style="width: 150px;padding-top: 15px;padding-bottom: 15px">
                </a>
            </li>
            <li>
                <a  href="#"><i class="fas fa-search mr-2"></i>Buscar</a>
            </li>
            <li>
                <a  href="#"><i class="fas fa-align-left mr-2"></i>Biblioteca</a>
            </li>
            <li>
                <a  href="#"><i class="fas fa-users mr-2"></i>Artistas</a>
            </li>
            <li>
                <a  href="#"><i class="fas fa-drum mr-2"></i>Generos</a>
            </li>

        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div class="content pl-5">
        <h1 class=" pt-5 pb-2  text-white font-weight-bold">Generos y estados de animo</h1>
        <div class="flex-container">
            <div class="rounded">
                <img src="images/genero.jpg" alt="" style="height:85%;width:100%;">
                <h6 class="text-white m-1 font-weight-bold">Latino</h6>
            </div>
            <div>2</div>
            <div>3</div>
            <div>4</div>
            <div>5</div>
            <div>6</div>
            <div>7</div>
            <div>8</div>
            <div>9</div>
            <div>10</div>
            <div>11</div>
            <div>12</div>
            <div>6</div>
            <div>7</div>
            <div>8</div>
            <div>9</div>
            <div>10</div>
            <div>11</div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#page-content-wrapper -->

</div>
</body>
<script>
    $("#wrapper").toggleClass("toggled");
    // $("#menu-toggle").click(function (e) {
    //     e.preventDefault();
    //     $("#wrapper").toggleClass("toggled");
    // });
</script>
</html>
