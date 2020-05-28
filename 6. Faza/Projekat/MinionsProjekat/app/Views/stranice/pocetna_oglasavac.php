<div class='bodyContent'>    
    <div class='row'>
        <div class='col-sm-12'>
            <h2 class='blackTextCenter'>
                Dobrodosli<?php  echo " ".$oglasavac->ime." ".$oglasavac->prezime."!"; ?>
            </h2>
        </div>
    </div>

        <div class='row col-sm-12'>
            <div class='col-sm-6' align='center'>
                <img class='imgAvatar' src="<?=base_url('slike/houseAvatar.jpg');?>" width="70%" height="250" alt='Avatar'>
                <?= anchor("Oglasavac/smestajiOglasavaca", "<p class='blackTextCenter'>Vaši oglasi</p>") ?> 
            </div>
            <div class='col-sm-6'align='center'>
                <img class='imgAvatar' src="<?=base_url('slike/recenzijeAvatar.jpg');?>" width="70%" height="250" alt="Avatar">
                <?= anchor("Oglasavac/sveRecenzijeOglasavaca", "<p class='blackTextCenter'>Neodgovorene recenzije</p>") ?> 
            </div>
        </div>
        <div class='row col-sm-12'> 
            <div class='col-sm-6' align='center'>
                <img class='imgAvatar' src="<?=base_url('slike/homeAvatar.jpg');?>" width="70%" height="250" alt="Avatar">
                <?= anchor("Oglasavac/postavljanjeOglasa", "<p class='blackTextCenter'>Postavite nov oglas</p>") ?> 
            </div>
            <div class='col-sm-6' align='center'>
                <img class='imgAvatar' src="<?=base_url('slike/reservation.png');?>" width="70%" height="250" alt="Avatar">
                <?= anchor("Oglasavac/rezervacije", "<p class='blackTextCenter'>Nove rezervacije</p>") ?> 
            </div>
        </div>
    
</div>