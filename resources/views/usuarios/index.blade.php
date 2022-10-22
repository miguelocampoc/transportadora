<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Usuarios
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped table-bordered" id="users">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>opciones</th>
                                </tr>
                            </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
let usuarios =<?php echo $users; ?>;
let table;
let node;
let rowselected;
datatable();
function datatable(tareas){
 table = $('#users').DataTable( 
            {
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "zeroRecords": "No hay registros",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ total de registros)",
                    "search":         "Buscar:",
                    "paginate": {
                        "first":      "First",
                        "last":       "Last",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                },
              data:usuarios,
                columns:
                [
                { "data": "id"},
                { "data": "name"},
                { "data": "email"},                
                { "defaultContent": "<button class='btn btn-success' onclick='actualizar(this)'><i class='fa-sharp fa-solid fa-pen-to-square'></i></button>&nbsp&nbsp<button onclick='drop(this)' class='btn btn-primary drop-btn ml-2 '><i class='fa-solid fa-trash'></i></button>"},

                    ],
                    
            }
            );
    }   

    function drop(s){
        let data = table.row( $(s).parents('tr') ).data();
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
        }).then(function (response) {
        console.log(response);
        Swal.fire({
            icon: 'success',
            title: 'El registro ha sido removido exitosamente. ',
         });
         data= table
        .row( $(s).parents('tr') )
        .remove()
        .draw();
        });
    }
  });
    }
        $('#btn-agregar').on('click', function () {
           
           let newtitle= document.getElementById("newtitle").value; 
           let newcompleted= document.getElementById("newcompleted").value;
           let newelement= { userId: "0", id: tareas.length+1 , title:newtitle, completed:newcompleted};
           tareas.push(newelement);
           console.log(tareas);
           localStorage.setItem('users', JSON.stringify(tareas));
           table.row.add(newelement).draw(false);
           alert("La fila fue agregada");
 
       // counter++;
        });
         function actualizar(s){
            rowselected= table.row( $(s).parents('tr'));           
              let id=  s.parentNode.parentNode.cells[1].innerHTML;
              let title=  s.parentNode.parentNode.cells[2].innerHTML;
              let completed=   s.parentNode.parentNode.cells[3].innerHTML;
               node = s.parentNode.parentNode;
              console.log(s.parentNode.parentNode);
                document.getElementById("id").value=id; 
                document.getElementById("title").value=title;
                document.getElementById("completed").value=completed;
                
         }
         function btn_editar(){
            let id= document.getElementById("id").value;
            let title= document.getElementById("title").value;
            let completed= document.getElementById("completed").value;
            
            node.cells[2].innerHTML=title;
            node.cells[3].innerHTML= completed;
            tareas[rowselected['0']['0']].title=title;
            tareas[rowselected['0']['0']].completed=completed;
            localStorage.setItem('users', JSON.stringify(tareas));
           // let node = document.getElementById("users").rows[id];
            //nodedit.parentNode.parentNode.cells[2].innerHTML=title;
            //nodedit.parentNode.parentNode.cells[3].innerHTML=completed;
         }
</script>