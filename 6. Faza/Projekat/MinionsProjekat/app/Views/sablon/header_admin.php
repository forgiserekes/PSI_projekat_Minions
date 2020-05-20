<html>
<head>
    <title>Admin <?php  echo " ".$admin->ime." ".$admin->prezime; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('css/psiStyle.css');?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class='header'>
        <div class='row col-sm-12'>
            <div class='col-sm-4 myTextLeft'>
                <img class='leftAlign' src='<?=base_url('slike/logo2.png');?>' width="100" height="100">
            </div>
            <div class='col-sm-4 myTextCenter' id='mainTitle'>
                <?= anchor("admin/backToHome", "<h2 class='smestiSeStyle'>Smesti.se</h2>") ?>
            </div>
            <div class='col-sm-2 '>
                <?php  echo "<p class='myTextRight' id='logRegStyle'>".$admin->ime."   ".$admin->prezime."</p>"; ?>
            </div>
            <div class='col-sm-2 '>
                <?= anchor("admin/logout", "<p class='logReg textLeft' id='logRegStyle'>Odjavi se </p>") ?> 
            </div>
        </div>
    </div>