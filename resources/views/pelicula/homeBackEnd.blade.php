@extends('layouts.app')
@section('content')

    <div class="row justify-content-center" style="background-color: #1d1d1d;color: white" >
        <div class="col-md-10 pt-lg-5">
            <h2>Peliculas</h2>
            <button type="button" data-toggle="modal" data-target="#createPelicula" class="btn btn-link mb-3">Nueva Pelicula</button>
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
                    <tbody id="tablaPelicula">
                    @foreach($data['peliculas'] as $objPelicula)
                        <tr id="row{{$objPelicula["id"]}}">
                            <td>{{$objPelicula["id"]}}</td>
                            <td>{{$objPelicula["nombre"]}}</td>
                            <td>{{$objPelicula["año"]}}</td>
                            <td>{{$objPelicula["ctomatoes"]}}</td>
                            <td>{{$objPelicula["cIMDB"]}}</td>
                            <td>{{$objPelicula["director"]}}</td>
                            <td>{{$objPelicula["generos"]}}</td>
                            <td> <button data-json="{{$objPelicula["id"]}} " class="btn btn-primary edit"> Editar</button></td>
                            <td>
                                <button class="btn btn-danger btnEliminar" data-json="{{$objPelicula["id"]}} " > Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                    <tr  id="plantillaPelicula" style="display: none" >
                        <td>{id}</td>
                        <td>{nombre}</td>
                        <td>{año}</td>
                        <td>{ctomatoes}</td>
                        <td>{cIMDB}</td>
                        <td>{director}</td>
                        <td>{genero}</td>
                        <td>
                            <button data-json="{5}" class="btn btn-primary edit"> Editar</button>
                        </td>
                        <td>
                            <button class="btn btn-danger btnEliminar" data-json="{6}" > Eliminar</button>
                        </td>
                    </tr>
                    </tbody>

                </table>
        </div>
    </div>

