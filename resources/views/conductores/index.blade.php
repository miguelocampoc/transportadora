<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            Panel de control de conductor
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <button type="button" id="crear_conductor" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i></button><br><br>
                    <table class="table table-striped table-bordered" id="conductores">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Cedula</th>
                                <th>Placa</th>
                                <th>Licencia</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Email</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@include('conductores.crear_modal')
@include('conductores.editar_modal')
<script>
    let conductor = <?php echo $conductores; ?>;
    let table;
    let node;
    let rowselected;
    datatable();

    function datatable(tareas) {
        table = $('#conductores').DataTable({
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
                "url": "/conductores/getConductor",
                "type": "GET",
                "dataSrc": "",
            },
            columns: [{
                    "data": "id",
                    "className": "hidden"
                },
                {
                    "data": "nombre"
                },
                {
                    "data": "apellido"
                },
                {
                    "data": "cedula"
                },
                {
                    "data": "placa"
                },
                {
                    "data": "licencia"
                },
                {
                    "data": "fecha_registro"
                },
                {
                    "data": "tiempo_registro"
                },
                {
                    "data": "email"
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
                axios.post('/conductores/destroy', {
                    id: data.id,
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
        let form = document.querySelector('#form_conductor_crear');
        var formData = new FormData(form);

        fetch('/conductores/crear', {
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
                    if (typeof response.nombre === 'undefined') {
                        $("#error_nombre").text("");
                    }
                    $("#error_nombre").text(response.nombre);
                    if (typeof response.apellido === 'undefined') {
                        $("#error_apellido").text("");
                    }
                    $("#error_apellido").text(response.apellido);
                    if (typeof response.email === 'undefined') {
                        $("#error_email").text("");
                    }
                    $("#error_email").text(response.email);
                    if (typeof response.placa === 'undefined') {
                        $("#error_placa").text("");
                    }
                    $("#error_placa").text(response.placa);
                    if (typeof response.licencia === 'undefined') {
                        $("#error_licencia").text("");
                    }
                    $("#error_licencia").text(response.licencia);
                    if (typeof response.cedula === 'undefined') {
                        $("#error_cedula").text("");
                    }
                    $("#error_cedula").text(response.cedula);

                } else {
                    $("#error_nombre").text("");
                    $("#error_apellido").text("");
                    $("#error_email").text("");
                    $("#error_placa").text("");
                    $("#error_licencia").text("");
                    $("#error_cedula").text("");

                    document.querySelector("#form_conductor_crear").reset();
                    table.ajax.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'El registro ha sido editado exitosamente. ',
                    });
                }
            });
    });
    $('#crear_conductor').on('click', function() {
        $('#crear').modal({
            backdrop: 'static',
            keyboard: false
        }, 'show'); // abrir

    });

    function actualizar(s) {
        let form = document.querySelector('#form_conductor_editar');
        var formData = new FormData(form);
        fetch('/conductores/update', {
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
                    if (typeof response.nombre === 'undefined') {
                        $("#error_nombre_e").text("");
                    }
                    $("#error_nombre_e").text(response.nombre);
                    if (typeof response.apellido === 'undefined') {
                        $("#error_apellido_e").text("");
                    }
                    $("#error_apellido").text(response.apellido);
                    if (typeof response.email === 'undefined') {
                        $("#error_email_e").text("");
                    }
                    $("#error_email_e").text(response.email);
                    if (typeof response.placa === 'undefined') {
                        $("#error_placa_e").text("");
                    }
                    $("#error_placa_e").text(response.placa);
                    if (typeof response.licencia === 'undefined') {
                        $("#error_licencia_e").text("");
                    }
                    $("#error_licencia_e").text(response.licencia);
                    if (typeof response.cedula === 'undefined') {
                        $("#error_cedula_e").text("");
                    }
                    $("#error_cedula_e").text(response.cedula);
                } else {
                    console.log("ok")
                    $("#error_nombre_e").text("");
                    $("#error_apellido_e").text("");
                    $("#error_email_e").text("");
                    $("#error_placa_e").text("");
                    $("#error_licencia_e").text("");
                    $("#error_cedula_e").text("");

                    console.log("ok")
                    table.ajax.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'El registro ha sido removido exitosamente. ',
                    });
                }
            });
    }

    function btn_editar(s) {
        document.querySelector("form.form_conductor_editar input[name='id_conductor']").value = s.parentNode.parentNode.cells[0].innerHTML;
        document.querySelector("form.form_conductor_editar input[name='nombre']").value = s.parentNode.parentNode.cells[1].innerHTML;
        document.querySelector("form.form_conductor_editar input[name='apellido']").value = s.parentNode.parentNode.cells[2].innerHTML;
        document.querySelector("form.form_conductor_editar input[name='cedula']").value = s.parentNode.parentNode.cells[3].innerHTML;
        document.querySelector("form.form_conductor_editar input[name='email']").value = s.parentNode.parentNode.cells[8].innerHTML;
        document.querySelector("form.form_conductor_editar input[name='placa']").value = s.parentNode.parentNode.cells[4].innerHTML;
        document.querySelector("form.form_conductor_editar input[name='licencia']").value = s.parentNode.parentNode.cells[5].innerHTML;

        $('#editar_modal').modal({
            backdrop: 'static',
            keyboard: false
        }, 'show'); // abrir
    }
</script>