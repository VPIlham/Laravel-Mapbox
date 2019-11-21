<!DOCTYPE html>
<html>

<head>

    <title>Quick Start - Leaflet</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
        integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
        crossorigin=""></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div id="mapid" style="height: 400px;"></div>
        </div>
        <div class="col">
            <form action="{{url('/home/add')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }} 
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lokasi Terpilih</label>
                    <input type="text" class="form-control"  id="title" name="title" placeholder="Nama lokasi terpilih">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat Lokasi Terpilih</label>
                    <input type="text" class="form-control"  id="loc" name="address" placeholder="Alamat lokasi terpilih">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Kode Lokasi lat</label>
                    <input type="text" class="form-control"  id="lat" name="lat" placeholder="Your lat..">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Category Lokasi lat</label>
                    <input type="text" class="form-control"  id="cat" name="cat" placeholder="Your lat..">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Kode Lokasi lng</label>
                    <input type="text" class="form-control"  id="lng" name="lng" placeholder="Your lng..">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Deskripsi Tempat </label>
                    <input type="text" class="form-control" name="description" placeholder="Deskripsi menurut guide ?">
                </div>

                <input type="submit" value="Simpan Lokasi" class="btn btn-success">
            </form>
        </div>

      </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script>
        var mymap = L.map('mapid',{
          center: [-4.390229, 115.048828],
	        zoom: 10,
        });

        var saved_markers = <?php echo json_encode($result) ?> ;

        L.tileLayer(
            'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox.streets'
            }).addTo(mymap);

        var geojson = saved_markers;
        console.log('geojeson nya', geojson);
        var marker;

        $.each(geojson, function (i, marker) {
            var v3 = [marker.lng, marker.lat];
            console.log('marker nya', v3);
            L.marker(v3)
                .addTo(mymap).bindPopup("<b>"+marker.title+"</b><br />I am a popup.").openPopup();
        });

        var popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString())
                .openOn(mymap);
            console.log(e);
            document.getElementById("lat").value = e.latlng.toString();
            document.getElementById("lng").value = e.latlng.toString();
        }

        mymap.on('click', onMapClick);

    </script>



</body>

</html>
