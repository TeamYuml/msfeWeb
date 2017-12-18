<!DOCTYPE HTML> 
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="<?php echo base_url('css/login_style.css'); ?>" rel="stylesheet">   
        <title>Logowanie</title>
    </head>
    <body>
        <div id="login-button">
            <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
            </img>
        </div>
        <div id="container">
            <h1>Logowanie</h1>
            <span class="close-btn">
                <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
            </span>

            <?php
            echo form_open('login_controller/login');
            $id = array(
                'name' => 'email',
                'placeholder' => 'E-mail'
            );
            $passwordaha = array(
                'name' => 'password',
                'placeholder' => 'Hasło'
            );
            $button = array(
                'name' => 'login_button',
                'value' => 'Zaloguj',
                'type' => 'submit',
                'id' => 'login_button'
            );
          echo form_input($id);
           echo form_input($passwordaha);
      
            echo form_submit($button);
            echo form_close();
            echo $this->session->flashdata('error');
            ?>
      
            <?php
        //    echo form_open('user/register_show');
            echo anchor('login_controller/register_show', 'Rejestracja');
            ?>
            
        </div>
        <script>
            $('#login-button').click(function () {
                $('#login-button').fadeOut("slow", function () {
                    $("#container").fadeIn();

                });
            });

            $(".close-btn").click(function () {
                $("#container, #forgotten-container").fadeOut(800, function () {
                    $("#login-button").fadeIn(800);
                });
            });
        </script>
    </body>
    <footer>
    </footer>
</html>