<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <?php echo validation_errors(); ?>

        <?php echo form_open('login_controller/register'); ?>
        <label for="login">Email:</label>
        <input type="text" name="login"
               value="<?php echo set_value('login'); ?>"/>
        <br />

        <label for="pwd">Wygenerowane hasło - >  </label>
        <input type="text" name="pwd"
               value="<?php echo set_value('pwd'); ?>"/>
        <br />

        <label for="imie">Imie:</label>
        <input type="text" name="imie"
               value="<?php echo set_value('imie'); ?>"/>
        <br />
        <label for="nazwisko">Nazwisko:</label>
        <input type="text" name="nazwisko"
               value="<?php echo set_value('nazwisko'); ?>"/>
        <br />
        <label for="miejscePracy">Miejsce pracy:</label>
        <input type="text" name="miejscePracy"
               value="<?php echo set_value('miejscePracy'); ?>"/>
        <br />
        <label for="miasto">Miasto:</label>
        <input type="text" name="miasto"
               value="<?php echo set_value('miasto'); ?>"/>
        <br />

        <label for="pesel">Pesel:</label>
        <input type="text" name="pesel"
               value="<?php echo set_value('pesel'); ?>"/>
        <br />
        <label for="telefon">Telefon:</label>
        <input type="text" name="telefon"
               value="<?php echo set_value('telefon'); ?>"/>
        <br />

        <input type="submit" value="Zatwierdz" name="regi"/>
        <?php echo form_close(); ?> 
    </body>
</html>
