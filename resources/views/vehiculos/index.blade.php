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
                    <table class="table table-striped table-bordered" id="users">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Tipo de vehiculo</th>
                                <th>Conductor</th>
                                <th>Peso</th>
                                <th>Placa</th>
                                <th>Estado</th>
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