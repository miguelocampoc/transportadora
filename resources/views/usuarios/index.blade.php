<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            Panel de control de usuarios
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <button type="button" id="crear_usuario" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i></button><br><br>
                    <table class="table table-striped table-bordered" id="users">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Tipo</th>
                                <th>Email</th>
                                <th>Fecha de registro</th>
                                <th>Tiempo de registro</th>
                                <th>opciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@include('usuarios.crear_modal')
@include('usuarios.editar_modal') 
<script>
    let usuarios = <?php echo $users; ?>;
    let table;
    let node;
    let rowselected;
    datatable();

    function datatable(tareas) {
        table = $('#users').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "No hay registros",
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
            data: usuarios,
            columns: [{
                    "data": "id"
                },
                {
                    "data": "nombre"
                },
                {
                    "data": "apellido"
                },
                {
                    "data": "tipo_usuario"
                },

                {
                    "data": "email"
                },
                {
                    "data": "fecha_registro"
                },
                {
                    "data": "tiempo_registro"
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
                axios.post('/usuarios/destroy', {
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
        let form = document.querySelector('#form_usuarios_crear');
        var formData = new FormData(form);

        fetch('/usuarios/crear', {
                method: 'POST', // or 'PUT'
                body: formData, 
                headers:{
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",

                }
            }).then(res => res.json())
            .catch(err => {
                console.log(err);
            })
            .then(response =>{
               if(response!=200){
                console.log(response )
               }
               else{
                console.log("ok" )

               }

            } 
            );


    });
    $('#crear_usuario').on('click', function() {
        $('#crear').modal({
            backdrop: 'static',
            keyboard: false
        }, 'show'); // abrir

    });

    function actualizar(s) {
        rowselected = table.row($(s).parents('tr'));
        let id = s.parentNode.parentNode.cells[1].innerHTML;
        let title = s.parentNode.parentNode.cells[2].innerHTML;
        let completed = s.parentNode.parentNode.cells[3].innerHTML;
        node = s.parentNode.parentNode;
        console.log(s.parentNode.parentNode);
        document.getElementById("id").value = id;
        document.getElementById("title").value = title;
        document.getElementById("completed").value = completed;

    }

    function btn_editar(s) {
        $('#editar_modal').modal({
            backdrop: 'static',
            keyboard: false
        }, 'show'); // abrir
    }
</script>