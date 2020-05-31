<div class='bodyContent'>
    <div class='row'>
        <div class='col-sm-12 myTextCenter'>
            <h2 class='blackTextTitleCenter'>Postavite vas oglas:</h2>
        </div>
    </div>
    <div class='adPlacingDiv'>
        <form action="postavljanje_oglasa_submit" method="post" enctype="multipart/form-data">
            <table class='table table-borderless'>
                <tr>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if (!empty($errors['naziv'])) echo $errors['naziv']; ?>
                            <?php if (isset($greska)) {
                                echo $greska;
                            }
                            ?>
                        </font>
                    </td>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if (!empty($errors['room_type'])) echo $errors['room_type']; ?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Naziv smestaja</td>
                    <td>
                        <?php
                        echo form_input("naziv", set_value("naziv"));
                        ?>
                    </td>
                    <td>Tip smestaja:</td>
                    <td>
                        <?php
                        $options = [
                            'soba' => 'Soba',
                            'apartman' => 'Apartman',
                            'hotelskaSoba' => 'Hotelska soba',
                            'vikendica' => 'Vikendica',
                        ];
                        echo form_dropdown('room_type', $options);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if (!empty($errors['kapacitet'])) echo $errors['kapacitet']; ?>
                        </font>
                    </td>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if (!empty($errors['povrsina'])) echo $errors['povrsina']; ?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Kapacitet:</td>
                    <td>
                        <?php echo form_input("kapacitet", set_value("kapacitet")); ?>
                    </td>
                    <td>Povrsina [m<sup>2</sup>]:</td>
                    <td>
                        <?php echo form_input('povrsina', set_value('povrsina')); ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if (!empty($errors['cena'])) echo $errors['cena']; ?>
                        </font>
                    </td>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if (!empty($errors['kitchen_type'])) echo $errors['kitchen_type']; ?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Cena:</td>
                    <td>
                        <?php echo form_input("cena", set_value("cena")); ?>
                    </td>
                    <td>Kuhinja:</td>
                    <td>
                        <?php
                        $data1 = [
                            'name'    => 'kitchen_type',
                            'value'      => 'da',
                            'checked' => FALSE,
                        ];
                        echo form_radio($data1);
                        echo "Da";
                        $data2 = [
                            'name'    => 'kitchen_type',
                            'value'   => 'ne',
                            'checked' => FALSE,
                        ];
                        echo form_radio($data2);
                        echo " Ne";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if (!empty($errors['parking'])) echo $errors['parking']; ?>
                        </font>
                    </td>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if (!empty($errors['terasa'])) echo $errors['terasa']; ?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Parking:</td>
                    <td>
                        <?php
                        $data1 = [
                            'name'    => 'parking',
                            'value'   => 'da',
                            'checked' => FALSE,
                        ];
                        echo form_radio($data1);
                        echo "Da";
                        $data2 = [
                            'name'    => 'parking',
                            'value'   => 'ne',
                            'checked' => FALSE,
                        ];
                        echo form_radio($data2);
                        echo " Ne";
                        ?>
                    </td>
                    <td>Terasa:</td>
                    <td>
                        <?php
                        $data1 = [
                            'name'    => 'terasa',
                            'value'      => 'da',
                            'checked' => FALSE,
                        ];
                        echo form_radio($data1);
                        echo "Da";
                        $data2 = [
                            'name'    => 'terasa',
                            'value'   => 'ne',
                            'checked' => FALSE,
                        ];
                        echo form_radio($data2);
                        echo " Ne";
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <font color='red'>
                            <?php if (!empty($errors['ulica'])) echo $errors['ulica']; ?>
                        </font>
                    </td>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if (!empty($errors['broj'])) echo $errors['broj']; ?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Ulica:</td>
                    <td>
                        <?php
                        echo form_input('ulica', set_value('ulica'));
                        ?>
                    </td>
                    <td>Broj:</td>
                    <td>
                        <?php
                        echo form_input('broj', set_value('broj'));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if (!empty($errors['grad'])) echo $errors['grad']; ?>
                        </font>
                    </td>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if (!empty($errors['ptt'])) echo $errors['ptt']; ?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Grad:</td>
                    <td>
                        <?php
                        echo form_input('grad', set_value('grad'));
                        ?>
                    </td>
                    <td>Postanski broj:</td>
                    <td>
                        <?php
                        echo form_input('ptt', set_value('ptt'));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if (!empty($errors['drzava'])) echo $errors['drzava']; ?>
                        </font>
                    </td>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if (!empty($errors['opis'])) echo $errors['opis']; ?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Drzava:</td>
                    <td>
                        <?php
                        echo form_input('drzava', set_value('drzava'));
                        ?>
                    </td>
                    <td>Slike smestaja:</td>
                    <td>
                        <input type="file" name="fileToUpload[]" id="fileToUpload" multiple accept='image/*'>
                        <!--<input type='file' name='slikeSmestaja[]' multiple='true' accept='image/png, image/jpeg' />-->
                    </td>
                </tr>
                <tr>
                    <td>Opis:</td>
                    <td colspan='3'>
                        <?php
                        $data = [
                            'id' => 'opis',
                            'name' => 'opis',
                            'rows' => '5',
                            'cols' => '80',
                            'placeholder' => 'Kompletan opis smestaja'
                        ];
                        echo form_textarea($data);
                        ?>
                    </td>
                </tr>
            </table>
            <div id = "mapa">
                <input type="hidden" name="lat" id="lat" size=12 value="">
                <input type="hidden" name="lon" id="lon" size=12 value="">

                <div id="map"></div>
                <br>
                <div id="search">
                    <input type="text" name="addr" value="" id="addr" size="58" />
                    <button type="button" onclick="addr_search();">Search</button>
                    <div id="results"></div>
                </div>

                <script type="text/javascript">
                    // New York
                    var startlat = 40.75637123;
                    var startlon = -73.98545321;

                    var options = {
                        center: [startlat, startlon],
                        zoom: 9
                    }

                    document.getElementById('lat').value = startlat;
                    document.getElementById('lon').value = startlon;

                    var map = L.map('map', options);
                    var nzoom = 12;

                    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                        attribution: 'OSM'
                    }).addTo(map);

                    var myMarker = L.marker([startlat, startlon], {
                        title: "Coordinates",
                        alt: "Coordinates",
                        draggable: true
                    }).addTo(map).on('dragend', function() {
                        var lat = myMarker.getLatLng().lat.toFixed(8);
                        var lon = myMarker.getLatLng().lng.toFixed(8);
                        var czoom = map.getZoom();
                        if (czoom < 18) {
                            nzoom = czoom + 2;
                        }
                        if (nzoom > 18) {
                            nzoom = 18;
                        }
                        if (czoom != 18) {
                            map.setView([lat, lon], nzoom);
                        } else {
                            map.setView([lat, lon]);
                        }
                        document.getElementById('lat').value = lat;
                        document.getElementById('lon').value = lon;
                        myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
                    });

                    function chooseAddr(lat1, lng1) {
                        myMarker.closePopup();
                        map.setView([lat1, lng1], 18);
                        myMarker.setLatLng([lat1, lng1]);
                        lat = lat1.toFixed(8);
                        lon = lng1.toFixed(8);
                        document.getElementById('lat').value = lat;
                        document.getElementById('lon').value = lon;
                        myMarker.bindPopup("Lat " + lat + "<br />Lon " + lon).openPopup();
                    }

                    function myFunction(arr) {
                        var out = "<br />";
                        var i;

                        if (arr.length > 0) {
                            for (i = 0; i < arr.length; i++) {
                                out += "<div class='address' title='Show Location and Coordinates' onclick='chooseAddr(" + arr[i].lat + ", " + arr[i].lon + ");return false;'>" + arr[i].display_name + "</div>";
                            }
                            document.getElementById('results').innerHTML = out;
                        } else {
                            document.getElementById('results').innerHTML = "Sorry, no results...";
                        }

                    }

                    function addr_search() {
                        var inp = document.getElementById("addr");
                        var xmlhttp = new XMLHttpRequest();
                        var url = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + inp.value;
                        xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                var myArr = JSON.parse(this.responseText);
                                myFunction(myArr);
                            }
                        };
                        xmlhttp.open("GET", url, true);
                        xmlhttp.send();
                    }
                </script>

            </div>
            <br>
            <div>
                <input type="submit" value="Postavi oglas" name="submit">
            </div>
        </form>

    </div>
</div>
