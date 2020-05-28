<!DOCTYPE>
<html lang="en">
<head>
  <title>Smesti.se</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">    
  <link rel="stylesheet" href="<?=base_url('css/psiStyle.css');?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-xl navbar-expand-lg bg-dark navbar-dark">
        <div class='col-sm-6 col-md-6 col-lg-2 myTextLeft'>
            <?= anchor("{$controller}","<img class='navbar-brand' src=" . base_url('slike/logo2.png') . " width='100' height='100'>")?>
        </div>
        <div class='col-sm-6 col-md-6 col-lg-2 myTextRight'>
            <button class="navbar-toggler myTextRight" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class='col-sm-4 visible-xs-block visible-sm-block'>
            <span class="d-none d-lg-block" id="mainTitle">    
                <?= anchor("{$controller}/backToHome", "<h1 id='mainTitle'>Smesti.se</h1>") ?>
            </span>
        </div>
        <div class="col-sm-4 collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav textRight">
              <?php if($controller == 'Gost'){
                        echo "<li class='nav-item'>";
                        echo anchor("{$controller}/pretraga", "<p class='logReg px-1' id='logRegStyle'>Pretraži</p>");
                        echo "</li>";
                        echo "<li class='nav-item'>";
                        echo anchor("{$controller}/login", "<p class='logReg px-1' id='logRegStyle'>Uloguj se</p>");
                        echo "</li>";
                        echo "<li class='nav-item'>";
                        echo anchor("{$controller}/register", "<p class='logReg px-1' id='logRegStyle'>Registruj se</p>");
                        echo "</li>";
                    }else if($controller=='Korisnik'){
                        echo "<li class='nav-item'>";
                        echo anchor("{$controller}/pretraga", "<p class='logReg px-1' id='logRegStyle'>Pretraži</p>");
                        echo "</li>";
                        echo "<li class='nav-item'>";
                        echo anchor("{$controller}/logout", "<p class='logReg px-1' id='logRegStyle'>Odjavi se</p>");
                        echo "</li>";
                    }else if($controller=='Oglasavac'){
                        echo "<li class='nav-item'>";
                        echo anchor("{$controller}/smestajiOglasavaca", "<p class='logReg px-1' id='logRegStyle'>Vaši oglasi</p>");
                        echo "</li>";
                        echo "<li class='nav-item'>";
                        echo anchor("{$controller}/sveRecenzijeOglasavaca", "<p class='logReg px-1' id='logRegStyle'>Recenzije</p>");
                        echo "</li>";
                        echo "<li class='nav-item'>";
                        echo anchor("{$controller}/postavljanjeOglasa", "<p class='logReg px-1' id='logRegStyle'>Nov oglas</p>");
                        echo "</li>";
                        echo "<li class='nav-item'>";
                        echo anchor("{$controller}/rezervacije", "<p class='logReg px-1' id='logRegStyle'>Rezervacije</p>");
                        echo "</li>";
                        echo "<li class='nav-item'>";
                        echo anchor("{$controller}/logout", "<p class='logReg px-1' id='logRegStyle'>Odjavi se</p>");
                        echo "</li>";
                    }else {
                        echo "<li class='nav-item'>";
                        echo anchor("{$controller}/pregledSvihSmestaja", "<p class='logReg px-1' id='logRegStyle'>Smeštaji</p>");
                        echo "</li>";
                        echo "<li class='nav-item'>";
                        echo anchor("{$controller}/pregledSvihKorisnika", "<p class='logReg px-1' id='logRegStyle'>Korisnici</p>");
                        echo "</li>";
                        echo "<li class='nav-item'>";
                        echo anchor("{$controller}/pregledSvihRecenzija", "<p class='logReg px-1' id='logRegStyle'>Recenzije</p>");
                        echo "</li>";
                        echo "<li class='nav-item'>";
                        echo anchor("{$controller}/pregledSvihZahteva", "<p class='logReg px-1' id='logRegStyle'>Zahtevi</p>");
                        echo "</li>";
                        echo "<li class='nav-item'>";
                        echo anchor("{$controller}/logout", "<p class='logReg px-1' id='logRegStyle'>Odjavi se</p>");
                        echo "</li>";
                    }
              ?>
            </ul>
        </div>
    </nav>       
</header>
<body>
    