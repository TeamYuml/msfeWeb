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

                
                echo anchor('System_controller/Patient_show', 'Powrót');
                
                
                $search = array(
                'name' => 'szukaj',
                'placeholder' => 'PESEL',
                'id' => 'search'
            );
            $b_search = array(
                'name' => 'szukaj_b',
                'value' => 'Wyszukaj',
                'type' => 'submit',
                'id' => 'search_id'
            );
            echo "<p>Wyszukaj:</p>";
            echo form_open('System_controller/SearchP_info');
            echo form_input($search);
            echo form_input($b_search);
            echo form_close();

                echo anchor('System_controller/Patient_show', 'Powrót');

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
                            <?php
                            if ($this->session->userdata('id_loged') == 62) {
                                echo '<th>ID</th>';
                            }
                            ?>
                            <th>Imię</th>
                            <th>Nazwisko</th> 
                            <th>Adres</th>
                            <th>Pesel</th>
                            <th>E-mail</th>
                            <th>Telefon</th>
                        </tr>
                        <?php
                        if (isset($msg)) {
                            echo '<div class="alert alert-danger"> <label>' . $msg . '</label></div>';
                        } else {

                            foreach ($patient as $u):

                                $Adres = array($u->MiastoUser,$u->UlicaUser,$u->NrmUser);
                                $Adresimplode = implode(" - ",$Adres);
                                ?>
                                <tr class="conten">
                                    <?php
                                    if ($this->session->userdata('id_loged') == 62) {
                                        echo "<td>" . $u->idUser . "</td>";
                                    }
                                    ?>
                                    <td><?php echo $u->imieUser; ?></td>
                                    <td><?php echo $u->nazwiskoUser; ?></td>

                                    <td><?php echo $Adresimplode ?></td>
                                    <td><?php echo $u->PESELUser; ?></td>
                                    <td><?php echo $u->emailUser; ?></td>
                                    <td><?php echo $u->telefonUser; ?></td>

                                    <td><?php echo $u->adresUser; ?></td>
                                    <td><?php echo $u->PESELUser; ?></td>
                                    <td><?php echo $u->emailUser; ?></td>
                                    <td><?php echo $u->telefonUser; ?></td>

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
