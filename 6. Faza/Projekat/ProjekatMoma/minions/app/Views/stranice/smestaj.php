<div class='bodyContent'>
    <div class='row'>
        <div class='col-sm-12'>
            <h4 class='darkText textSize40 textCenter'>
                <?php echo $smestaj->naziv; ?>
                <h4 class='textCenter'><i class="fa fa-map-marker textRight "></i>    <?php echo $smestaj->grad; ?></h4>
            </h4>
        </div>
    </div>
    <script type='text/javascript' src='<?=base_url('js/skripta_galerija.js');?>'></script>
    <script type='text/javascript'src='<?=base_url('js/skripta_mapa.js');?>' ></script>
    <div class="row galerijaSmestajDiv">
        <div class='galerijaSmestajSlike'>
            <div class='col-sm-12'>
                <?php 
                    use App\Models\FilePathDokumentacijeSmestajaModel;
                    $slikeModel = new FilePathDokumentacijeSmestajaModel();
                    $slike = $slikeModel->dohvSlikeSmestaja($smestaj->id);
                ?>
                <div class='row prikazSlikeSmestaj'>
                    <?php
                        $cnt = 1;
                        foreach($slike as $slika){
                            echo "<div class='mySlides'>";
                            echo    "<div class='numbertext'>{$cnt}/5</div>";
                            echo    "<img src=". base_url("{$slika->filepath}") ." style='width:100%' onload='currentSlide(1)' align='center'>";
                            echo "</div>";
                            $cnt++;
                        }
                    ?>        
                </div>
                <div class="row ">
                    <?php
                        $cnt = 1;
                        foreach($slike as $slika){
                            echo "<div class='column'>";
                            echo    "<img class='demo cursor' src=". base_url("{$slika->filepath}") ." style='width:100%' onclick='currentSlide({$cnt})'>";
                            echo "</div>";
                            $cnt++;
                        }
                    ?> 
                </div>
            </div>
        </div>
    </div>
    <div class='row height50'>
        <div class='col-sm-12 '>
            <hr>
        </div>
    </div>
    <div class='informacijeSmestaj'>
        <div class='row'>
            <div class='col-sm-12'>
                <h1>Informacije o smeštaju:</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class='col-sm-12 '>
                <table class='table table table-striped tableInit '>
                    <tr>
                        <td>
                            Tip Smestaja:
                        </td>
                        <td>
                            <?php echo $smestaj->tipSmestaja ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Kapacitet:
                        </td>
                        <td>
                            <?php echo $smestaj->kapacitet; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Povrsina:
                        </td>
                        <td>
                            <?php echo $smestaj->povrsina; ?> m²
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Kuhinja:
                        </td>
                        <td>
                            <?php echo $smestaj->kuhinja==1?'Da':'Ne'; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Parking:
                        </td>
                        <td>
                            <?php echo $smestaj->parking==1?'Da':'Ne'; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Terasa:
                        </td>
                        <td>
                            <?php echo $smestaj->terasa==1?'Da':'Ne'; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Adresa:
                        </td>
                        <td>
                            <?php echo $smestaj->ulica ." ". $smestaj->broj .", ". $smestaj->grad .", ". $smestaj->drzava; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Opis:
                        </td>
                        <td>
                            <?php echo $smestaj->opis; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>    
    <div class='row '>
        <div class='col-sm-12 '>
            <hr> &nbsp; <br> &nbsp;
        </div>
    </div>

    <!-- nisam sredjiavao ovo ispod -->
    <div class='row  '>
        <div class='col-sm-6 '>
            <div id="mapid" class="mapKlasa"></div>
        </div>
        <div class='col-sm-6'>
            <div clas='row padding10'>
                <div class='col-sm-12 skyBackground'>
                    <span class=" heading goldText">Prosecna Ocena:</span>
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star "></span>
                    <p class='goldText'>4.56 average based on 228 reviews.</p>
                    <hr style="border:3px solid #f1f1f1 ">
                    <div class="row ">
                        <div class="side ">
                            <div class='goldText textCenter'>5 star</div>
                        </div>
                        <div class="middle ">
                            <div class="bar-container ">
                                <div class="bar-5"></div>
                            </div>
                        </div>
                        <div class="side right ">
                            <div class='goldText textCenter'>150</div>
                        </div>
                        <div class="side ">
                            <div class='goldText textCenter'>4 star</div>
                        </div>
                        <div class="middle ">
                            <div class="bar-container ">
                                <div class="bar-4"></div>
                            </div>
                        </div>
                        <div class="side right ">
                            <div class='goldText textCenter'>63</div>
                        </div>
                        <div class="side ">
                            <div class='goldText textCenter'>3 star</div>
                        </div>
                        <div class="middle ">
                            <div class="bar-container ">
                                <div class="bar-3 "></div>
                            </div>
                        </div>
                        <div class="side right ">
                            <div class='goldText textCenter'>8</div>
                        </div>
                        <div class="side ">
                            <div class='goldText textCenter'>2 star</div>
                        </div>
                        <div class="middle ">
                            <div class="bar-container ">
                                <div class="bar-2 "></div>
                            </div>
                        </div>
                        <div class="side right ">
                            <div class='goldText textCenter'>6</div>
                        </div>
                        <div class="side ">
                            <div class='goldText textCenter'>1 star</div>
                        </div>
                        <div class="middle ">
                            <div class="bar-container ">
                                <div class="bar-1 "></div>
                            </div>
                        </div>
                        <div class="side right ">
                            <div class='goldText textCenter'>1</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="height:25px"></div>
            <div class="row" style="height:25px"></div>
            <div class="row ">
                <div class="col-sm-12 ">
                    <a href="spisak_recenzija_korisnik.html " class="btn btn-info col-12 skyBackground" role="button">Recenzije(12)</a>
                </div>
            </div>
            <div class="row " style="height:25px; "></div>
            <div class="row ">
                <div class="col-sm-12 ">
                    <a href="rezervisi.html " class="btn btn-info col-12 skyBackground " role="button">Rezervisi</a>
                </div>
            </div>
            <div class="row " style="height:25px"></div>

            <div class="row ">
                <div class="col-sm-12 ">
                    <a href="ostavljanje_recenzija.html" class="btn btn-info col-12 skyBackground "
                        role="button">Ostavite recenziju</a>
                </div>
            </div>
            <!-- <div class="row " style="height:25px; ">
            </div>
            <div class="row ">

                <div class="col-sm-12 ">
                    <a href="#link " class="btn btn-info col-12 skyBackground" role="button ">Oglasavac</a>
                </div>
            </div> -->
        </div>
    </div>
</div>

