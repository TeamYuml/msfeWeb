<!DOCTYPE HTML> 
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="<?php echo base_url('css/Loged_style.css'); ?>" rel="stylesheet" type="text/css" >
        <title>Logowanie</title>

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
            echo anchor('System_controller/Patient_show', 'Pacjenci');
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
            echo form_open('System_controller/SearchP');
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