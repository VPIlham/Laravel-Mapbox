<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <title>Display a popup on click</title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }

    </style>

    <link rel='stylesheet'
        href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.css'
        type='text/css' />

    <link href='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <style>
        .geocoder {
            position: absolute;
            margin-top: 10px;
            margin-left: 10px;
        }

        /******************* Timeline Demo - 10 *****************/
        .main-timeline10:after,
        .main-timeline10:before {
            content: "";
            display: block;
            width: 100%;
            clear: both
        }

        .main-timeline10 .timeline {
            padding: 0;
            display: -webkit-inline-box
        }

        .main-timeline10 .col-md-3 {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 24%
        }

        .main-timeline10 .timeline-inner {
            text-align: center;
            margin: 20px 20px 35px 35px;
            position: relative
        }

        .main-timeline10 .timeline-inner:after {
            content: "";
            width: 120%;
            height: 3px;
            background: #555;
            position: absolute;
            bottom: 0;
            left: 10%
        }

        .main-timeline10 .timeline:last-child .timeline-inner:after {
            width: 0
        }

        .main-timeline10 .year {
            background: #58b25e;
            padding: 5px 0;
            border-radius: 30px 0;
            font-size: 26px;
            font-weight: 700;
            color: #fff;
            z-index: 1;
            position: relative
        }

        .main-timeline10 .year:after,
        .main-timeline10 .year:before {
            position: absolute;
            top: -19px;
            content: ""
        }

        .main-timeline10 .year:before {
            right: 0;
            border: 10px solid transparent;
            border-bottom: 10px solid #58b25e;
            border-right: 10px solid #58b25e
        }

        .main-timeline10 .year:after {
            width: 25px;
            height: 19px;
            border-radius: 0 0 20px;
            background: #fff;
            right: 1px
        }

        .main-timeline10 .timeline-content {
            padding: 10px 10px 30px;
            border-left: 3px solid #58b25e;
            position: relative
        }

        .main-timeline10 .timeline-content:before {
            content: "";
            position: absolute;
            top: 0;
            left: -1px;
            border: 10px solid transparent;
            border-top: 10px solid #58b25e;
            border-left: 10px solid #58b25e
        }

        .main-timeline10 .timeline-content:after {
            content: "";
            width: 25px;
            height: 19px;
            border-radius: 20px 0 0;
            background: #fff;
            position: absolute;
            top: 0;
            left: 0
        }

        .main-timeline10 .post {
            font-size: 26px;
            color: #333
        }

        .main-timeline10 .description {
            font-size: 14px;
            color: #333
        }

        .main-timeline10 .timeline-icon {
            width: 70px;
            height: 70px;
            line-height: 65px;
            border-radius: 50%;
            border: 5px solid #58b25e;
            background: #fff;
            font-size: 30px;
            color: #555;
            z-index: 1;
            position: absolute;
            bottom: -35px;
            left: -35px
        }

        .main-timeline10 .timeline:nth-child(2n) .year {
            background: #9f84c4
        }

        .main-timeline10 .timeline:nth-child(2n) .year:before {
            border-bottom-color: #9f84c4;
            border-right-color: #9f84c4
        }

        .main-timeline10 .timeline:nth-child(2n) .timeline-content {
            border-left-color: #9f84c4
        }

        .main-timeline10 .timeline:nth-child(2n) .timeline-content:before {
            border-top-color: #9f84c4;
            border-left-color: #9f84c4
        }

        .main-timeline10 .timeline:nth-child(2n) .timeline-icon {
            border-color: #9f84c4
        }

        .main-timeline10 .timeline:nth-child(3n) .year {
            background: #f35958
        }

        .main-timeline10 .timeline:nth-child(3n) .year:before {
            border-bottom-color: #f35958;
            border-right-color: #f35958
        }

        .main-timeline10 .timeline:nth-child(3n) .timeline-content {
            border-left-color: #f35958
        }

        .main-timeline10 .timeline:nth-child(3n) .timeline-content:before {
            border-top-color: #f35958;
            border-left-color: #f35958
        }

        .main-timeline10 .timeline:nth-child(3n) .timeline-icon {
            border-color: #f35958
        }

        .main-timeline10 .timeline:nth-child(4n) .year {
            background: #e67e49
        }

        .main-timeline10 .timeline:nth-child(4n) .year:before {
            border-bottom-color: #e67e49;
            border-right-color: #e67e49
        }

        .main-timeline10 .timeline:nth-child(4n) .timeline-content {
            border-left-color: #e67e49
        }

        .main-timeline10 .timeline:nth-child(4n) .timeline-content:before {
            border-top-color: #e67e49;
            border-left-color: #e67e49
        }

        .main-timeline10 .timeline:nth-child(4n) .timeline-icon {
            border-color: #e67e49
        }

        @media only screen and (max-width:990px) {
            .main-timeline10 .timeline-inner:after {
                width: 110%
            }

            .main-timeline10 .timeline:nth-child(2n) .timeline-inner:after {
                width: 0
            }
        }

        @media only screen and (max-width:767px) {
            .main-timeline10 .timeline {
                margin-bottom: 50px
            }

            .main-timeline10 .timeline-inner:after,
            .main-timeline10 .timeline:nth-child(2n) .timeline-inner:after {
                width: 100%;
                height: 3px;
                left: 0
            }
        }

    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="margin-top:150px;margin-bottom:50px;">
        <div class="row">
            <div class="col-md-4">
                <form action="{{url('/home/add')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Lokasi Terpilih</label>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Nama lokasi terpilih">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Lokasi Terpilih</label>
                        <input type="text" class="form-control" id="loc" name="address"
                            placeholder="Alamat lokasi terpilih">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Lokasi lat</label>
                        <input type="text" class="form-control" id="lat" name="lat" placeholder="Your lat..">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Lokasi lat</label>
                        <input type="text" class="form-control" id="cat" name="cat" placeholder="Your lat..">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Lokasi lng</label>
                        <input type="text" class="form-control" id="lng" name="lng" placeholder="Your lng..">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Deskripsi Tempat </label>
                        <input type="text" class="form-control" name="description"
                            placeholder="Deskripsi menurut guide ?">
                    </div>

                    <input type="submit" value="Simpan Lokasi" class="btn btn-success">
                </form>
            </div>
            <div class="col-md-8">
                <div class="geocoder">
                    <div id="geocoder"></div>
                </div>
                <div id='map'></div>
            </div>
            <div class="col-md-12">
                <h3 class="text-center">Timeline</h3>
                <div class="main-timeline10">
                    <div class="row">
                        <?php
                            $n = 1;
                        ?>
                        @foreach ($data as $item)
                        <div class="col-md-2 col-sm-3 timeline">
                            <div class="timeline-inner">
                                <div class="year" style="font-size:18px;">{{$item->category}}</div>
                                <div class="timeline-content">
                                    <div class="post" style="font-size:21px;">{{$item->title}}</div>
                                    {{-- <p class="description">
                                  
                                    </p> --}}
                                </div>
                                <div class="timeline-icon">
                                    <i class="fa fa-globe">{{$n++}}</i>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.min.js'>
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>

    <script>
        var saved_markers = <?php echo json_encode($result) ?>;

        var user_location = [118, -2];
        mapboxgl.accessToken =
            'pk.eyJ1IjoidnBpbGhhbSIsImEiOiJjazF4YTByYWowN2JhM25temppeWZnMnJjIn0.HvOIgkGAwdE32Zi1hq3TBQ';

        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/outdoors-v11',
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
                marker.remove();
                console.log(ev.result);
                document.getElementById("lat").value = ev.result.center[1];
                document.getElementById("lng").value = ev.result.center[0];
                document.getElementById("loc").value = ev.result.place_name;
                document.getElementById("title").value = ev.result.text;
                document.getElementById("cat").value = ev.result.properties.category;
            });
        });

        map.on('click', function (e) {
            marker.remove();
            addMarker(e.lngLat, 'click');
            document.getElementById("lat").value = e.lngLat.lat;
            document.getElementById("lng").value = e.lngLat.lng;
            document.getElementById("loc").value = e.lngLat.loc;
            document.getElementById("title").value = e.lngLat.title;
            document.getElementById("cat").value = e.lngLat.cat;
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

            $.each(geojson, function (i, marker) {
                var v3 = [marker.lng, marker.lat];
                new mapboxgl.Marker()
                    .setLngLat(v3)
                    .addTo(map);

                new mapboxgl.Popup({
                        closeOnClick: true,
                        closeButton: true,
                    })
                    .setLngLat(v3)
                    .setHTML('<small>' + marker.title + '</small>')
                    .addTo(map);

            });

        }

        function onDragEnd() {
            var lngLat = marker.getLngLat();
            document.getElementById("lat").value = lngLat.lat;
            document.getElementById("lng").value = lngLat.lng;
            console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat);
        }

        document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

    </script>

</body>

</html>
