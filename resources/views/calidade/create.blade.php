
<meta name="csrf-token" content="{{ csrf_token() }}">
<div id="createCalidade" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nueva Pelicula</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formCalidad" >
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Formato de Calidad</label>
                        <input id="calidad" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Solo Acepta Numeros Enteros">
                    </div>
                    <input type="hidden" id="id">
                </form>
            </div>
            <div class="modal-footer">
                <button id="guardarCalidade" type="button" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

