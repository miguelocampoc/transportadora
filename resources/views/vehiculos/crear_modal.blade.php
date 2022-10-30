<div class="modal fade" id="crear_vehiculo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa-solid fa-user-plus"></i>Crear vehiculo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_vehiculo_crear">
                    <div class="row">
                        <div class="col-xl-6 mb-3">
                            <label>Tipo de vehiculo</label>
                            <input type="text" name="Tipo" placeholder="Tipo" class="form-control" required>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Nombre Del conductor</label>
                            <input type="text" name="NombreC" placeholder="NombreC" class="form-control" required>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Peso</label>
                            <input type="text" name="Peso" placeholder="Peso" class="form-control" required>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Placa</label>
                            <input type="Email" name="Placa" placeholder="Placa" class="form-control" required>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Estado</label>
                            <input type="text" name="Estado" placeholder="Estado" class="form-control" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-agregar-conductor" class="btn btn-primary">Editar</button>
            </div>
        </div>
    </div>
</div>