<!DOCTYPE HTML> 
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--<link href="<?php echo base_url('css/login_style.css'); ?>" rel="stylesheet">-->
        <title>Logowanie</title>
    </head>
    <body>
        <?php
        if ($this->session->userdata('user_loged') === TRUE) {
            echo "<h2 name='user_name'>Zalogowany - > " . $this->session->userdata('imie_nazwisko_loged') . "</h2>";
        }
          echo anchor('Login_controller/Logout', 'Wyloguj');
        ?>
        

            </body>
            <footer>
            </footer>
            </html>