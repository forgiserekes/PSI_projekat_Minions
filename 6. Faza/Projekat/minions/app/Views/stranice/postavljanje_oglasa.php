<div class='bodyContent'>
    <div class='row'>
        <div class = 'col-sm-12 myTextCenter'>
            <h2 class='blackTextTitleCenter'>Postavite vaš oglas:</h2>
        </div>
    </div>
    <div class='row'>
        <div class='adPlacingDiv'>
            
            <?php
                $data=[
                    "method"=>"post",
                    "enctype"=>"multipart/form-data"
                ];      
                echo form_open("Oglasavac/postavljanjeOglasaSubmit",$data); 
            ?>
            <table class='table'>
                <tr>
                    <td>Tip smestaja:</td>
                    <td>
                        <?php 
                            $options = [
                                'soba' => 'Soba',
                                'apartman' => 'Apartman',
                                'hotelskaSoba' => 'Hotelska soba',
                                'vikendica' => 'Vikendica',
                            ];
                            echo form_dropdown('room_type',$options);
                        ?>
                    </td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['room_type'])) echo $errors['room_type'];?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Kapacitet:</td>
                    <td>
                        <?php echo form_input("kapacitet",set_value("kapacitet")); ?>
                    </td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['kapacitet'])) echo $errors['kapacitet'];?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Povrsina [m<sup>2</sup>]:</td>
                    <td>
                        <?php echo form_input('povrsina',set_value('povrsina')); ?>
                    </td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['povrsina'])) echo $errors['povrsina'];?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Cena:</td>
                    <td>
                        <?php echo form_input("cena",set_value("cena")); ?>
                    </td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['cena'])) echo $errors['cena'];?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Kuhinja:</td>
                    <td>
                        <?php
                            $data1 = [
                                'name'    => 'kitchen_type',
                                'value'      => 'da',
                                'checked' => FALSE,
                            ];
                            echo form_radio($data1); 
                            echo "Da";
                            $data2 = [
                                'name'    => 'kitchen_type',
                                'value'   => 'ne',
                                'checked' => FALSE,
                            ];
                            echo form_radio($data2);
                            echo " Ne";
                        ?>
                    </td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['kitchen_type'])) echo $errors['kitchen_type'];?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Parking:</td>
                    <td>
                        <?php
                            $data1 = [
                                'name'    => 'parking',
                                'value'   => 'da',
                                'checked' => FALSE,
                            ];
                            echo form_radio($data1); 
                            echo "Da";
                            $data2 = [
                                'name'    => 'parking',
                                'value'   => 'ne',
                                'checked' => FALSE,
                            ];
                            echo form_radio($data2);
                            echo " Ne";
                        ?>
                    </td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['parking'])) echo $errors['parking'];?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Terasa:</td>
                    <td>
                        <?php
                            $data1 = [
                                'name'    => 'terasa',
                                'value'      => 'da',
                                'checked' => FALSE,
                            ];
                            echo form_radio($data1); 
                            echo "Da";
                            $data2 = [
                                'name'    => 'terasa',
                                'value'   => 'ne',
                                'checked' => FALSE,
                            ];
                            echo form_radio($data2);
                            echo " Ne";
                        ?>
                    </td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['terasa'])) echo $errors['terasa'];?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Ulica:</td>
                    <td>
                        <?php 
                            echo form_input('ulica',set_value('ulica'));
                         ?>
                    </td>
                     <td>
                        <font color='red'>
                            <?php if(!empty($errors['ulica'])) echo $errors['ulica'];?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Broj:</td>
                    <td>
                        <?php 
                            echo form_input('broj',set_value('broj'));
                         ?>
                    </td>
                     <td>
                        <font color='red'>
                            <?php if(!empty($errors['broj'])) echo $errors['broj'];?>
                        </font>
                    </td>
                </tr><tr>
                    <td>Grad:</td>
                    <td>
                        <?php 
                            echo form_input('grad',set_value('grad'));
                         ?>
                    </td>
                     <td>
                        <font color='red'>
                            <?php if(!empty($errors['grad'])) echo $errors['grad'];?>
                        </font>
                    </td>
                </tr><tr>
                    <td>Postanski broj:</td>
                    <td>
                        <?php 
                            echo form_input('ptt',set_value('ptt'));
                         ?>
                    </td>
                     <td>
                        <font color='red'>
                            <?php if(!empty($errors['ptt'])) echo $errors['ptt'];?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Drzava:</td>
                    <td>
                        <?php 
                            echo form_input('drzava',set_value('drzava'));
                         ?>
                    </td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['drzava'])) echo $errors['drzava'];?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Opis:</td>
                    <td>
                        <?php
                        $data = [
                            'id'=>'opis',
                            'name'=>'opis',
                            'rows'=>'10',
                            'cols'=>'50',
                            'placeholder'=>'Kompletan opis smestaja'
                        ];
                        echo form_textarea($data);
                        ?>
                    </td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['opis'])) echo $errors['opis'];?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Koordinate:</td>
                    <td>
                        <?php
                            $data1 = [
                                'name'      => 'koordinateY',
                                'id'        => 'koordinateY',
                                'placeholder' => 'Po Y osi [°N / S°]'
                            ];
                            $data2 = [
                                'name'      => 'koordinateX',
                                'id'        => 'koordinateX',
                                'placeholder'=>'Po X osi [°W / E°]'
                            ];

                            echo form_input($data1);
                            echo form_input($data2);  
                        ?>
                    </td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['koordinateX'])) echo $errors['koordinateX'];?>
                            <?php if(!empty($errors['koordinateY'])) echo $errors['koordinateY'];?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Slike smeštaja:</td>
                    <td>
                        
                        <?php
                            $data=[
                                'name' => 'slikeSmestaja[]',
                                'multiple'=>'true',
                                'accept'=>'image/png, image/jpeg'
                           ];
                            echo form_upload($data);
                        ?>
                        <!--<input type='file' name='slikeSmestaja[]' multiple='true' accept='image/png, image/jpeg' />-->
                    </td>
                     <td>
                        <font color='red'>
                            <?php if(!empty($errors['slikeSmestaja[]'])) echo $errors['slikeSmestaja[]'];?>
                        </font>
                    </td>
                </tr>
                
            </table>
            <div class='text-center'>
                <?php echo form_submit("postavkaOglasa", "Postavi oglas"); ?>
                <?php form_close(); ?>
            </div>
    </div>
</div>