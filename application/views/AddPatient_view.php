<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <?php
        echo validation_errors();
        echo form_open('System_controller/AddPatient');
        ?>
        <label for="login">Email:</label>
        <input type="text" name="login"
               value="<?php echo set_value('login'); ?>"/>
        <br />
        <label for="imie">Imie:</label>
        <input type="text" name="imie"
               value="<?php echo set_value('imie'); ?>"/>
        <br />
        <label for="nazwisko">Nazwisko:</label>
        <input type="text" name="nazwisko"
               value="<?php echo set_value('nazwisko'); ?>"/>
        <br />
        <label for="adres">Adres:</label>
        <input type="text" name="adres"
               value="<?php echo set_value('adres'); ?>"/>
        <br />
        <label for="pesel">Pesel:</label>
        <input type="text" name="pesel"
               value="<?php echo set_value('pesel'); ?>"/>
        <br />
        <label for="telefon">Telefon:</label>
        <input type="text" name="telefon"
               value="<?php echo set_value('telefon'); ?>"/>
        <br />
        <input type="submit" value="Zatwierdz" name="ok"/>
        <?php echo form_close();
        echo anchor('System_controller/Patient_show', 'Powrót');
        ?> 
    </body>
</html>
