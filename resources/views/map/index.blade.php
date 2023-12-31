<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lastcall Map</title>

    {{-- Leaflet Css --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css">

</head>
@php
    // dd($businesses);
@endphp

<body>

    {{-- map container --}}
    <div id="map" style="width: 100%; height: 100vh"></div>


    {{-- Leaflet js library --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster-src.js"></script>
    {{-- Map Script --}}
    <script>
        const map = L.map('map').setView([49.7814403080034, 6.103632454413215], 10);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        // let marker = L.marker([49.73297971391437, 6.159826203383296]).addTo(map);
        // marker.bindPopup("<b>Hello world!</b><br>I am a popup.");
        const lastcallIcon = L.icon({
            iconUrl: './storage/mapIcon/location.png',
            //shadowUrl: 'leaf-shadow.png',

            iconSize: [50, 50], // size of the icon
            //shadowSize: [50, 64], // size of the shadow
            iconAnchor: [25, 50], // point of the icon which will correspond to marker's location
            //shadowAnchor: [4, 62], // the same for the shadow
            popupAnchor: [3, -50] // point from which the popup should open relative to the iconAnchor
        });
        let businesses;
        fetch("http://127.0.0.1:8000/api/businesses")
            .then((data) => data.json())
            .then(function(res) {
                businesses = res;
                const markers = L.markerClusterGroup();
                for (const business of businesses) {
                    let marker = L.marker([business["lat"], business["lon"]],{icon : lastcallIcon});
                    marker.bindPopup("<img style='width:250px;height:150px' src ='/storage/" + business["businessImg"] +
                        "' ></br>" + "<a href='/business/" + business["id"] + "/products'><b>" + business["name"] +
                        "</b></a><br>" + business["address"]);
                    markers.addLayer(marker);
                }
                map.addLayer(markers);
            });
    </script>
</body>

</html>
