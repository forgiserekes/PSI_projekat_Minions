<div class='bodyContent'>
    <div class='row'>
        <div class='col-sm-7' align='right'>
            <img src= '<?=base_url('slike/search.png');?>' style='width:30'>                
        </div>
        <div class='col-sm-5 blackTextLeft' align='right' id='search'>
            <?php echo form_open("Oglasavac/pretraga","method=post"); ?>
            <?php echo form_input("kljucPretrage",set_value("kljucPretrage")); ?>
            <?php echo form_submit("pretragaBtn", "Pretrazi"); ?>
            <?php form_close(); ?>
        </div>    
    </div>
    <?php
    use App\Models\FilePathDokumentacijeSmestajaModel;
    if(count($smestaji)>0){
        $slikeModel = new FilePathDokumentacijeSmestajaModel();
        foreach($smestaji as $smestaj){
            echo "<div class='oglas'>";
            echo    "<div class='row col-sm-12 gallery'>";
            $slike = $slikeModel->dohvSlikeSmestaja($smestaj->id);
            foreach($slike as $slika){
                echo        "<div class='rowImages'>";
                echo            "<img src=". base_url("{$slika->filepath}") ." style='width:100%'>";
                echo        "</div>";
            }
            echo    "</div>";
            echo    "<div class='row col-sm-12'>";
            echo        "<div class='col-sm-6 blackTextLeft' >";
            echo            "<h3>{$smestaj->naziv}</h3>";
            echo        "</div>";
            echo        "<div class='col-sm-6 blackTextRight' id='oglasOpcije'>";
            echo            "<h5>{$smestaj->cena}e | ". anchor("Oglasavac/smestajPrikaz/{$smestaj->id}" , "Pregledaj oglas") ." | " . anchor("Oglasavac/obrisiOglas/{$smestaj->id}" , "Obriši")."</h5>";
            echo        "</div>";
            echo    "</div>";  
            echo    "<div class='row col-sm-12 blackTextLeft textSize15'>";       
            echo        "<p>";
            echo            "{$smestaj->opis}";
            echo        "</p>";
            echo    "</div>";
            echo    "<hr>";
            echo "</div>";
        }
    }else echo "<div class='row col-sm-12 blackTextCenter'>Ni jedan smestaj niste jos uvek oglasili.</div>"
    ?>
</div>
