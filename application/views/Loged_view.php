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

        <label>Wyszukaj po PESEL</label> 
        <?php
        $search = array(
            'name' => 'szukaj',
            'placeholder' => 'Wyszukaj'
        );
        $b_search = array(
            'name' => 'szukaj_b',
            'value' => 'Wyszukaj',
            'type' => 'submit'
        );
        echo form_open('System_controller/SearchP');
        echo form_input($search);
        echo form_input($b_search);
        echo form_close();
        echo anchor('System_controller/AddPatient_show', 'Dodaj pacjenta');
        echo anchor('System_controller/Patient_show', 'Wyświetl wszystkich pacjentów');
        ?>
        <table style="width:100%">
            <tr>
                <th>Imię</th>
                <th>Nazwisko</th> 
                <th>PESEL</th>
                <th>Harmonogramy</th>
                <th>Usuń</th>
                <th>Wyświetl dane</th>
            </tr>
            <?php
            if (isset($msg)) {
                echo '<label>' . $msg . '</label>';
            } else {

                foreach ($patient as $u):
                    ?>
                    <tr>
                        <td><?php echo $u->imieUser; ?></td>
                        <td><?php echo $u->nazwiskoUser; ?></td>
                        <td><?php echo $u->PESELUser; ?></td>
                        <td><?php echo anchor('System_controller/Calendar_show', 'Wyświetl '); ?></td>
                        <td><?php
                            $test_delete = array(
                                'name' => 'delete',
                                'value' => $u->idUser,
                                'type' => 'Submit',
                                'content' => 'Usuń'
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
                                'content' => 'Pokaż'
                            );
                            echo form_open('System_controller/Patient_info');
                            echo form_button($test_show);
                            echo form_close();
                            ?> 
                        </td>
                    </tr>
                    <br>
                    <?php
                endforeach;
            }
            ?>
        </table>
    </body>
    <footer>
    </footer>
</html>