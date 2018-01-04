
                       
                   <?php
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

                        
                        
                            <div class="dd">
            <div class="container-fluid">
                <div class="table-responsive">
                    <div class="table">
                        <table  style="width:100%">
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
                                       <!-- <td><?php //echo anchor('System_controller/Calendar_show', 'Wyświetl ');                   ?></td>-->
                                        <td><?php
                                            $harmonogram = array(
                                                'name' => 'harmo',
                                                'value' => $u->idUser,
                                                'type' => 'Submit',
                                                'content' => 'Wyswietl'
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
                    </div>
                </div>
            </div>
                                
                                
                                
                                
                                
                                       <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="dd">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Imię</th>
                                        <th scope="col">Nazwisko</th> 
                                        <th scope="col">PESEL</th>
                                        <th scope="col">Harmonogramy</th>
                                        <th scope="col">Usuń</th>
                                        <th scope="col">Wyświetl dane</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        if (isset($msg)) {
                                            echo '<label>' . $msg . '</label>';
                                        } else {

                                            foreach ($patient as $u):
                                                ?>

                                                <td><?php echo $u->imieUser; ?></td>
                                                <td><?php echo $u->nazwiskoUser; ?></td>
                                                <td><?php echo $u->PESELUser; ?></td>
                                               <!-- <td><?php //echo anchor('System_controller/Calendar_show', 'Wyświetl ');                     ?></td>-->
                                                <td><?php
                                                    $harmonogram = array(
                                                        'name' => 'harmo',
                                                        'value' => $u->idUser,
                                                        'type' => 'Submit',
                                                        'content' => 'Wyswietl'
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

                                        <br>
                                        <?php
                                    endforeach;
                                }
                                ?>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                                
                                
                                
                                        <div class="container-fluid">
            <div class="row">
            <div class="col-md-4">
        <div id="sidebar-wrapper">
            <ul id="sidebar_menu" class="sidebar-nav">
                <li class="sidebar-brand"><img class="img-responsive imL" src="<?php echo base_url('photo/avatar_icon.png') ?>" /></li>
                <li><p class="log">Zalogowany:</p></li>
                <li><p class="loged"><?php
                        if ($this->session->userdata('user_loged') === TRUE) {
                            echo $this->session->userdata('imie_nazwisko_loged');
                        }
                        ?> </p></li>
            </ul>
            <ul class="sidebar-nav" id="sidebar">
                <li><a>Cadastro<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
                <ul class="sidebar-nav" id="sidebar">
                    <li><a>link1<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
                    <li><a>link2<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
                </ul>
                <li><a>Consulta<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
                <li><a>Relatorio<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
            </ul>
        </div>
            </div></div></div>
                                
                                