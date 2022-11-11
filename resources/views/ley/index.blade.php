<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            Comprobante de material
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="modal-body">
                        <button type="button" id="crear_comprobante" class="btn btn-primary"><i class="fa-solid fa-file-circle-plus"></i></button><br><br>
                        <table class="table table-striped table-bordered" id="Comprobante">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Cedula del conductor</th>
                                    <th>fecha de entrada</th>
                                    <th>fecha de salida</th>
                                    <th>cliente</th>
                                    <th>producto</th>
                                    <th>Destino</th>
                                    <th>observaciones</th>
                                    <th>opciones</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
@include('ley.crear_modal')
<script>
    let ley = <?php echo $ley; ?>;
    let table;
    let node;
    let rowselected;
    datatable();

    function datatable(tareas) {
        table = $('#Comprobante').DataTable({
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
                "url": "/ley/getLey",
                "type": "GET",
                "dataSrc": "",
            },
            columns: [{
                    "data": "LeyId",
                    "className": "hidden"
                },
                {
                    "data": "cedula"
                },
                {
                    "data": "fecha_entrada"
                },
                {
                    "data": "fecha_salida"
                },
                {
                    "data": "cliente"
                },
                {
                    "data": "producto"
                },
                {
                    "data": "ciudad_entrada"
                },
                {
                    "data": "observaciones",
                },
                {
                    "defaultContent": "<button class='btn btn-danger' onclick='btn_descargar(this)'><i class='fa-solid fa-download'></i></button>&nbsp&nbsp<button onclick='drop(this)' class='btn btn-primary drop-btn ml-2 '><i class='fa-solid fa-trash'></i></button>"
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
                console.log(data.LeyId);
                axios.post('/ley/destroy', {
                    id: data.LeyId,
                }).then(function(response) {
                    console.log(response);
                    Swal.fire({
                        icon: 'success',
                        title: 'El registro ha sido removido exitosamente.',
                    });
                    data = table
                        .row($(s).parents('tr'))
                        .remove()
                        .draw();
                });
            }
        });
    }

    function btn_descargar(s){
        let data = table.row($(s).parents('tr')).data();
       location.href=`/pdf/${data.id}`;
    }
    $('#btn-agregar').on('click', function() {
        let form = document.querySelector('#form_ley_añadir');
        var formData = new FormData(form);

        fetch('/ley/crear', {
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

                } else {
                    document.querySelector("#form_ley_añadir").reset();
                    table.ajax.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'El registro ha sido removido exitosamente. ',
                    });
                }

            });
    });
    $('#crear_comprobante').on('click', function() {
        $('#crear_modal').modal({
            backdrop: 'static',
            keyboard: false
        }, 'show'); // abrir

    });
</script>