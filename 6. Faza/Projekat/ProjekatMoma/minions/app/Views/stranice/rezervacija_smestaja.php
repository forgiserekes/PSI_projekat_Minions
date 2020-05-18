<body>
        <div class='container'>
            <main>
                <div class='row'>
                    <div class='col-sm-12 naslov'>
                        &nbsp;<br>
                        <h1>Rezervisanje smestaja: </h1>
                        &nbsp; <br>
                    </div>
                </div>
                <div class='row'>
                    <div class='offset-sm-3 col-sm-6 text-center'>
                    <?php echo form_open("Korisnik/rezervisiSubmit","method=post"); ?>
                    <table class='table'>
                        <tr>
                            <td>Datum od:</td>
                            <td>
                                 <input type="date" name="datumOd">                                
                            </td>
                            <td>
                                <?php
                                 if(!empty($errors['datumOd'])){
                                     echo "Ovo polje je obavezno";
                                 }
                                 ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Datum do:</td>
                            <td>
                                <input type="date" name="datumDo">
                            </td>
                            <td>
                            <?php
                                 if(!empty($errors['datumDo'])){
                                     echo "Ovo polje je obavezno";
                                 }
                            ?>                              
                            </td>
                        </tr>
                        <tr>
                            <td>Broj osoba:</td>
                            <td>
                                <input type="number" name="brojOsoba">
                                
                            </td>
                            <td>
                                                                 <?php
                                 if(!empty($errors['brojOsoba'])){
                                     echo "Ovo polje je obavezno";
                                 }
                                 ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Napomena:</td>
                            <td>                                                      
                                <?php
                                $data = [
                                        'name' => 'napomena',                                        
                                        'cols' => '100',
                                        'rows' => '50',
                                        'type' => 'textarea'
                                ];

                                echo form_input($data);

                                 ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <?php
                                 if(isset($greska)){
                                     echo "Termin koji ste odabrali nije dostupan";
                                 }
                            ?>  
                        </tr>
                        <tr>
                            <td colspan='2' class='text-center'>
                                <?php echo form_submit("rezervisiSubmit", "Rezervisi", 'class = btn-info'); ?>
                                <?php form_close(); ?>
                            </td>
                             <td></td>
                        </tr>
                    </table>
                </div>
            </main>
        </div>
    </body>