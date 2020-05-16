<div class='bodyContent'>    
    <div class='row'>
        <div class='col-sm-12'>
            <h2 class='blackTextCenter'>
                Dobrodosli<?php  echo " ".$oglasavac->ime." ".$oglasavac->prezime."!"; ?>
            </h2>
        </div>
    </div>
    <div class='pocetna_ogl'>
        <div class='row'>
            <div class='row col-sm-12'>
                <div class='col-sm-4'>
                    <img class='imgAvatar' src="<?=base_url('slike/houseAvatar.jpg');?>" width="100%" height="250" alt='Avatar'>
                    <?= anchor("Oglasavac/oglasiOglasavaca", "<p class='blackTextCenter'>Vaši oglasi</p>") ?> 
                </div>
                <div class='col-sm-4'>
                    <img class='imgAvatar' src="<?=base_url('slike/recenzijeAvatar.jpg');?>" width="100%" height="250" alt="Avatar">
                    <?= anchor("Oglasavac/neodgRecenzijeOglasavaca", "<p class='blackTextCenter'>Neodgovorene recenzije</p>") ?> 
                </div>
                <div class='col-sm-4 img'>
                    <img class='imgAvatar' src="<?=base_url('slike/homeAvatar.jpg');?>" width="100%" height="250" alt="Avatar">
                    <?= anchor("Oglasavac/postavljanjeOglasa", "<p class='blackTextCenter'>Postavite nov oglas</p>") ?> 
                </div>
            </div>
        </div>
    </div>
</div>