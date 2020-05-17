<div class='bodyContent'>
    <div class='searchDiv'>
        <div class='row'>
            <div class='col-sm-12 blackTextCenter'>
                <h2>Pretraga</h2>
                <hr>
            </div>
            <div class='col-sm-12 blackTextCenter'>
                <p>Izaberite kriterijume pretrage:</p>
            </div>
        </div>
        <div class = 'row'>
            <div class = 'text-center tabela-pretraga'>
                <?php echo form_open("$controller/pretragaSubmit","method=post"); ?>
                <table class='table tabela-pretraga'>
                    <tr >
                        <td>
                            <?php echo "Naziv:"; ?>
                        </td>
                        <td >
                            <?php echo form_input("naziv",set_value("naziv")); ?>
                        </td>
                    </tr>
                    <tr >
                        <td>  
                            <?php echo "Datum od:"; ?>
                        </td>
                        <td >
                            <?php
                                $data = [
                                    'type'  => 'date',
                                    'name'  => 'datumOd'
                                ];                       
                                echo form_input($data);                           
                            ?>                           
                        </td>
                    </tr>
                    <tr >
                        <td>  
                            <?php echo "Datum do:"; ?>
                        </td>
                        <td>
                            <?php
                                $data = [
                                    'type'  => 'date',
                                    'name'  => 'datumDo'
                                ];                       
                                echo form_input($data);                           
                            ?>                           
                        </td>
                    </tr>
                    <tr>
                        <td> 
                            <?php echo "Kategorija:"; ?>
                        </td>
                        <td>
                            <?php
                                $options = [
                                    'Stan'  =>  'Stan',
                                    'Apartman'    =>  'Apartman',
                                    'Vikendica'  => 'Vikendica',
                                    'HotelskaSoba' => 'HotelskaSoba',
                                ];
                                echo form_dropdown('kategorija', $options, 'Stan');                         
                            ?> 
                        </td>
                    </tr>
                    <tr>
                        <td> 
                            <?php echo "Broj soba:"; ?>
                        </td>
                        <td>
                            <?php
                                $data = [
                                    'type'  => 'number',
                                    'name'  => 'brojSoba'
                                ];                       
                                echo form_input($data);                           
                            ?>    
                        </td>
                    </tr>
                    <tr>
                        <td> 
                            <?php echo "Cena do"; ?>
                        </td>
                        <td>
                            <?php
                                $data = [
                                    'type'  => 'number',
                                    'name'  => 'cenaDo'
                                ];                       
                                echo form_input($data);                           
                            ?>    
                        </td>
                    </tr>
                    <tr>
                        <td> 
                            <?php echo "Grad"; ?>
                        </td>
                        <td>
                        <?php
                                $options = [
                                    'Valjevo'  =>  'Valjevo',
                                    'Beograd'    =>  'Beograd',
                                    'Kragujevac'  => 'Kragujevac',
                                    'Sombor' => 'Sombor',
                                    'Sabac' => 'Sabac',
                                    'Smederevo' => 'Smederevo',
                                    'Subotica' => 'Subotica',
                                    'Pancevo' => 'Pancevo',
                                    'Kovin' => 'Kovin',
                                    'Leskovac' => 'Leskovac',
                                    'Nis' => 'Nis'
                                ];
                                echo form_dropdown('grad', $options, 'Stan');                         
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Sortiraj po:</td>
                        <td>                              
                            <?php
                                $data = [
                                    'name'    => 'cena',
                                    'checked' => False
                                ];                      
                                echo form_radio($data);
                                
                            ?>
                            Ceni
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>                              
                            <?php
                                $data = [
                                    'name'    => 'nazivu',
                                    'checked' => False
                                ];                      
                                echo form_radio($data);
                                
                            ?>
                            Nazivu
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>                              
                            <?php
                                $data = [
                                    'name'    => 'udaljenost',
                                    'checked' => False,
                                ];                      
                                echo form_radio($data);
                                
                            ?>
                            Udaljenosti
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>                              
                            <?php
                                $data = [
                                    'name'    => 'ocena',
                                    'checked' => False,
                                ];                      
                                echo form_radio($data);
                                
                            ?>
                            Oceni
                        </td>
                    </tr>   
                    <tr>
                        <td colspan='2' class='text-center'>
                            <div class='myTextCenter'>
                                <?php echo form_submit("pretragaSubmit", "Pretrazi"); ?>
                                <?php form_close(); ?>
                            </div>                           
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
</div>
