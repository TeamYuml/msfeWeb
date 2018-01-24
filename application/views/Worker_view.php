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
                        <h1>Lekarz</h1>
                        <tr class="head">
                            <th>ID</th>
                            <th>Aktywny</th>
                            <th>Imię</th>
                            <th>Nazwisko</th> 
                            <th>PESEL</th>
                            <th>Stanowisko</th>
                            <th>Usuń</th>
                            <th>Wyświetl dane</th>
                            <th>Przywróć</th>
                        </tr>
                        <?php
                        if (isset($msg)) {
                            echo '<div class="alert alert-danger"> <label>' . $msg . '</label></div>';
                        } else {

                            foreach ($worker as $u):
                                ?>
                                <tr class="conten">
                                    <td><?php echo $u->idLekarz; ?></td>
                                    <td><?php echo $u->isActiveLekarz; ?> </td>
                                    <td><?php echo $u->imieLekarz; ?></td>
                                    <td><?php echo $u->nazwiskoLekarz; ?></td>
                                    <td><?php echo $u->pesel; ?></td>          
                                     <td><?php echo $u->Stanowisko; ?></td>          
                                    <td><?php
                                        $test_delete = array(
                                            'name' => 'delete',
                                            'value' => $u->idLekarz,
                                            'type' => 'Submit',
                                            'content' => 'Usuń',
                                            'id' => 'but'
                                        );
                                        echo form_open('System_controller/Delete_Confirm_w');
                                        echo form_button($test_delete);
                                        echo form_close();
                                        ?></td>
                                   
                                    
                                    <td><?php
                                        $test_show = array(
                                            'name' => 'info',
                                            'value' => $u->idLekarz,
                                            'type' => 'Submit',
                                            'content' => 'Pokaż',
                                            'id' => 'but'
                                        );
                                        echo form_open('System_controller/Worker_info');
                                        echo form_button($test_show);
                                        echo form_close();
                                        ?> 
                                    </td>
                                    <td><?php
                                        $re = array(
                                            'name' => 'przywroc_w',
                                            'value' => $u->idLekarz,
                                            'type' => 'Submit',
                                            'content' => 'Przywróć',
                                            'id' => 'but'
                                        );
                                        echo form_open('System_controller/Przywroc_confirm_w');
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
                     <table  style="width:100%">
                        <h1>Pielegniarka/az</h1>
                        <tr class="head">
                            <th>ID</th>
                            <th>Aktywny</th>
                            <th>Imię</th>
                            <th>Nazwisko</th> 
                            <th>PESEL</th>
                            <th>Stanowisko</th>
                            <th>Usuń</th>
                            <th>Wyświetl dane</th>
                            <th>Przywróć</th>
                        </tr>
                        <?php
                        if (isset($msg)) {
                            echo '<div class="alert alert-danger"> <label>' . $msg . '</label></div>';
                        } else {

                            foreach ($workerN as $u):
                                ?>
                                <tr class="conten">
                                    <td><?php echo $u->idP; ?></td>
                                    <td><?php echo $u->isActive; ?> </td>
                                    <td><?php echo $u->imieP; ?></td>
                                    <td><?php echo $u->nazwiskoP; ?></td>
                                    <td><?php echo $u->pesel; ?></td>          
                                     <td><?php echo $u->stanowisko; ?></td>          
                                    <td><?php
                                        $test_delete = array(
                                            'name' => 'delete',
                                            'value' => $u->idP,
                                            'type' => 'Submit',
                                            'content' => 'Usuń',
                                            'id' => 'but'
                                        );
                                        echo form_open('System_controller/Delete_Confirm_N');
                                        echo form_button($test_delete);
                                        echo form_close();
                                        ?></td>
                                   
                                    
                                    <td><?php
                                        $test_show = array(
                                            'name' => 'info',
                                            'value' => $u->idP,
                                            'type' => 'Submit',
                                            'content' => 'Pokaż',
                                            'id' => 'but'
                                        );
                                        echo form_open('System_controller/Nurse_info');
                                        echo form_button($test_show);
                                        echo form_close();
                                        ?> 
                                    </td>
                                    <td><?php
                                        $re = array(
                                            'name' => 'przywroc_w',
                                            'value' => $u->idP,
                                            'type' => 'Submit',
                                            'content' => 'Przywróć',
                                            'id' => 'but'
                                        );
                                        echo form_open('System_controller/Przywroc_confirm_N');
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
