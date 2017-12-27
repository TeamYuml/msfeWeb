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
        <?php
        echo anchor('System_controller/Delete?A=' . $delete, 'TAK');
        echo anchor('System_controller/Patient_show', 'NIE');
        ?>
    </body>
</html>
