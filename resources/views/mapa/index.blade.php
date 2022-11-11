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
                        <select class="form-control"  name="bodegaA" id="bodegaA" required>
                                        <option value="-73.85614,7.06734"> Barrancabermeja</option>
                                        <option value="-75.63211805372433,4.814534661020744">Arauca</option>
                                        <option value="-69.98832331844453,7.395126416950106">Armenia</option>
                                        <option value="-75.25583058624944,5.257692278831726">Barranquilla</option>
                                        <option value="-74.09254,4.67053">Bogotá</option>
                                        <option value="-73.11146,7.10590">Bucaramanga</option>
                                        <option value="-73.00845922451356,7.2702219909502475">Cali</option>
                                        <option value="-76.48760250142247,3.5366899445146487">Cartagena</option>
                                        <option value="-74.48533303514404,10.04749628207847">Cúcuta</option>
                                        <option value="-72.11682347382646,8.551520466305476">Florencia</option>
                                        <option value="-75.25765395421013,2.1781504889287646">Ibagué</option>
                                        <option value="-75.08719244337107,4.720820453249459">Leticia</option>
                                        <option value="-69.51701054370804,-2.9529210513933037">Manizales</option>
                                        <option value="-75.56755,6.29853">Medellín</option>
                                        <option value="-75.45986506291005,6.47560295302209">Mitú</option>
                                        <option value="-69.8884123772293,1.6719631607052037">Mocoa</option>
                                        <option value="-76.49659240449452,1.4178313313586415">Montería</option>
                                        <option value="-75.72947747272664,8.890101484346602">Neiva</option>
                                        <option value="-75.11906411853072,3.2276958133176947">Pasto</option>
                                        <option value="-77.04363908898584,1.3241627252195798">Pereira</option>
                                        <option value="-75.54104516729339,4.971928509014063">Popayán</option>
                                        <option value="-76.45487579857914,2.579333524366291">Puerto Carreño</option>
                                        <option value="-67.43360105225145,4.206866152682764">Puerto Inírida</option>
                                        <option value="-67.91278076547827,3.8656635277068148">Quibdó</option>
                                        <option value="-76.32029616146781,6.328319217873229">Riohacha</option>
                                        <option value="-72.64307336776073,6.952570729549109">Santa Marta</option>
                                        <option value="-73.7643967515284,11.303800062806928">Sincelejo</option>
                                        <option value="-75.37455646097764,9.412074918290486">Tunja</option>
                                        <option value="-73.3224941763597,5.577435086141406">Valledupar</option>
                                        <option value="-73.12220227460371,10.77934990342483">Villavicencio</option>
                                        <option value="-72.00089735971707,5.501700156581322">Yopal</option>
                                    </select>
                        </div>
                        <div class="col-xl-4">

                        <select class="form-control"  name="bodegaB" id="bodegaB" required>
                                        <option value="-73.85614,7.06734"> Barrancabermeja</option>
                                        <option value="-75.63211805372433,4.814534661020744">Arauca</option>
                                        <option value="-69.98832331844453,7.395126416950106">Armenia</option>
                                        <option value="-75.25583058624944,5.257692278831726">Barranquilla</option>
                                        <option value="-74.09254,4.67053">Bogotá</option>
                                        <option value="-73.11146,7.10590">Bucaramanga</option>
                                        <option value="-73.00845922451356,7.2702219909502475">Cali</option>
                                        <option value="-76.48760250142247,3.5366899445146487">Cartagena</option>
                                        <option value="-74.48533303514404,10.04749628207847">Cúcuta</option>
                                        <option value="-72.11682347382646,8.551520466305476">Florencia</option>
                                        <option value="-75.25765395421013,2.1781504889287646">Ibagué</option>
                                        <option value="-75.08719244337107,4.720820453249459">Leticia</option>
                                        <option value="-69.51701054370804,-2.9529210513933037">Manizales</option>
                                        <option value="-75.56755,6.29853">Medellín</option>
                                        <option value="-75.45986506291005,6.47560295302209">Mitú</option>
                                        <option value="-69.8884123772293,1.6719631607052037">Mocoa</option>
                                        <option value="-76.49659240449452,1.4178313313586415">Montería</option>
                                        <option value="-75.72947747272664,8.890101484346602">Neiva</option>
                                        <option value="-75.11906411853072,3.2276958133176947">Pasto</option>
                                        <option value="-77.04363908898584,1.3241627252195798">Pereira</option>
                                        <option value="-75.54104516729339,4.971928509014063">Popayán</option>
                                        <option value="-76.45487579857914,2.579333524366291">Puerto Carreño</option>
                                        <option value="-67.43360105225145,4.206866152682764">Puerto Inírida</option>
                                        <option value="-67.91278076547827,3.8656635277068148">Quibdó</option>
                                        <option value="-76.32029616146781,6.328319217873229">Riohacha</option>
                                        <option value="-72.64307336776073,6.952570729549109">Santa Marta</option>
                                        <option value="-73.7643967515284,11.303800062806928">Sincelejo</option>
                                        <option value="-75.37455646097764,9.412074918290486">Tunja</option>
                                        <option value="-73.3224941763597,5.577435086141406">Valledupar</option>
                                        <option value="-73.12220227460371,10.77934990342483">Villavicencio</option>
                                        <option value="-72.00089735971707,5.501700156581322">Yopal</option>
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