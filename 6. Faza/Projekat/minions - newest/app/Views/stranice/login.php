<div class='bodyContent'>
    <div class = 'col-sm-12 myTextCenter'>
        <h2 class='blackTextTitleCenter'>Ulogujte se:</h2>
    </div>
    <div class = 'row'>
        <div class = 'registerDiv textCenter'>
            <?php if(isset($poruka)) echo "<span> <font color='red'>$poruka</font><br> </span>"; ?>
            <?php echo form_open("Gost/loginSubmit","method=post"); ?>
            <table class='table' align='center'>
                <tr>
                    <td>
                        <?php echo "Korisničko ime:" ?>
                    </td>
                    <td>
                        <?php echo form_input("login_username",set_value("login_username")); ?>
                    </td>
                    <td>
                        <font color='red'>
                            <?php if(!empty($errors['login_username'])) echo $errors['login_username'];?>
                        </font>
                    </td>
                </tr>
                <tr>
                        <td>
                            <?php echo "Lozinka:" ?>
                        </td>
                        <td>
                            <input type="password" name="login_password"/>
                        </td>
                        <td>
                            <font color='red'>
                                <?php if(!empty($errors['login_password'])) echo $errors['login_password'];?>
                            </font>
                        </td>
                    </tr>
            </table>
            <?php echo form_submit("loginSubmit", "Uloguj se"); ?>
            <?php form_close(); ?>
        </div>
    </div>
</div>