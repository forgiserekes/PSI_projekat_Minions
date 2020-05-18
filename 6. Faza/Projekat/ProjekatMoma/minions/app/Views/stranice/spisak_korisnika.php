<div class='bodyContent'>
    <div class='row '>
        <div class='col-sm-12'>
            <h1 class='blackTextCenter'>Spisak svih zahteva za clanstvo oglašavača:</h1>
        </div>
    </div>
    &nbsp;
    <div class='row'>
        <div class='zahteviDiv'>
            <table class='table table-striped'>
                <thead class='grayBackground'>
                    <th>ID</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Korisnicko ime</th>
                    <th>E-mail</th>
                    <th>Tip</th>
                    <th></th>
                </thead>
                <?php 
                $korisniciModel = new App\Models\KorisniciModel();
                $korisnici = $korisniciModel->dohvSveKorisnike();
                if(count($korisnici)>0){
                    foreach($korisnici as $korisnik){
                        echo "<tr class='darkTextLight'>";
                        echo    "<td>#".$korisnik->id."</td>";
                        echo    "<td>". $korisnik->ime ."</td>";
                        echo    "<td>". $korisnik->prezime. "</td>";
                        echo    "<td>". $korisnik->username ."</td>";
                        echo    "<td>". $korisnik->email ."</td>";
                        echo    "<td>". $korisnik->tip ."</td>";
                        echo    "<td>";
                        echo    "<p id='zahtevi'>" . anchor("Admin/ukloniKorisnika/{$korisnik->id}", "Ukloni")."</p>";
                        echo    "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>