<div class='bodyContent'>
    <div class='row '>
        <div class='col-sm-12'>
            <h1 class='blackTextCenter'>Spisak nepotvredjenih rezervacija:</h1>
        </div>
    </div>
    &nbsp;
    <div class='row'>
        <div class='zahteviDiv'>
            <table class='table table-striped table-dark'>
                <thead>
                    <th>#</th>
                    <th>Datum od</th>
                    <th>Datum do</th>
                    <th>Smeštaj</th>
                    <th>Status</th>
                    <th>Korisnik</th>
                    <th>Status </th>
                </thead>
                    <tbody>
                <?php
                //print_r($nepotvrdjeneRezervacije);
                
                if(count($nepotvrdjeneRezervacije)>0){
                    foreach($nepotvrdjeneRezervacije as $rezervacijaKey => $rezervacijaValue){
                        foreach($rezervacijaValue as $rezKey=>$rezValue){
                            echo "<tr>";
                            echo    "<td>". $rezValue->id ."</td>";
                            echo    "<td>". $rezValue->datumOd ."</td>";
                            echo    "<td>". $rezValue->datumDo ."</td>";
                            echo    "<td>". $rezValue->idSmestaj ."</td>";
                            echo    "<td>". $rezValue->status ."</td>";
                            echo    "<td>". $rezValue->idKorisnika ."</td>";
                            $_SESSION['idKorisnikRezervacija'] = $rezValue->idKorisnika;
                            $_SESSION['idSmestajRezervacija']=$rezValue->idSmestaj;
                            echo    "<td>";
                            echo    "<p id='tabelaLinkovi'>" . anchor("Oglasavac/potvrdiRezervaciju/{$rezValue->id}", "Gost se pojavio")."</p>";
                            echo    "</td>";
                            echo    "<td>";
                            echo    "<p id='tabelaLinkovi'>" . anchor("Oglasavac/odbijRezervaciju/{$rezValue->id}", "Gost se nije pojavio")."</p>";
                            echo    "</td>";
                            echo "</tr>";
                        } 
                    }
                }
                 
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>