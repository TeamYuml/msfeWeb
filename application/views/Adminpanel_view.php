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
            echo form_open('System_controller/SearchU');
            echo form_input($search);
            echo form_input($b_search);
            echo form_close();
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
                        <h1>Pacjenci</h1>
                        <tr class="head">
                            <?php
                            if ($this->session->userdata('id_loged') == 62) {
                                echo '<th>ID</th>';
                                echo '<th>Aktywny</th>';
                            }
                            ?>
                            <th>Imię</th>
                            <th>Nazwisko</th> 
                            <th>PESEL</th>
                            <th>Harmonogramy</th>
                            <th>Usuń</th>
                            <th>Wyświetl dane</th>
                            <?php
                            if ($this->session->userdata('id_loged') == 62) {
                                echo '<th>Przywróć</th>';
                            }
                            ?>
                        </tr>
                        <?php
                        if (isset($msg)) {
                            echo '<div class="alert alert-danger"> <label>' . $msg . '</label></div>';
                        } else {

                            foreach ($patient as $u):
                                ?>
                                <tr class="conten">
                                    <?php
                                    if ($this->session->userdata('id_loged') == 62) {
                                        echo "<td>" . $u->idUser . "</td>";
                                        echo "<td>" . $u->isActiveUser . "</td>";
                                    }
                                    ?>
                                    <td><?php echo $u->imieUser; ?></td>
                                    <td><?php echo $u->nazwiskoUser; ?></td>
                                    <td><?php echo $u->PESELUser; ?></td>
                                   <!-- <td><?php //echo anchor('System_controller/Calendar_show', 'Wyświetl ');                        ?></td>-->
                                    <td><?php
                                        $harmonogram = array(
                                            'name' => 'harmo',
                                            'value' => $u->idUser,
                                            'type' => 'Submit',
                                            'content' => 'Wyswietl',
                                            'id' => 'but'
                                        );
                                        echo form_open('System_controller/Calendar_show');
                                        echo form_button($harmonogram);
                                        echo form_close();
                                        ?></td>
                                    <td><?php
                                        $test_delete = array(
                                            'name' => 'delete',
                                            'value' => $u->idUser,
                                            'type' => 'Submit',
                                            'content' => 'Usuń',
                                            'id' => 'but'
                                        );
                                        echo form_open('System_controller/Delete_Confirm');
                                        echo form_button($test_delete);
                                        echo form_close();
                                        ?></td>
                                    <td><?php
                                        $test_show = array(
                                            'name' => 'info',
                                            'value' => $u->idUser,
                                            'type' => 'Submit',
                                            'content' => 'Pokaż',
                                            'id' => 'but'
                                        );
                                        echo form_open('System_controller/Patient_info');
                                        echo form_button($test_show);
                                        echo form_close();
                                        ?> 
                                    </td>
                                    <td><?php
                                        $re = array(
                                            'name' => 'przywroc_u',
                                            'value' => $u->idUser,
                                            'type' => 'Submit',
                                            'content' => 'Przywróć',
                                            'id' => 'but'
                                        );
                                        echo form_open('System_controller/Przywroc_confirm_u');
                                        echo form_button($re);
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
        </div>


    </body>
</html>