{{--Modal Create --------------------------------------------------------------------------------------------------}}


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div id="createPelicula" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nueva Pelicula</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formPelicula" action="{{ route('ajaxImageUpload') }}" enctype="multipart/form-data" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" id="id" value="0">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="inputNombre" aria-describedby="emailHelp" >
                        </div>
                        <div class="form-group">
                            <label for="staticEmail" class="col-form-label mr-3">Calidad</label>
                            <select multiple id="selectCalidad" name="calidades[]" class="form-control" multiple="multiple" >
                                @foreach($data['calidades'] as $objCalidad)
                                    <option value="{{$objCalidad->id }}">{{$objCalidad->calidad}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="staticEmail" class="col-form-label mr-3">Similares</label>
                            <select multiple name="similares[]" id="selectPelicula" name="similare" class="form-control" multiple="multiple">
                                @foreach($data['peliculas'] as $objPelicula)
                                    <option value="{{$objPelicula->id }}">{{$objPelicula->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Año</label>
                        <input type="number" max="2018" name="ano" class="form-control" id="inputAño" >
                        </div>

                        <div class="form-group">
                        <label for="exampleInputPassword1">Calificación de Rotten Tomatoes</label>
                        <input type="number" step=".01" name="calificacionR" class="form-control" id="inputCalificacionRT" >
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Calificación de IMDB</label>
                        <input type="number" step=".01" name="calificacionI" class="form-control" id="inputCalidicacionIM" >
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Director</label>
                        <input type="text"  class="form-control" name="director" id="inputDirector" >
                        </div>

                        <div class="form-group">
                        <label for="exampleInputPassword1">Genero</label>
                        <input type="text"  class="form-control" name="genero" id="inputGenero" >
                        </div>


                        <div class="form-group">
                        <label for="exampleInputPassword1">Sinopsis</label>
                        <textarea class="form-control" name="sinopsis" id="inputSinopsis" rows="3"></textarea>
                        </div>


                        <div class="form-group">
                            <label>Trailer</label>
                            <input type="file" name="video" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Imagen Portada</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success upload-image" type="submit">Guardar</button>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>





    {{--Modal Create --------------------------------------------------------------------------------------------------}}
    <script type="text/javascript">

        $( document ).ready(function() {
            // $('#selectCalidad').multiselect();
            // $('#selectPelicula').multiselect();
            $('.upload-image').on('click', function () {
                $(this).parents("form").ajaxForm(options);
            });


            var options = {
                complete: function(response)
                {
                       store(response.responseText);
                }
            };

            function store(objPelicula)
            {
                debugger
                var pelicula = JSON.parse(objPelicula);
                var trPlantilla = $('#plantillaPelicula').clone();
                var html = trPlantilla.html();
                debugger
                html = html.replace('{id}', pelicula.id);
                html = html.replace('{nombre}', pelicula.nombre);
                html = html.replace('{año}', pelicula.año);
                html = html.replace('{ctomatoes}', pelicula.ctomatoes);
                html = html.replace('{cIMDB}', pelicula.cIMDB);
                html = html.replace('{director}', pelicula.director);
                html = html.replace('{genero}', pelicula.generos);
                html = html.replace('{5}', pelicula.id);
                html = html.replace('{6}', pelicula.id);
                var nuevaFila = $("<tr ></tr>")
                if(pelicula.nuevo==1)
                {
                    debugger
                    nuevaFila.html(html);
                    nuevaFila.attr("id", "row"+pelicula.id);
                    $("#selectPelicula").append(new Option(pelicula.nombre, pelicula.id));
                }else
                    {
                         nuevaFila = $('#row' + pelicula.id);
                        nuevaFila.html(html);

                    }



                $('#tablaPelicula').append(nuevaFila);
                $('#createPelicula').modal('hide');
                $('#formPelicula')[0].reset();


            }

            function printErrorMsg (msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display','block');
                $.each( msg, function( key, value ) {
                    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                });
            }
        });

        $(document).on('click', '.btnEliminar', function () {
            var id = parseInt(JSON.parse($(this).attr('data-json')))
            var confirmacion = confirm("Está seguro que desea eliminar?");
            if (!confirmacion)
                return false;
            $.ajax(
                {
                    url: "/pelicula/delete/"+id,
                    method: 'POST',
                    data: {
                        "id": id,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function ()
                    {
                        $('#row' + id).remove();
                    }
                });
        });
        $(document).on('click', '.edit', function () {
            var id = parseInt(JSON.parse($(this).attr('data-json')))
            $.ajax({
                url: '/pelicula/edit',
                method: 'POST',
                data: {
                    id: id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    debugger
                    var response = JSON.parse(data);
                    var objPelicula = response.pelicula;
                    var listaCalidades = response.listaCalidad;
                    var listaPeliculas = response.listaPeliculas;
                    $('#id').val(objPelicula.id);
                    $('#inputNombre').val(objPelicula.nombre);
                    $('#inputAño').val(objPelicula.año);
                    $('#inputCalidicacionIM').val(objPelicula.cIMDB);
                    $('#inputCalificacionRT').val(objPelicula.ctomatoes);
                    $('#inputDirector').val(objPelicula.director);
                    $('#inputGenero').val(objPelicula.generos);
                    $('#inputSinopsis').val(objPelicula.sinapsis);
                    var calidades = new Array(100);
                    var peliculas = new Array(100);
                    for ( i in listaCalidades ) {
                        var calidad=(listaCalidades[i].calidade_id)
                        calidades.push(calidad)
                    }
                    for ( i in listaPeliculas ) {
                        var pelicula=(listaPeliculas[i].pelicula_id)
                        peliculas.push(pelicula)
                    }

                    $('#selectCalidad').val(calidades);
                    $('#selectPelicula').val(peliculas);



                    $('#createPelicula').modal('show');

                },
                error: function (jqXHR) {

                }
            });
            return false;
        });

    </script>
@endsection


