
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
                    <form action="{{ route('ajaxImageUpload') }}" enctype="multipart/form-data" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <select id="example-getting-started" multiple="multiple">
                            @foreach($listaCalidades as $objCalidade)
                                <option value="{{$objCalidade->id}}">{{$objCalidade->calidad}}</option>
                            @endforeach
                        </select>
                        {{--<div class="alert alert-danger print-error-msg" style="display:none">--}}
                            {{--<ul></ul>--}}
                        {{--</div>--}}




                        {{--<div class="form-group">--}}
                            {{--<label for="exampleInputEmail1">Nombre</label>--}}
                            {{--<input type="text" class="form-control" id="inputNombre" aria-describedby="emailHelp" >--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="exampleInputPassword1">Año</label>--}}
                            {{--<input type="number" max="2018" class="form-control" id="inputAño" >--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="exampleInputPassword1">Calificación de Rotten Tomatoes</label>--}}
                            {{--<input type="number" step=".01" class="form-control" id="inputCalificacionRT" >--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="exampleInputPassword1">Calificación de IMDB</label>--}}
                            {{--<input type="number" step=".01" class="form-control" id="inputCalidicacionIM" >--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="exampleInputPassword1">Director</label>--}}
                            {{--<input type="text"  class="form-control" id="inputDirector" >--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="exampleInputPassword1">Genero</label>--}}
                            {{--<input type="text"  class="form-control" id="inputGenero" >--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="exampleInputPassword1">Sinopsis</label>--}}
                            {{--<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>--}}
                        {{--</div>--}}


                        <div class="form-group">
                            <label>Trailer</label>
                            <input type="file" name="image" class="form-control">
                        </div>


                        <div class="form-group">
                            <button class="btn btn-success upload-image" type="submit">Upload Image</button>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>

