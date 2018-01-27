<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="<?php echo base_url('css/Loged_style.css'); ?>" rel="stylesheet" type="text/css" >
        <title></title>
    </head>
    <body>
        <div class="sidenav">
            <img class="img-responsive" src="<?php echo base_url('photo/avatar_icon.png') ?>" />
            <p class="log text-center">Zalogowany:</p>
            <p class="loged text-center"><?php
                if ($this->session->userdata('user_loged') === TRUE) {
                    echo $this->session->userdata('imie_nazwisko_loged');
                }
                echo anchor('System_controller/Worker_show', 'Powrót');
                ?> </p>
            <div class="logout ">
                <?php
                echo anchor('Login_controller/Logout', 'Wyloguj');
                ?>
            </div>
        </div>

        <div class = "main">
            <div class="table-responsive">
                <div class="table">
                    <table  style="width:100%">
                        <tr class="head">
                            <th>ID</th>
                            <th>Imię</th>
                            <th>Nazwisko</th> 
                            <th>Miejsce pracy</th>
                            <th>Pesel</th>
                            <th>E-mail</th>
                            <th>Telefon</th>
                        </tr>
                        <?php
                        if (isset($msg)) {
                            echo '<div class="alert alert-danger"> <label>' . $msg . '</label></div>';
                        } else {

                            foreach ($worker as $u):
                                ?>
                                <tr class="conten">
                                    <td><?php echo $u->idLekarz; ?></td>
                                    <td><?php echo $u->imieLekarz; ?></td>
                                    <td><?php echo $u->nazwiskoLekarz; ?></td>
                                    <td><?php echo $u->miejscepracyLekarz; ?></td>
                                    <td><?php echo $u->pesel; ?></td>
                                    <td><?php echo $u->loginLekarz; ?></td>
                                    <td><?php echo $u->telefonLekarza; ?></td>

                                </tr>
                                <br>
                                <?php
                            endforeach;
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
