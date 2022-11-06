<div class="modal fade" id="crear_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa-solid fa-user-plus"></i> Añadir comprobante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_ley_añadir">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Conductor</th>
                                <th scope="col">Fecha de entrada</th>
                                <th scope="col">Fecha de salida</th>
                                <th scope="col">Cliente</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> <select id="id_conductor" name="id_conductor" class="form-control" required>
                                        @foreach($conductores as $conductor)
                                        <option value='{{$conductor->id}}'>{{$conductor->nombre}} {{$conductor->apellido}} - CC{{$conductor->cedula}}</option>
                                        @endforeach
                                    </select>
                                    <span id="error_Conductor" style="color:red; font-size:12px" class="mt-2"></span>
                                </td>
                                <td><input type="date" name="fecha_entrada" placeholder="Fecha" class="form-control" required>
                                    <span id="error_FechaEntrada" style="color:red; font-size:12px" class="mt-2"></span>
                                </td>
                                <td><input type="date" name="fecha_salida" placeholder="peso" class="form-control" required>
                                    <span id="error_FechaSalida" style="color:red; font-size:12px" class="mt-2"></span>
                                </td>
                                <td><input type="text" name="cliente" placeholder="Cliente" class="form-control" required>
                                    <span id="error_Cliente" style="color:red; font-size:12px" class="mt-2"></span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">Producto</th>
                                <th scope="col">Cargue</th>
                                <th scope="col">Descargue</th>
                                <th scope="col">Ciudad de entrada</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="producto" placeholder="producto" class="form-control" required>
                                    <span id="error_producto" style="color:red; font-size:12px" class="mt-2"></span>
                                </td>
                                <td><input type="text" name="cargue" placeholder="cargue" class="form-control" required>
                                    <span id="error_cargue" style="color:red; font-size:12px" class="mt-2"></span>
                                </td>
                                <td><input type="text" name="descargue" placeholder="Descargue" class="form-control" required>
                                    <span id="error_descargue" style="color:red; font-size:12px" class="mt-2"></span>
                                </td>
                                <td><select class="form-control" name='ciudad_entrada' id="ciudad_entrada" required>
                                        <option value="Arauca">Arauca</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Barranquilla">Barranquilla</option>
                                        <option value="Bogotá">Bogotá</option>
                                        <option value="Bucaramanga">Bucaramanga</option>
                                        <option value="Cali">Cali</option>
                                        <option value="Cartagena">Cartagena</option>
                                        <option value="Cúcuta">Cúcuta</option>
                                        <option value="Florencia">Florencia</option>
                                        <option value="Ibagué">Ibagué</option>
                                        <option value="Leticia">Leticia</option>
                                        <option value="Manizales">Manizales</option>
                                        <option value="Medellín">Medellín</option>
                                        <option value="Mitú">Mitú</option>
                                        <option value="Mocoa">Mocoa</option>
                                        <option value="Montería">Montería</option>
                                        <option value="Neiva">Neiva</option>
                                        <option value="Pasto">Pasto</option>
                                        <option value="Pereira">Pereira</option>
                                        <option value="Popayán">Popayán</option>
                                        <option value="Puerto Carreño">Puerto Carreño</option>
                                        <option value="Puerto Inírida">Puerto Inírida</option>
                                        <option value="Quibdó">Quibdó</option>
                                        <option value="Riohacha">Riohacha</option>
                                        <option value="San Andrés">San Andrés</option>
                                        <option value="San José del Guaviare">San José del Guaviare</option>
                                        <option value="Santa Marta">Santa Marta</option>
                                        <option value="Sincelejo">Sincelejo</option>
                                        <option value="Tunja">Tunja</option>
                                        <option value="Valledupar">Valledupar</option>
                                        <option value="Villavicencio">Villavicencio</option>
                                        <option value="Yopal">Yopal</option>
                                    </select>
                                    <span id="error_ciudad_entrada" style="color:red; font-size:12px" class="mt-2"></span>
                                </td>

                            </tr>
                            <tr>
                                <th scope="col">Ciudad de salida</th>
                                <th scope="col">Peso de entrada</th>
                                <th scope="col">Peso de salida</th>
                                <th scope="col">Observaciones</th>
                            </tr>
                            <tr>
                                <td><select class="form-control" name="ciudad_salida" id="ciudad_salida" required>
                                        <option value="Arauca">Arauca</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Barranquilla">Barranquilla</option>
                                        <option value="Bogotá">Bogotá</option>
                                        <option value="Bucaramanga">Bucaramanga</option>
                                        <option value="Cali">Cali</option>
                                        <option value="Cartagena">Cartagena</option>
                                        <option value="Cúcuta">Cúcuta</option>
                                        <option value="Florencia">Florencia</option>
                                        <option value="Ibagué">Ibagué</option>
                                        <option value="Leticia">Leticia</option>
                                        <option value="Manizales">Manizales</option>
                                        <option value="Medellín">Medellín</option>
                                        <option value="Mitú">Mitú</option>
                                        <option value="Mocoa">Mocoa</option>
                                        <option value="Montería">Montería</option>
                                        <option value="Neiva">Neiva</option>
                                        <option value="Pasto">Pasto</option>
                                        <option value="Pereira">Pereira</option>
                                        <option value="Popayán">Popayán</option>
                                        <option value="Puerto Carreño">Puerto Carreño</option>
                                        <option value="Puerto Inírida">Puerto Inírida</option>
                                        <option value="Quibdó">Quibdó</option>
                                        <option value="Riohacha">Riohacha</option>
                                        <option value="San Andrés">San Andrés</option>
                                        <option value="San José del Guaviare">San José del Guaviare</option>
                                        <option value="Santa Marta">Santa Marta</option>
                                        <option value="Sincelejo">Sincelejo</option>
                                        <option value="Tunja">Tunja</option>
                                        <option value="Valledupar">Valledupar</option>
                                        <option value="Villavicencio">Villavicencio</option>
                                        <option value="Yopal">Yopal</option>
                                    </select>
                                    <span id="error_ciudad_salida" style="color:red; font-size:12px" class="mt-2"></span>
                                </td>
                                <td><input type="text" name="peso_entrada" placeholder="peso entrada" class="form-control" required>
                                    <span id="error_peso_entrada" style="color:red; font-size:12px" class="mt-2"></span>
                                </td>
                                <td><input type="text" name="peso_salida" placeholder="Peso salida" class="form-control" required>
                                    <span id="error_peso_salida" style="color:red; font-size:12px" class="mt-2"></span>
                                </td>
                                <td><input type="text" name="observaciones" placeholder="Observaciones" class="form-control" required>
                                    <span id="error_observaciones" style="color:red; font-size:12px" class="mt-2"></span>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-agregar" class="btn btn-primary">Agregar</button>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    let conductor = <?php echo $conductores; ?>;
</script>