<div class='bodyContent'>
    <div class = 'col-sm-12 myTextCenter'>
        <h2 class='blackTextTitleCenter'>Registrujte se:</h2>
    </div>
    <div class = 'row'>
        <div class = 'registerDiv textCenter'>
            <form method="POST" action="prijava.html">
                <table class='table table-striped'>
                    <tr>
                        <td>Ime:</td>
                        <td>
                            <input type='text' name='firstName'>
                        </td>
                    </tr>
                    <tr>
                        <td>Prezime:</td>
                        <td>
                            <input type='text' name='secondName'>
                        </td>
                    </tr>
                    <tr>
                        <td>Korisnicko ime:</td>
                        <td>
                            <input type='text' name='username'>
                        </td>
                    </tr>
                    <tr>
                        <td>E-mail:</td>
                        <td>
                            <input type='email' placeholder='me@gmail.com' name='mail'>
                        </td>
                    </tr>
                    <tr>
                        <td>Lozinka:</td>
                        <td>
                            <input type='password' name='passReg1'>
                        </td>
                    </tr>
                    <tr>
                        <td>Ponovite lozinku:</td>
                        <td>
                            <input type='password' name='passReg2'>
                        </td>
                    </tr>
                    <tr>
                        <td>Datum rodjenja:</td>
                        <td>
                            <input type="date">
                        </td>
                    </tr>
                    <tr>
                        <td>Adresa:</td>
                        <td>
                            <input type='text' name='address'>
                        </td>
                    </tr>
                    <tr>
                        <td>Vrsta registracija:</td>
                        <td>
                            <input type="radio" name='vrstaReg'>Oglasavac
                            <input type="radio" name='vrstaReg'>Korisnik
                        </td>
                    </tr>
                </table>
                <button class = 'btn btn-success myTextCenter'>Registruj se</button> 
            </form>
        </div>
    </div>
</div>