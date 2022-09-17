<form method="POST" v-on:submit.prevent="updateDato(fillDato.id)">
    <div class="modal fade" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <h4>Editar</h4>
                </div>
                <div class="modal-body">
                    <label for="nombre">Actualizar Nombre del Libro</label>
                    <input type="text" name="nombre" class="form-control" v-model="fillDato.nombre">

                    <label for="fecha">Actualizar la Fecha de Autenticacion</label>
                    <input type="text" name="fecha" class="form-control" v-model="fillDato.fecha">

                    <label for="nombre_autor">Actualizar Nombre del Autor</label>
                    <input type="text" name="nombre_autor" class="form-control" v-model="fillDato.nombre_autor">

                    <label for="serie">Actualizar Numero de Serie</label>
                    <input type="text" name="serie" class="form-control" v-model="fillDato.serie">

                    <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Actualizar">
                </div>
            </div>
        </div>
    </div>
</form>
