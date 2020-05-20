<div class='bodyContent'>
    <?php if(!empty($trazeno)){ 
        echo "<div class='row'>";
        echo    "<div class='col-sm-12 blackTextCenter'>";
        echo        "<p>Rezultat pretrage:</p>";
        echo   "</div>";
        echo "</div>"; 
    }else{
        echo "<div class='oglas leftPadding'>";
        echo anchor("$controller/pretraga", "<img src=" . base_url('slike/search.png') ." style='width:30' align='right'>");
        echo "</div>";
    }
    use App\Models\FilePathDokumentacijeSmestajaModel;
    if(count($sviSmestaji)>0){
        $slikeModel = new FilePathDokumentacijeSmestajaModel();
        foreach($sviSmestaji as $smestaj){
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
            echo            "<h5>{$smestaj->cena}e | ". anchor("{$controller}/smestajPrikaz/{$smestaj->id}" , "Pregledaj oglas") ."</h5>";
            echo        "</div>";
            echo    "</div>";  
            echo    "<div class='row col-sm-12 blackTextLeft textSize15'>";       
            echo        "<p>";
            echo            "{$smestaj->opis}";
            echo        "</p>";
            echo    "</div>";
            echo    "&nbsp";
            echo "</div>";
        }
    }else echo "<div class='row col-sm-12 blackTextCenter'>Nema oglasa.</div>"
    ?>
</div>
