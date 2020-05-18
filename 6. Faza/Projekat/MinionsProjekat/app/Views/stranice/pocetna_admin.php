<div class='bodyContent'>
    <div class='row'>
        <div class='col-sm-12'>
            <h2 class='blackTextCenter'>
                Dobrodosli!
            </h2>
        </div>
    </div>
    <div class='row col-sm-12'>
        <div class = 'col-sm-6' align='center'>
            <img class='imgAvatar' src = "<?=base_url('slike/houseAvatar.jpg');?>" width="70%" height ="250" alt='Avatar'>
            <?= anchor("Admin/pregledSvihSmestaja", "<p class='blackTextCenter'>Pregled svih smeštaja</p>") ?> 
        </div>
        <div class ='col-sm-6' align='center'>
            <img class='imgAvatar' src = "<?=base_url('slike/userAvatar.jpg');?>" width="70%" height ="250" alt="Avatar">
            <?= anchor("Admin/pregledSvihKorisnika", "<p class='blackTextCenter'>Pregled svih korisnika</p>") ?> 
        </div>
    </div>
    <div class='row col-sm-12'>
        <div class='col-sm-6' align='center'>
            <img class='imgAvatar' src = "<?=base_url('slike/recenzijeAvatar.jpg');?>" width="70%" height ="250" alt="Avatar">
            <?= anchor("Admin/pregledSvihRecenzija", "<p class='blackTextCenter'>Pregled svih recenzija</p>") ?> 
        </div>
        <div class='col-sm-6' align='center'>
            <img class='imgAvatar' src = "<?=base_url('slike/member.jpg');?>" width="70%" height ="250" alt="Avatar">
            <?= anchor("Admin/pregledSvihZahteva", "<p class='blackTextCenter'>Pregled svih zahteva oglašavača</p>") ?> 
        </div>
    </div>
</div>