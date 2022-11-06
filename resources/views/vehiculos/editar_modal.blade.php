<div class="modal fade" id="editar_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa-solid fa-user-plus"></i> Editar vehiculos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_vehiculo_editar" class="form_vehiculo_editar">
                    <div class="row">
                        <div class="col-xl-6 mb-3">
                            <label>Conductor</label>
                            <input type="hidden" name="id_vehiculo" id="id_vehiculo" placeholder="id" class="form-control" required>
                            <select id="id_conductor_editar" name="id_conductor" class="form-control">
                                @foreach($conductores as $conductor)
                                <option value='{{$conductor->id}}'>{{$conductor->nombre}} {{$conductor->apellido}} - CC{{$conductor->cedula}}</option>
                                @endforeach
                            </select>
                            <span id="error_conductor_e" style="color:red; font-size:12px" class="mt-2"></span>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Peso</label>
                            <input type="text" name="peso" placeholder="peso" class="form-control" required>
                            <span id="error_peso_e" style="color:red; font-size:12px" class="mt-2"></span>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>placa</label>
                            <input type="text" name="placa" placeholder="placa" class="form-control" required>
                            <span id="error_placa_e" style="color:red; font-size:12px" class="mt-2"></span>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Estado</label>
                            <select name="estado" class="form-control">
                                <option value="Entrado">Entrado</option>
                                <option value="Salida">Salida</option>
                            </select>
                            <span id="error_estado_e" style="color:red; font-size:12px" class="mt-2"></span>
                        </div>

                        <div class="col-xl-6 mb-3">
                            <label>Tipo de vehiculo</label>
                            <select name="id_tipo" id="id_tipo_editar" class="form-control">
                                @foreach($tipos as $tipo)
                                <option value={{$tipo->id}}>{{$tipo->tipo}}</option>
                                @endforeach
                            </select>
                            <span id="error_tipo_e" style="color:red; font-size:12px" class="mt-2"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="actualizar()" class="btn btn-primary">Editar</button>
            </div>
        </div>
    </div>
</div>
<script>
    let conductor = <?php echo $conductores; ?>;
    let tipo = <?php echo $tipos; ?>;
</script>