<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="body flex-grow-1 px-3">
                        <div class="container-lg">
                            <div class="row">
                                <div class="col-sm-6 col-lg-3">
                                    <a href="/usuarios" style="text-decoration:none">
                                    <div class="card mb-4 text-white bg-primary">
                                        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                            <div style="width:100%">

                                                <div style="width:100%"> Modulo de Usuarios</div>

                                            </div>

                                        </div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart1" height="140" width="380" style="display: block; box-sizing: border-box; height: 70px; width: 190px;"></canvas>
                                        </div>
                                    </div>
                                    </a>
                                </div>

                                <div class="col-sm-6 col-lg-3">
                                   <a href="/ley" style="text-decoration:none">

                                    <div class="card mb-4 text-white bg-info">
                                        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                            <div>

                                                <div> Modulo de Traslados</div>
                                            </div>

                                        </div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="140" width="380" style="display: block; box-sizing: border-box; height: 70px; width: 190px;"></canvas>
                                        </div>
                                    </div>
                                   </a>
                                </div>

                                <div class="col-sm-6 col-lg-3">
                                    <a href="/conductores" style="text-decoration:none">

                                        <div class="card mb-4 text-white bg-warning">
                                            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                                <div>

                                                    <div> Modulo de Conductores</div>
                                                </div>

                                            </div>
                                            <div class="c-chart-wrapper mt-3" style="height:70px;">
                                                <canvas class="chart" id="card-chart3" height="140" width="444" style="display: block; box-sizing: border-box; height: 70px; width: 222px;"></canvas>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-sm-6 col-lg-3">
                                    <a href="/vehiculos" style="text-decoration:none">

                                        <div class="card mb-4 text-white bg-danger">
                                            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                                <div>
                                                    Modulo de Vehiculos
                                                </div>

                                            </div>
                                            <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                                <canvas class="chart" id="card-chart4" height="140" width="380" style="display: block; box-sizing: border-box; height: 70px; width: 190px;"></canvas>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <a href="/mapa" style="text-decoration:none">

                                        <div class="card mb-4 text-white bg-info">
                                            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                                <div>
                                                    Modulo de Mapa
                                                </div>

                                            </div>
                                            <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                                <canvas class="chart" id="card-chart4" height="140" width="380" style="display: block; box-sizing: border-box; height: 70px; width: 190px;"></canvas>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>