@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    
                        <form action="" id="signupForm">
                            <label for="lat">lat</label>
                            <input type="text" id="lat" name="lat" placeholder="Your lat..">

                            <label for="lng">lng</label>
                            <input type="text" id="lng" name="lng" placeholder="Your lng..">

                            <input type="submit" value="Submit">
                        </form>
                    

                    <div class="geocoder">
                        <div id="geocoder"></div>
                    </div>

                    <div id="map"></div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
    
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.min.js'></script>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.css' type='text/css' />
<!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>


<script>

    var saved_markers = <?php echo json_encode($rows[0]) ?>;

    var user_location = [118, -2];
    mapboxgl.accessToken = 'pk.eyJ1IjoidnBpbGhhbSIsImEiOiJjazF4YTByYWowN2JhM25temppeWZnMnJjIn0.HvOIgkGAwdE32Zi1hq3TBQ';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: user_location,
        zoom: 4
    });
    //  geocoder here
    var geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl
    });

    var marker;

    // After the map style has loaded on the page, add a source layer and default
    // styling for a single point.
    map.on('load', function () {
        addMarker(user_location, 'load');
        add_markers(saved_markers);

        // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
        // makes a selection and add a symbol that matches the result.
        geocoder.on('result', function (ev) {
            alert("aaaaa");
            document.getElementById("lat").value = ev.result.center[0];
            document.getElementById("lng").value = ev.result.center[1];
            console.log(ev.result.center);
        });
    });
    map.on('click', function (e) {
        marker.remove();
        addMarker(e.lngLat, 'click');
        //console.log(e.lngLat.lat);
        document.getElementById("lat").value = e.lngLat.lat;
        document.getElementById("lng").value = e.lngLat.lng;

    });

    function addMarker(ltlng, event) {

        if (event === 'click') {
            user_location = ltlng;
        }
        marker = new mapboxgl.Marker({
                draggable: true,
                color: "#d02922"
            })
            .setLngLat(user_location)
            .addTo(map)
            .on('dragend', onDragEnd);
    }

    function add_markers(coordinates) {

        var geojson = (saved_markers == coordinates ? saved_markers : '');

        console.log(geojson);

        // $.each(geojson, function(i, obj)
        // {
        //      console.log(obj);
        // });
        
        // $.each(JSON.parse(geojson), function() {
        //     $.each(this, function(obj, value) {
        //         /// do stuff
        //         console.log(obj + '=' + value);
        //     });
        // });

        // var data = JSON.parse(geojson);
        // $.each(data, function(i, item) {
        //     console.log(item);
        // });

        // add markers to map
        geojson.forEach(function (marker) {
            console.log(marker);
            // make a marker for each feature and add to the map
            new mapboxgl.Marker()
                .setLngLat(marker)
                .addTo(map);
        });

    }

    function onDragEnd() {
        var lngLat = marker.getLngLat();
        document.getElementById("lat").value = lngLat.lat;
        document.getElementById("lng").value = lngLat.lng;
        console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat);
    }

    $('#signupForm').submit(function (event) {
        event.preventDefault();
        var lat = $('#lat').val();
        var lng = $('#lng').val();
        var url = 'locations_model.php?add_location&lat=' + lat + '&lng=' + lng;
        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                alert(data);
                location.reload();
            }
        });
    });
    document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
    
</script>
@endsection

