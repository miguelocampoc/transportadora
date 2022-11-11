<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            Mapa
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p> Listado de Bodegas </p>
                    <div class="row">
                        <div class="col-xl-4">
                            <select class="form-control" name="bodegaA" id="bodegaA">
                                <option value="-73.85614,7.06734"> Barrancabermeja</option>
                                <option value="-74.04371,4.74584"> Bogota</option>
                                <option value="-75.56755,6.29853"> Medellin</option>
                                <option value="-73.12989,7.15175"> Bucaramanga</option>
                                <option value="-74.81386,11.01663"> Barranquilla</option>

                            </select>

                        </div>
                        <div class="col-xl-4">

                            <select class="form-control" name="bodegaB" id="bodegaB">
                                <option value="-73.85614,7.06734"> Barrancabermeja</option>
                                <option value="-74.04371,4.74584"> Bogota</option>
                                <option value="-75.56755,6.29853"> Medellin</option>
                                <option value="-73.12989,7.15175"> Bucaramanga</option>
                                <option value="-74.81386,11.01663"> Barranquilla</option>


                            </select>
                        </div> 
                        <div class="col-xl-4">
                            <button class="btn btn-primary" onclick="marcarRuta()">Marcar ruta</button>

                        </div>

                    </div>
                    <br><br>
                    <div id='map' style='width: 100%; height: 450px;'></div>

                </div>
            </div>
        </div>
    </div>
    <script>
        // TO MAKE THE MAP APPEAR YOU MUST
        // ADD YOUR ACCESS TOKEN FROM
        // https://account.mapbox.com
        const access_token = "pk.eyJ1IjoibWp2YWxlbnp1ZWxhIiwiYSI6ImNrb2Fmdm9zZDBpM28ybnFtYTQ2Z2MwMnYifQ.ZY3jTw0-6tjUSOOJXJHsdw";
        mapboxgl.accessToken = 'pk.eyJ1IjoibWp2YWxlbnp1ZWxhIiwiYSI6ImNrb2Fmdm9zZDBpM28ybnFtYTQ2Z2MwMnYifQ.ZY3jTw0-6tjUSOOJXJHsdw';
        const map = new mapboxgl.Map({
            container: 'map',
            // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [-73.85150, 7.05723],
            zoom: 13
        });
        map.addControl(
            new MapboxDirections({
                accessToken: mapboxgl.accessToken
            }),
            'top-left'
        );


        const marker = new mapboxgl.Marker();

        function marcarRuta() {
            if (map.getLayer('route')) {
                map.removeLayer('route');
            }
            if (map.getSource('route')) {
                map.removeSource('route');
            }
            let cA = document.querySelector('#bodegaA').value;
            let cB = document.querySelector('#bodegaB').value;
            let url = `https://api.mapbox.com/directions/v5/mapbox/driving/${cA};${cB}?geometries=geojson&access_token=${access_token}`;
            console.log(url);
            axios.get(url).then(function(response) {

                let coordinates = response.data.routes[0].geometry.coordinates;
                console.log(response);
                CrearRuta(coordinates);

            });

        }

        function CrearRuta(coordinates) {
            map.addSource('route', {
                'type': 'geojson',
                'data': {
                    'type': 'Feature',
                    'properties': {},
                    'geometry': {
                        'type': 'LineString',
                        'coordinates': coordinates
                    }
                }
            });
            map.addLayer({
                'id': 'route',
                'type': 'line',
                'source': 'route',
                'layout': {
                    'line-join': 'round',
                    'line-cap': 'round'
                },
                'paint': {
                    'line-color': '#888',
                    'line-width': 8
                }
            });
        }
    </script>
</x-app-layout>