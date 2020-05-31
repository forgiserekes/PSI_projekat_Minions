<div class='bodyContent'>    
    <div class='row'>
        <div class='col-sm-12'>
            <h2 class='pocetnaTextNaslov text-center'>
                Dobrodošli!
            </h2>
        </div>
    </div>
    <div class='row col-sm-12'>
        <div class='col-sm-3' align='center'>
            <?= anchor("Oglasavac/smestajiOglasavaca", "<img class='imgAvatar' src= " . base_url('slike/houseAvatar.jpg') . " width='80%' height='170' alt='Avatar'>") ?>
            <p class='pocetnaTextOpis text-center'>Vaši oglasi</p> 
        </div>
        <div class='col-sm-3'align='center'>
            <?= anchor("Oglasavac/sveRecenzijeOglasavaca", "<img class='imgAvatar' src= " . base_url('slike/recenzijeAvatar.jpg') . " width='80%' height='170' alt='Avatar'>") ?>
            <p class='pocetnaTextOpis text-center'>Neodgovorene recenzije</p> 
        </div>
        <div class='col-sm-3' align='center'>
            <?= anchor("Oglasavac/postavljanjeOglasa", "<img class='imgAvatar' src= " . base_url('slike/homeAvatar.jpg') . " width='80%' height='170' alt='Avatar'>") ?>
            <p class='pocetnaTextOpis text-center'>Postavite nov oglas</p> 
        </div>
        <div class='col-sm-3' align='center'>
            <?= anchor("Oglasavac/rezervacije", "<img class='imgAvatar' src=" . base_url('slike/reservation.png') . " width='80%' height='170' alt='Avatar'>") ?> 
            <p class='pocetnaTextOpis text-center'>Nove rezervacije</p>
        </div>
    </div>    
</div>