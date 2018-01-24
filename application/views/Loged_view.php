

        <div class = "main">
            <div class="table-responsive">
                <div class="table">
                    <table  style="width:100%">
                        <tr class="head">
                            <th>Imię</th>
                            <th>Nazwisko</th> 
                            <th>PESEL</th>
                            <th>Harmonogramy</th>
                            <th>Usuń</th>
                            <th>Wyświetl dane</th>
                        </tr>
                        <?php
                        if (isset($msg)) {
                            echo '<div class="alert alert-danger"> <label>' . $msg . '</label></div>';
                        } else {

                            foreach ($patient as $u):
                                ?>
                                <tr class="conten">
                                    <td><?php echo $u->imieUser; ?></td>
                                    <td><?php echo $u->nazwiskoUser; ?></td>
                                    <td><?php echo $u->PESELUser; ?></td>
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
                                        $deleteUser = array(
                                            'name' => 'delete',
                                            'value' => $u->idUser,
                                            'type' => 'Submit',
                                            'content' => 'Usuń',
                                            'id' => 'but'
                                        );
                                        echo form_open('System_controller/Delete_Confirm');
                                        echo form_button($deleteUser);
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