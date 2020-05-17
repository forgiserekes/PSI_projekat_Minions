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
            <div class = 'offset-sm-3 col-sm-6 text-center'>
                <form method="POST" action="rezultat_pretrage.html">
                    <table class='table'>
                        <tr>
                            <td>Naziv:</td>
                            <td>
                                <input type='search'>
                            </td>
                        </tr>
                        <tr>
                            <td>Datum od:</td>
                            <td>
                                <input type='date'>
                            </td>
                        </tr>
                        <tr>
                            <td>Datum do:</td>
                            <td>
                                <input type='date'>
                            </td>
                        </tr>
                        <tr>
                            <td>Kategorija:</td>
                            <td>
                                <select>
                                    <option>Stan</option>
                                    <option>Apartman</option>
                                    <option>Vikendica</option>
                                    <option>Hotelska soba</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Broj osoba:</td>
                            <td>
                                <input type="number">
                            </td>
                        </tr>
                        <tr>
                            <td>Cena (do):</td>
                            <td>
                                <input type="text">
                            </td>
                        </tr>
                        <tr>
                            <td>Izabrati grad:</td>
                            <td>
                                <select>
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
                            <td>Sortiraj po:</td>
                            <td>
                                <input type="radio" name="group"> Ceni
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="radio" name="group"> Nazivu</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="radio" name="group"> Udaljenosti</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="radio" name="group"> Oceni</td>
                        </tr>   
                        <tr>
                            <td colspan='2' class='text-center'>
                                <a href="rezultat_pretrage.html " class='btn btn-info '>Pretrazi</a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
