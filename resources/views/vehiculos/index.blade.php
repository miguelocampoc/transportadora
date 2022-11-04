<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            Panel de control de vehiculos
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <button type="button" id="crear_vehiculo" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i></button><br><br>
                    <table class="table table-striped table-bordered" id="vehiculos">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Cedula del conductor</th>
                                <th>Peso</th>
                                <th>Placa</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Tipo de vehiculo</th>
                                <th>id_tipo</th>
                                <th>id_condcutor</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@include('vehiculos.crear_modal')
@include('vehiculos.editar_modal')
<script>
    let vehiculo = <?php echo $vehiculos; ?>;
    let table;
    let node;
    let rowselected;
    datatable();

    function datatable(tareas) {
        table = $('#vehiculos').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "Cargando..",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ total de registros)",
                "search": "Buscar:",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
            },
            ajax: {
                "url": "/vehiculos/getVehiculo",
                "type": "GET",
                "dataSrc": "",
            },
            columns: [{
                    "data": "vid",
                    "className": "hidden"
                },
                {
                    "data": "cedula"
                },

                {
                    "data": "peso"
                },
                {
                    "data": "vplaca"
                },
                {
                    "data": "estado"
                },
                {
                    "data": "vfecha_registro"
                },
                {
                    "data": "vtiempo_registro"
                },
                {
                    "data": "tipo"
                },
                {
                    "data": "id_tipo",
                    "className": "hidden"
                },
                {
                    "data": "id_conductor",
                    "className": "hidden"
                },
                {
                    "defaultContent": "<button class='btn btn-success' onclick='btn_editar(this)'><i class='fa-sharp fa-solid fa-pen-to-square'></i></button>&nbsp&nbsp<button onclick='drop(this)' class='btn btn-primary drop-btn ml-2 '><i class='fa-solid fa-trash'></i></button>"
                },
            ],
        });
    }

    function drop(s) {
        let data = table.row($(s).parents('tr')).data();
        Swal.fire({
            title: "¿Estás Seguro?",
            html: "<span style='color:white'>¡Esto no se púede deshacer!</span>",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "¡Sí, Borrar!",
        }).then((result) => {
            if (result.isConfirmed) {
                console.log(data.id);
                axios.post('/vehiculos/destroy', {
                    id: data.vid,
                }).then(function(response) {
                    console.log(response);
                    Swal.fire({
                        icon: 'success',
                        title: 'El registro ha sido removido exitosamente. ',
                    });
                    data = table
                        .row($(s).parents('tr'))
                        .remove()
                        .draw();
                });
            }
        });
    }
    $('#btn-agregar').on('click', function() {
        let form = document.querySelector('#form_vehiculo_crear');
        var formData = new FormData(form);

        fetch('/vehiculos/crear', {
                method: 'POST', // or 'PUT'
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                }
            }).then(res => res.json())
            .catch(err => {
                console.log(err);
            })
            .then(response => {
                console.log(response);
                if (response != 200) {
                    if (typeof response.id_conductor === 'undefined') {
                        $("#error_conductor").text("");
                    }
                    $("#error_conductor").text(response.id_conductor);
                    if (typeof response.peso === 'undefined') {
                        $("#error_peso").text("");
                    }
                    $("#error_peso").text(response.peso);
                    if (typeof response.id_tipo === 'undefined') {
                        $("#error_tipo").text("");
                    }
                    $("#error_tipo").text(response.id_tipo);
                    if (typeof response.placa === 'undefined') {
                        $("#error_placa").text("");
                    }
                    $("#error_placa").text(response.placa);
                } else {
                    console.log("ok")
                    $("#error_conductor").text("");
                    $("#error_peso").text("");
                    $("#error_estado").text("");
                    $("#error_tipo").text("");
                    $("#error_placa").text("");

                    document.querySelector("#form_vehiculo_crear").reset();
                    table.ajax.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'El registro ha sido removido exitosamente. ',
                    });
                }
            });
    });
    $('#crear_vehiculo').on('click', function() {
        $('#crear').modal({
            backdrop: 'static',
            keyboard: false
        }, 'show'); // abrir

    });

    function actualizar(s) {
        let form = document.querySelector('#form_vehiculo_editar');
        var formData = new FormData(form);
        fetch('/vehiculos/update', {
                method: 'POST', // or 'PUT'
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                }
            }).then(res => res.json())
            .catch(err => {
                console.log(err);
            })
            .then(response => {
                console.log(response);
                if (response != 200) {
                    if (typeof response.id_conductor_editar === 'undefined') {
                        $("#error_conductor_e").text("");
                    }
                    $("#error_conductor_e").text(response.id_conductor);
                    if (typeof response.peso === 'undefined') {
                        $("#error_peso_e").text("");
                    }
                    $("#error_peso_e").text(response.peso);
                    if (typeof response.id_tipo_editar === 'undefined') {
                        $("#error_tipo_e").text("");
                    }
                    $("#error_tipo_e").text(response.id_tipo);
                    if (typeof response.placa === 'undefined') {
                        $("#error_placa_e").text("");
                    }
                    $("#error_placa").text(response.placa);
                } else {
                    console.log("ok")
                    $("#error_conductor_e").text("");
                    $("#error_peso_e").text("");
                    $("#error_estado_e").text("");
                    $("#error_tipo_e").text("");
                    $("#error_placa_e").text("");

                    table.ajax.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'El registro ha sido editado exitosamente. ',
                    });
                }
            });
    }

    function btn_editar(s) {
        let Tipo = s.parentNode.parentNode.cells[8].innerHTML
        let Conductor = s.parentNode.parentNode.cells[9].innerHTML

        document.querySelector("form.form_vehiculo_editar input[name='id_vehiculo']").value = s.parentNode.parentNode.cells[0].innerHTML
        document.querySelector("form.form_vehiculo_editar input[name='peso']").value = s.parentNode.parentNode.cells[2].innerHTML
        document.querySelector("form.form_vehiculo_editar input[name='placa']").value = s.parentNode.parentNode.cells[3].innerHTML

        let estado = s.parentNode.parentNode.cells[3].innerHTML;
        if (estado == "Entrada") {
            document.querySelector("form.form_vehiculo_editar select[name='estado']").selectedIndex = "1";
        }
        if (estado == "Salida") {
            document.querySelector("form.form_vehiculo_editar select[name='estado']").selectedIndex = "0";
        }

        document.querySelector("form.form_vehiculo_editar select[name='id_conductor']").selectedIndex = $("#id_conductor_editar option[value=" + Conductor + "]")[0].index;
        document.querySelector("form.form_vehiculo_editar select[name='id_tipo']").selectedIndex = $("#id_tipo_editar option[value=" + Tipo + "]")[0].index;

        $('#editar_modal').modal({
            backdrop: 'static',
            keyboard: false
        }, 'show'); // abrir
    }
</script>