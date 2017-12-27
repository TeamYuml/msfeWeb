<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table style="width:100%">
            <tr>
                <th>Imię</th>
                <th>Nazwisko</th> 
                <th>Adres</th>
                <th>Telefon</th>
                <th>PESEL</th>
                <th>E-mail</th>
            </tr>
            <?php
            foreach ($patient as $u):
                ?>
                <tr>
                    <td><?php echo $u->imieUser; ?></td>
                    <td><?php echo $u->nazwiskoUser; ?></td>
                    <td><?php echo $u->adresUser; ?></td>
                    <td><?php echo $u->PESELUser; ?></td>
                    <td><?php echo $u->emailUser; ?></td>
                    <td><?php echo $u->telefonUser; ?></td>
                </tr>
            </table>
        <?php endforeach;
        echo anchor('System_controller/Patient_show', 'Powrót');
        ?>

    </body>
</html>
