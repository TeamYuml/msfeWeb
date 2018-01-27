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
        <title>Admin panel</title>
    </head>
    <body>
        <div class="sidenav">
            <img class="img-responsive" src="<?php echo base_url('photo/avatar_icon.png') ?>" />
            <p class="log text-center">Zalogowany:</p>
            <p class="loged text-center"><?php
                if ($this->session->userdata('user_loged') === TRUE) {
                    echo $this->session->userdata('imie_nazwisko_loged');
                }
                ?> </p>
            <?php
            echo anchor('System_controller/AddPatient_show', 'Dodaj pacjenta');
            echo anchor('System_controller/AddWorker_show', 'Dodaj pracownika');
            echo anchor('System_controller/Patient_Worker', 'Przypisz');
            echo anchor('System_controller/Patient_show', 'Pacjenci');
            echo anchor('System_controller/Worker_show', 'Pracownicy');

            ?>
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
                        <h1>Przypisani</h1>
                        <tr class="head">


                            <th>Pacjent</th>
                            <th>Pielęgniarka/az</th>
                            <th>Lekarz</th>

                            <th>ID Lekarz</th>
                            <th>ID User</th>

                            <th>Aktywny</th> 
                            <th>Przywróć</th>
                            <th>Usuń</th>
                        </tr>
                        <?php
                        echo '<div id="infoMessage">' . $this->session->flashdata('message') . '</div>';
                        if (isset($msg)) {
                            echo '<div class="alert alert-danger"> <label>' . $msg . '</label></div>';
                        } else {


                            foreach ($test as $u):
                                $userConnect = array($u->nazwiskoUser, $u->peselUser);
                                $implodeuserConnect = implode('-', $userConnect);
                                $stafConnect = array($u->imieLekarz, $u->nazwiskoLekarz);
                                $implodestafConnect = implode('-', $stafConnect);
                                $nurseConnect = array($u->imieP, $u->nazwiskoP);
                                $implodeNurseConnect = implode('-', $nurseConnect);
                                ?>
                                <tr class="conten">
                                    <td> <?php echo $implodeuserConnect ?></td>
                                    <td><?php
                                        if ($u->idP_C == 0) {
                                            echo "nd.";
                                        } else  {
                                            echo $implodeNurseConnect;
                                        }
                                        ?></td>
                                    <td><?php
                             
                                    echo $implodestafConnect;
                                
                                        ?></td>
                                    <td><?php echo $u->isActive ?></td>
                                    <td><?php
                                        $res = array(
                                            'name' => 'conn',
                                            'value' => $u->ID_U,
                                            'type' => 'Submit',
                                            'content' => 'Przywróć',
                                            'id' => 'but'
                                        );
                                        echo form_open('System_controller/Connect_con');
                                        echo form_button($res);
                                        echo form_close();
                                        ?></td>
                                    <td><?php
                                        $delete = array(
                                            'name' => 'delete',
                                            'value' => $u->ID_U,
                                            'type' => 'Submit',
                                            'content' => 'Usuń',
                                            'id' => 'but'
                                        );
                                        echo form_open('System_controller/Delete_Connect');
                                        echo form_button($delete);
                                        echo form_close();
                                        ?></td>

                            foreach ($list2 as $u):
                                ?>
                                <tr class="conten">
                                    <td> <?php echo $u->idLekarz_C ?></td>
                                    <td><?php echo $u->idUser_C ?></td>
                                    <td><?php echo $u->isActive ?></td>
                                    <td><?php
                        $res = array(
                            'name' => 'conn',
                            'value' => $u->ID_U,
                            'type' => 'Submit',
                            'content' => 'Przywróć',
                            'id' => 'but'
                        );
                        echo form_open('System_controller/Connect_con');
                        echo form_button($res);
                        echo form_close();
                                ?></td>
                                    <td><?php
                                $delete = array(
                                    'name' => 'delete',
                                    'value' => $u->ID_U,
                                    'type' => 'Submit',
                                    'content' => 'Usuń',
                                    'id' => 'but'
                                );
                                echo form_open('System_controller/Delete_Connect');
                                echo form_button($delete);
                                echo form_close();
                                ?></td>

                                </tr>
                                <br>
                                <?php
                            endforeach;
                        }
                        ?>


                    </table>
                </div>
            </div>

            <h1>Stwórz nowe połaczenie Lekarz - Pacjent</h1>

            <h1>Stwórz nowe połaczenie</h1>




            <?php

            echo form_open('System_controller/AddLPP');
            echo "<p> Lekarzy </p>";
            echo "<select name='idlekarz'>";
            foreach ($list3 as $k):
                echo" <option value=" . $k->idLekarz . ">" . $k->imieLekarz . " " . $k->nazwiskoLekarz . "</option>";
            endforeach;
            echo "</select>";
            echo "<br>";
            echo "<p> Pielegniarka/aż </p>";
            echo "<select name='idnurse'>";
            echo"<option value='nd'>nd.</option>";
            foreach ($list4 as $k):
                echo" <option value=" . $k->idP . ">" . $k->imieP . " " . $k->nazwiskoP . "</option>";
            endforeach;
            echo "</select>";
            echo "<p> Pacjentów </p>";
            echo "<select name ='iduser'>";
            foreach ($list as $k):

                echo" <option  value=" . $k->idUser . ">" . $k->nazwiskoUser . " - " . $k->peselUser . "</option>";

            echo form_open('System_controller/AddConnect');
            echo "<p> ID Lekarzy </p>";
            echo "<select name='idlekarz'>";
            foreach ($list as $k):
                echo" <option value=" . $k->idUser . ">" . $k->idUser . "</option>";
            endforeach;
            echo "</select>";
            echo "<br>";
            echo "<p> ID Pacjentów </p>";
            echo "<select name ='iduser'>";
            foreach ($list3 as $k):
                echo" <option  value=" . $k->idLekarz . ">" . $k->idLekarz . "</option>";

            endforeach;
            echo "</select>";
            $bAdd = array(
                'name' => 'Add',
                'type' => 'Submit',
                'content' => 'Powiąż',
                'id' => 'but'
            );
            echo form_button($bAdd);

            echo form_close();
            ?>

        </div>


    </body>
</html>
