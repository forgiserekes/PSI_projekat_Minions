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
                            <input type="text" name="naziv">   
                        </td>
                    </tr>
                    <tr >
                        <td>  
                            <?php echo "Datum od:"; ?>
                        </td>
                        <td >
                             <input type="date" name="datumOd">                        
                        </td>
                    </tr>
                    <tr >
                        <td>  
                            <?php echo "Datum do:"; ?>
                        </td>
                        <td>
                            <input type="date" name="datumDo">                       
                        </td>
                    </tr>
                    <tr>
                        <td> 
                            <?php echo "Kategorija:"; ?>
                        </td>
                        <td>                
                            <select name="kategorija">
                                <option>stan</option>
                                <option>apartman</option>
                                <option>vikendica</option>
                                <option>hotelskaSoba</option>
                            </select> 
                        </td>
                    </tr>
                    <tr>
                        <td> 
                             Broj soba:
                        </td>
                        <td>
                            <input type="number" name="brojOsoba">
                        </td>
                    </tr>
                    <tr>
                        <td> 
                            <?php echo "Cena do"; ?>
                        </td>
                        <td>
                            <input type="number" name="cena"> 
                        </td>
                    </tr>
                    <tr>
                        <td> 
                            <?php echo "Grad"; ?>
                        </td>
                        <td>
                            <select name="grad">
                                 <option>Valjevo</option>
                                 <option>Beograd</option>
                                 <option>Kragujevac</option>
                                 <option>Sombor</option>
                                 <option>Sabac</option>
                                 <option>Smederevo</option>
                                 <option>Subotica</option>
                                 <option>Pancevo</option>
                                 <option>Kovin</option>
                                 <option>Leskovac</option>
                                 <option>Novi Sad</option>
                                 <option>Nis</option>
                             </select>
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
