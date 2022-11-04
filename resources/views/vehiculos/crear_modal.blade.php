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
                <form id="form_vehiculo_crear">
                    <div class="row">
                        <div class="col-xl-6 mb-3">
                            <label>Conductor</label>
                            <select id="id_conductor" name="id_conductor" class="form-control">
                                @foreach($conductores as $conductor)
                                <option value={{$conductor->id}}>{{$conductor->nombre}} {{$conductor->apellido}} - CC{{$conductor->cedula}}</option>
                                @endforeach
                            </select>
                            <span id="error_conductor" style="color:red; font-size:12px" class="mt-2"></span>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Peso</label>
                            <input type="text" name="peso" id="peso" placeholder="Peso" class="form-control" required>
                            <span id="error_peso" style="color:red; font-size:12px" class="mt-2"></span>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Placa</label>
                            <select name="placa" id="placa" class="form-control">
                                @foreach($conductores as $conductor)
                                <option value={{$conductor->placa}}>{{$conductor->placa}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Estado</label>
                            <select name="estado" class="form-control">
                                <option value="Entrado">Entrado</option>
                                <option value="Salida">Salida</option>
                            </select>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label>Tipo de vehiculo</label>
                            <select name="id_tipo" id="id_tipo" class="form-control">
                                @foreach($tipos as $tipo)
                                <option value={{$tipo->id}}>{{$tipo->tipo}}</option>
                                @endforeach
                            </select>
                            <span id="error_tipo" style="color:red; font-size:12px" class="mt-2"></span>
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
<script>
    let conductor2 = <?php echo $conductores; ?>;
    let tipo2 = <?php echo $tipos; ?>;

</script>