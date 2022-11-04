<div class="modal fade" id="crear" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa-solid fa-user-plus"></i> Nuevo Vehiculo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_usuarios_crear">
                    <div class="row">
                        <div class="col-xl-6 mb-3">
                            <label>Nombre</label>
                            <input type="text" id="nombre" name="nombre" placeholder="Nombre" class="form-control" required>
                            <span id="error_nombre" style="color:red; font-size:12px" class="mt-2"></span>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Apellido</label>
                            <input type="text" name="apellido" placeholder="Apellido" class="form-control" required>
                            <span id="error_apellido" style="color:red; font-size:12px" class="mt-2"></span>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Email" class="form-control" required>
                            <span id="error_email" style="color:red; font-size:12px" class="mt-2"></span>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Tipo de usuario</label>
                            <select name="tipo_usuario" class="form-control">
                                <option value="Consultor">Consultor</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Contraseña</label>
                            <input type="password" name="password" placeholder="Contraseña" class="form-control" required>
                            <span id="error_password" style="color:red; font-size:12px" class="mt-2"></span>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" placeholder="Contraseña" class="form-control" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-agregar" class="btn btn-primary">Agregar</button>
            </div>
        </div>
    </div>
</div>