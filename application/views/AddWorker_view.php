<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="<?php echo base_url('css/Loged_style.css'); ?>" rel="stylesheet" type="text/css" >
    </head>
    <body>
        <?php
        echo validation_errors();

        echo anchor('System_controller/Patient_show', 'Powrót');
        ?> 
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

                    <div class="alert alert-warning"><?php
                        echo validation_errors();
                        ?>
                    </div>

                    <hr />

                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-header">Dodaj Pracownika</h3>
                            <?php
                            echo form_open('login_controller/register');
                            ?>
                            <div class="form-group float-label-control">
                                <label for="login">Email:</label>
                                <input  class="form-control" placeholder="E-mail" type="email" name="login"
                                        value="<?php echo set_value('login'); ?>"/>
                            </div>
                             <div class="form-group float-label-control">
                                <label for="pwd">Hasło:</label>
                                <input  class="form-control" placeholder="Hasło" type="text" name="pwd"
                                        value="<?php echo set_value('pwd'); ?>"/>
                            </div>
                            <div class="form-group float-label-control">
                                <label for="imie">Imie:</label>
                                <input class="form-control" placeholder="Imię" type="text" name="imie"
                                       value="<?php echo set_value('imie'); ?>"/>
                            </div>
                            <div class="form-group float-label-control">
                                <label for="nazwisko">Nazwisko:</label>
                                <input  class="form-control" placeholder="Nazwisko" type="text" name="nazwisko"
                                        value="<?php echo set_value('nazwisko'); ?>"/>
                            </div>
                              <div class="form-group float-label-control">
                                <label for="miasto">Miasto:</label>
                                <input class="form-control" placeholder="Miasto" type="text" name="miasto"
                                       value="<?php echo set_value('miasto'); ?>"/>
                            </div>
                            <div class="form-group float-label-control">
                                <label for="miejscePracy">Miejsce pracy:</label>
                                <input class="form-control" placeholder="Miejsce pracy" type="text" name="miejscePracy"
                                       value="<?php echo set_value('miejscePracy'); ?>"/>
                            </div>
                            <div class="form-group float-label-control">
                                <label for="pesel">Pesel:</label>
                                <input  class="form-control" placeholder="PESEL" type="number" name="pesel"
                                        value="<?php echo set_value('pesel'); ?>"/>
                            </div>
                            <div class="form-group float-label-control">
                                <label for="telefon">Telefon:</label>
                                <input  class="form-control" placeholder="Telefon" type="number" name="telefon"
                                        value="<?php echo set_value('telefon'); ?>"/>
                            </div>
                            <input id="but" type="submit" value="Zatwierdz" name="regi"/>
                            <?php
                            echo form_close();
                            ?> 




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
