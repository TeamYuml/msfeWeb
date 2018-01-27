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
                echo "<div class='back'>" . anchor('System_controller/Patient_show', 'Powrót') . "</div>";
                ?> </p>




            <div class="logout ">
                <?php
                echo anchor('Login_controller/Logout', 'Wyloguj');
                ?>
            </div>
        </div>


            <div class = "main">
                <div class="container">
                    <div class="row">
                    </div>

                    <hr />

                    <div class="row">
                        <div class="col-sm-12">

                            <div class="form-group float-label-control">
                                <h1>Potwierdzasz usunięcie pacjenta?</h1>
                                <?php
                                echo anchor('System_controller/Delete_u?A=' . $delete, 'TAK');
                                ?>

                            </div>
                            <div class="form-group float-label-control">
                                <?php
                                echo anchor('System_controller/Patient_show', 'NIE');
                                ?>

                            </div>





                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
</body>


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
