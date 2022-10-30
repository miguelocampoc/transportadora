<div class="modal fade" id="crear" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa-solid fa-user-plus"></i>Crear Conductor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_conductor_crear">
                    <div class="row">
                        <div class="col-xl-6 mb-3">
                            <label>Nombre</label>
                            <input type="text" name="nombre" placeholder="Nombre" class="form-control" required>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Apellido</label>
                            <input type="text" name="apellido" placeholder="Apellido" class="form-control" required>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Cedula</label>
                            <input type="text" name="Cedula" placeholder="Cedula" class="form-control" required>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Email</label>
                            <input type="Email" name="Email" placeholder="Email" class="form-control" required>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Placa Del Vehiculo</label>
                            <input type="text" name="Placa" placeholder="Placa" class="form-control" required>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Licencia</label>
                            <input type="text" name="Licencia" placeholder="Licencia" class="form-control" required>
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