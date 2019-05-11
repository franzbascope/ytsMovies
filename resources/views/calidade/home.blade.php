@extends('layouts.app')
@extends('calidade.create')
@section('content')


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row justify-content-center" style="background-color: #1d1d1d;color: white" >
        <div class="col-md-8 pt-lg-5">
            <h2>Formatos de Calidad</h2>
            <button type="button" data-toggle="modal" data-target="#createCalidade" class="btn btn-link mb-3">Introduce un Formato</button>
            <table class="table" style="color: white">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Formato de Calidad</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody id="tablaCalidade">

                @foreach($listaCalidades as $objCallidade)
                    <tr id="row{{$objCallidade["id"]}}">
                        <td>{{$objCallidade["id"]}}</td>
                        <td>{{$objCallidade["calidad"]}}</td>
                        <td> <button data-json="{{$objCallidade["id"]}} " class="btn btn-primary edit"> Editar</button></td>
                        <td>
                            <button class="btn btn-danger btnEliminar" data-json="{{$objCallidade["id"]}} " > Eliminar</button>
                        </td>
                    </tr>
                @endforeach
                    <tr  id="plantillaCalidade" style="display: none" >
                        <td>{id}</td>
                        <td>{calidad}</td>
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
    <script type="text/javascript">
        $(document).ready(function () {

            //Guardar Calidade
            $('#guardarCalidade').on('click', function () {
                var id=0;
                try {
                    id= $('#id').val()
                }
                catch(err) {
                    console.log('No es edicion')
                }
                if(id==0)
                {
                    store()

                }else
                {

                    update()
                }

                return false;
            });
            function store() {

                var parametros = {
                    calidad: $('#calidad').val()
                };
                $.ajax({
                    url: '/calidade/store',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: parametros,
                    success: function (e) {
                        var objCalidade = JSON.parse(e);
                        var calidad=objCalidade.calidad;
                        var id=objCalidade.id;
                        var trPlantilla = $('#plantillaCalidade').clone();
                        var html = trPlantilla.html();
                        html = html.replace('{calidad}', calidad);
                        html = html.replace('{id}', id);
                        html = html.replace('{5}', id);
                        html = html.replace('{6}', id);
                        var nuevaFila = $("<tr ></tr>")
                        nuevaFila.attr("id", "row"+id);
                        nuevaFila.append(html);
                        $('#createCalidade').modal('hide');
                        $('#tablaCalidade').append(nuevaFila);
                        $('#formCalidad')[0].reset();
                        $('#calidad').val('');


                    },
                    error(e) {
                        console.log(e);
                    }
                });
            }

            function update() {
                var parametros = {
                    calidad: $('#calidad').val(),
                    id: $('#id').val()
                };
                $.ajax({
                    url: '/calidade/update',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: parametros,
                    success: function (e) {
                        var objCalidade = JSON.parse(e);
                        var calidad=objCalidade.calidad;
                        var id=objCalidade.id;
                        var trPlantilla = $('#plantillaCalidade').clone();
                        var html = trPlantilla.html();
                        html = html.replace('{calidad}', calidad);
                        html = html.replace('{id}', id);
                        html = html.replace('{5}', id);
                        html = html.replace('{6}', id);
                        var nuevaFila = $('#row' + objCalidade.id);
                        nuevaFila.html(html);
                        $('#createCalidade').modal('toggle');
                        $('#id').val('');
                        $('#formCalidad')[0].reset();

                    },
                    error(e) {
                        console.log(e);
                    }
                });
            }

            // Delete Calidad
            $(document).on('click', '.btnEliminar', function () {
                var id = parseInt(JSON.parse($(this).attr('data-json')))
                var confirmacion = confirm("Está seguro que desea eliminar?");
                if (!confirmacion)
                    return false;
                $.ajax(
                    {
                        url: "/calidade/delete/"+id,
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
                    url: '/calidade/edit',
                    method: 'POST',
                    data: {
                        id: id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        var objCalidade = JSON.parse(data);
                        $('#calidad').val(objCalidade.calidad);
                        $('#id').val(objCalidade.id);
                        $('#createCalidade').modal('show');

                    },
                    error: function (jqXHR) {

                    }
                });
                return false;
            });
        });
    </script>

@endsection

