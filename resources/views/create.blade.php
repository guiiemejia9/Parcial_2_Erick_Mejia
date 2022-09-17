<form method="POST" v-on:submit.prevent="createDato">
    <div class="modal fade" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>cerrar</span>
                    </button>

                </div>
                <div class="modal-body">
                    <label for="nombre">Nombre del Libro</label>
                    <input type="text" name="nombre" class="form-control" v-model="newNombre">

                    <label for="fecha">Fecha de Autenticacion</label>
                    <input type="date" name="fecha" class="form-control" v-model="newFecha">

                    <label for="nombre_autor">Nombre del Autor</label>
                    <input type="text" name="nombre_autor" class="form-control" v-model="newNombre_autor">

                    <label for="serie">Numero de Serie</label>
                    <input type="number" name="serie" class="form-control" v-model="newSerie">

                    <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
            </div>
        </div>
    </div>
</form>
