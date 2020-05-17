<div class='bodyContent'>
    <div class='row'>
        <div class = 'col-sm-12 myTextCenter'>
            <h2 class='blackTextTitleCenter'>Postavite vaš oglas:</h2>
        </div>
    </div>
    <div class='row'>
        <div class='adPlacingDiv'>
            <form name="postavkaOglasaForm" action="<?= site_url("Oglasavac/postavljanjeOglasaSubmit") ?>" method="post">
            <table class='table table-borderless'>
                <tr>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['naziv'])) echo $errors['naziv'];?>
                        </font>
                    </td>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['room_type'])) echo $errors['room_type'];?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Naziv smeštaja</td>
                    <td>
                        <?php
                            echo form_input("naziv",set_value("naziv"));
                        ?>
                    </td>
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
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['kapacitet'])) echo $errors['kapacitet'];?>
                        </font>
                    </td>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['povrsina'])) echo $errors['povrsina'];?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Kapacitet:</td>
                    <td>
                        <?php echo form_input("kapacitet",set_value("kapacitet")); ?>
                    </td>
                    <td>Povrsina [m<sup>2</sup>]:</td>
                    <td>
                        <?php echo form_input('povrsina',set_value('povrsina')); ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['cena'])) echo $errors['cena'];?>
                        </font>
                    </td>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['kitchen_type'])) echo $errors['kitchen_type'];?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Cena:</td>
                    <td>
                        <?php echo form_input("cena",set_value("cena")); ?>
                    </td>
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
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['parking'])) echo $errors['parking'];?>
                        </font>
                    </td>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['terasa'])) echo $errors['terasa'];?>
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
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['koordinateY'])) echo $errors['koordinateY'];?>
                        </font>
                    </td>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['koordinateX'])) echo $errors['koordinateX'];?>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Koordinate po x:</td>
                    <td>
                        <?php
                            $data1 = [
                                'name'      => 'koordinateY',
                                'id'        => 'koordinateY',
                                'placeholder' => '[°N / S°]'
                            ];
                            echo form_input($data1);
                        ?>
                    </td>
                    <td>Koordinate po y:</td>
                    <td>
                        <?php
                        $data2 = [
                            'name'      => 'koordinateX',
                            'id'        => 'koordinateX',
                            'placeholder'=>'[°W / E°]'
                        ];    
                        echo form_input($data2);  
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['ulica'])) echo $errors['ulica'];?>
                        </font>
                    </td>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['broj'])) echo $errors['broj'];?>
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
                    <td>Broj:</td>
                    <td>
                        <?php 
                            echo form_input('broj',set_value('broj'));
                         ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['grad'])) echo $errors['grad'];?>
                        </font>
                    </td>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['ptt'])) echo $errors['ptt'];?>
                        </font>
                    </td>
                </tr>
               <tr>
                    <td>Grad:</td>
                    <td>
                        <?php 
                            echo form_input('grad',set_value('grad'));
                         ?>
                    </td>
                    <td>Postanski broj:</td>
                    <td>
                        <?php 
                            echo form_input('ptt',set_value('ptt'));
                         ?>
                    </td> 
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['drzava'])) echo $errors['drzava'];?>
                        </font>
                    </td>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['opis'])) echo $errors['opis'];?>
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
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['opis'])) echo $errors['opis'];?>
                        </font>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Opis:</td>
                    <td colspan='3'>
                        <?php
                        $data = [
                            'id'=>'opis',
                            'name'=>'opis',
                            'rows'=>'5',
                            'cols'=>'80',
                            'placeholder'=>'Kompletan opis smestaja'
                        ];
                        echo form_textarea($data);
                        ?>
                    </td>
                </tr>
            </table>
            <div class='row adPlacingDiv'>
                <input type="submit" value="Postavite smeštaj" align='center'/>
            </div>
        </form>
    </div>
</div>