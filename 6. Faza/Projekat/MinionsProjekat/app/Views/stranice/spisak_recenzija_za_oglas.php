<div class='bodyContent'>
    <div class='recenzijeDiv'>
        <div class='row '>
            <div class='col-sm-12 naslov'>
                &nbsp;<br>
                <?php echo "<p class='blackTextCenter'> Recenzije za smeštaj: " . $smestaj->naziv ."</p>";?>  
            </div>
        </div>
        <div class='row'>
            <div class='col-sm-12'>
                <table class='table table-striped'>
                    <thead class='grayBackground'>
                        <th>Korisnik</th>
                        <th>Recenzija</th>
                    </thead>
                    <script type='text/javascript' src='<?=base_url('js/srkipta_deklaracija.js');?>'></script>
                    <?php
                        $recenzijaModel = new \App\Models\RecenzijaModel();
                        $recenzije = $recenzijaModel->dohvSveRecenzijeOglasa($smestaj->id);
                        
                        foreach($recenzije as $recenzija){
                            $korisniciModel = new \App\Models\KorisniciModel();
                            $korisnik = $korisniciModel->dohvKorisnika($recenzija->idKorisnik)[0];
                    ?>
                    <tr>
                        <td>
                          <?php echo $korisnik->ime." ".$korisnik->prezime;?>
                        </td>
                        <td>
                          <?php echo "#". $recenzija->id;?>  
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-sm-6">
                                    <table>
                                        <tr>
                                            <td class='tableText'>Cistoca:</td>
                                            <td>
                                                <div class='prikaz1'>
                                                    <span class='fa fa-star-o'></span>
                                                    <span class='fa fa-star-o'></span>
                                                    <span class='fa fa-star-o'></span>
                                                    <span class='fa fa-star-o'></span>
                                                    <span class='fa fa-star-o'></span>
                                                </div>
                                            </td>
                                        <input type='hidden' id='cistocaVal' value='<?php echo $recenzija->cistoca; ?>'>
                                        <script type='text/javascript' src='<?=base_url('js/skripta_prikaz_cistoca.js');?>'></script>
                                        </tr>
                                        <tr>
                                            <td class='tableText'>Komfor:</td>
                                            <td>
                                                <div class='prikaz2'>
                                                    <span class='fa fa-star-o'></span>
                                                    <span class='fa fa-star-o'></span>
                                                    <span class='fa fa-star-o'></span>
                                                    <span class='fa fa-star-o'></span>
                                                    <span class='fa fa-star-o'></span>
                                                </div>
                                            </td>
                                            <input type='hidden' id='komforVal' value='<?php echo $recenzija->komfor; ?>'>
                                            <script type='text/javascript' src='<?=base_url('js/skripta_prikaz_komfor.js');?>'></script>
                                        </tr>
                                        <tr>
                                            <td class='tableText'>Kvalitet:</td>
                                            <td>
                                                <div class='prikaz3'>
                                                    <span class='fa fa-star-o'></span>
                                                    <span class='fa fa-star-o'></span>
                                                    <span class='fa fa-star-o'></span>
                                                    <span class='fa fa-star-o'></span>
                                                    <span class='fa fa-star-o'></span>
                                                </div>
                                            </td>
                                            <input type='hidden' id='kvalitetVal' value='<?php echo $recenzija->kvalitet; ?>'>
                                            <script type='text/javascript' src='<?=base_url('js/skripta_prikaz_kvalitet.js');?>'></script>
                                        </tr>
                                        <tr>
                                            <td class='tableText'>Lokacija:</td>
                                            <td>
                                                <div class='prikaz5'>
                                                    <span class='fa fa-star-o'></span>
                                                    <span class='fa fa-star-o'></span>
                                                    <span class='fa fa-star-o'></span>
                                                    <span class='fa fa-star-o'></span>
                                                    <span class='fa fa-star-o'></span>
                                                </div>
                                            </td>
                                            <input type='hidden' id='lokacijaVal' value='<?php echo $recenzija->lokacija; ?>'>
                                            <script type='text/javascript' src='<?=base_url('js/skripta_prikaz_lokacija.js');?>'></script>
                                        </tr>
                                        <tr>
                                            <td class='tableText'>Ljubaznost:</td>
                                            <td>
                                                <div class='prikaz4'>
                                                    <span class='fa fa-star-o'></span>
                                                    <span class='fa fa-star-o'></span>
                                                    <span class='fa fa-star-o'></span>
                                                    <span class='fa fa-star-o'></span>
                                                    <span class='fa fa-star-o'></span>
                                                </div>
                                            </td>
                                            <input type='hidden' id='ljubaznostVal' value='<?php echo $recenzija->ljubaznost; ?>'>
                                            <script type='text/javascript' src='<?=base_url('js/skripta_prikaz_ljubaznost.js');?>'></script>
                                        </tr>
                                    </table>
                                    
                                </div>
                                <div class="col-sm-6">
                                    <table>
                                        <tr>
                                            <td class='tableText'>Prosecna Ocena:</td>
                                        </tr>
                                        <tr>
                                            <td>Opsti Utisak:</td>
                                            <td><?php echo $recenzija->opstiUtisak;?></td>
                                        </tr>
                                        <tr>
                                            <td class='tableText'>Tip putnika:</td>
                                            <td><?php echo $recenzija->tip;?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>
        </div>
    
</div>