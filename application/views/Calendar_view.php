<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Calendar Display</title>
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="<?php echo base_url() ?>scripts/fullcalendar/fullcalendar.min.css" />
        <script src="<?php echo base_url() ?>scripts/fullcalendar/lib/moment.min.js"></script>
        <script src="<?php echo base_url() ?>scripts/fullcalendar/fullcalendar.min.js"></script>
        <script src="<?php echo base_url() ?>scripts/fullcalendar/gcal.js"></script>


        <script  src="<?php echo base_url() ?>bootstrap/js/bootstrap.min.js"></script>
        <script  src="<?php echo base_url() ?>bootstrap/js/bootstrap.js"></script>
        <script  src="<?php echo base_url() ?>bootstrap/js/bootstrap-datepicker.min.js"></script>

        <script src="<?php echo base_url() ?>scripts/fullcalendar/locale/pl.js" charset="UTF-8"></script>

        <link href="<?php echo base_url('css/Loged_style.css'); ?>" rel="stylesheet" type="text/css" >


    </head>
    <body>
        <div class="sidenav">
            <img class="img-responsive" src="<?php echo base_url('photo/avatar_icon.png') ?>" />
            <p class="log text-center">Zalogowany:</p>
            <p class="loged text-center"><?php
                if ($this->session->userdata('user_loged') === TRUE) {
                    echo $this->session->userdata('imie_nazwisko_loged');
                }

                $ButtonAddEvent = array(
                    'name' => 'addevent',
                    'value' => 'Dodaj',
                    'type' => 'submit',
                    'id' => 'search_id',
                    'data-toggle' =>'modal',
                    'data-target'=>'#addModal'
                );
                echo form_input($ButtonAddEvent);
                echo "<div class='back'>" . anchor('System_controller/Patient_show', 'Powrót') . "</div>";

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
                    <div class="col-md-12">
                        <h1>Harmonogram</h1>

                        <div id="calendar">

                        </div>

                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Dodaj lek</h4>
                    </div>
                    <div class="modal-body">

                        <?php echo form_open(site_url("System_controller/add_event"), array("class" => "form-horizontal")); ?>

                        <?php echo form_open(site_url("System_controller/add_event"), array("class" => "form-horizontal")) ?>

                        <div class="form-group">
                            <label for="p-in" class="col-md-4 label-heading">Nazwa leku</label>
                            <div class="col-md-8 ui-front">
                                <input type="text" class="form-control" name="name" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="p-in" class="col-md-4 label-heading">Opis</label>
                            <div class="col-md-8 ui-front">
                                <input type="text" class="form-control" name="description">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="p-in" class="col-md-4 label-heading ">Data rozpoczęcia</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control fdp" name="start_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="p-in" class="col-md-4 label-heading">Data zakończenia</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control fdp" name="end_date">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="p-in" class="col-md-4 label-heading">Godzina podania</label>
                            <div class="col-md-8">
                                <input type="time" class="form-control " name="time" id="time">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
                        <input type="submit" class="btn btn-primary" value="Dodaj">
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edytuj</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open(site_url("System_controller/edit_event"), array("class" => "form-horizontal")) ?>
                        <div class="form-group">
                            <label for="p-in" class="col-md-4 label-heading">Nazwa leku</label>
                            <div class="col-md-8 ui-front">
                                <input type="text" class="form-control" name="name" value="" id="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="p-in" class="col-md-4 label-heading">Opis</label>
                            <div class="col-md-8 ui-front">
                                <input type="text" class="form-control" name="description" id="description">
                            </div>
                        </div>
                        <div class="form-group de">
                            <label for="p-in" class="col-md-4 label-heading ">Data rozpoczęcia</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control fdp" name="start_date" id="start_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="p-in" class="col-md-4 label-heading">Data zakończenia</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control fdp" name="end_date" id="end_date">
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="p-in" class="col-md-4 label-heading">Godzina podania</label>
                            <div class="col-md-8 ui-front">
                                <input type="time" class="form-control" name="time" id="time">
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="p-in" class="col-md-4 label-heading">Usuń</label>
                            <div class="col-md-8">
                                <input type="checkbox" name="delete" value="1">
                            </div>
                        </div>
                        <input type="hidden" name="eventid" id="event_id" value="0" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
                        <input type="submit" class="btn btn-primary" value="Aktualizuj">
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {

                var date_last_clicked = null;

                $('#calendar').fullCalendar({

                    eventSources: [

                        {
                            events: function (start, end, timezone, callback) {
                                $.ajax({
                                    url: '<?php echo base_url() ?>index.php/System_controller/get_events',
                                    dataType: 'json',
                                    data: {
                                        // our hypothetical feed requires UNIX timestamps
                                        start: start.unix(),
                                        end: end.unix()
                                    },
                                    success: function (msg) {
                                        var events = msg.events;
                                        callback(events);
                                    }
                                });
                            }
                        },
                    ],
                    dayClick: function (date, jsEvent, view) {
                        date_last_clicked = $(this);
                        $(this).css('background-color', '#bed7f3');
                        $('#addModal').modal();
                        var date_last_clicked = null;
                    },
                    eventClick: function (event, jsEvent, view) {
                        $('#name').val(event.title);
                        $('#description').val(event.description);

                        $('#start_date').val(moment(event.start).format('YYYY/MM/DD'));
                        if (event.end) {
                            $('#end_date').val(moment(event.end).format('YYYY/MM/DD'));
                        } else {
                            $('#end_date').val(moment(event.start).format('YYYY/MM/DD'));
                        }
                        $('#event_id').val(event.id);

                        $('#time').val(event.CzasPodania);

                        $('#editModal').modal();
                    },
                });
            });
        </script>




        <script type="text/javascript">
            $.fn.datepicker.dates['pl'] = {
                days: ["Niedziela", "Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota", "Niedziela"],
                daysShort: ["Nie", "Pn", "Wt", "Śr", "Czw", "Pt", "So", "Nie"],
                daysMin: ["N", "Pn", "Wt", "Śr", "Cz", "Pt", "So", "N"],
                months: ["Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec", "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień"],
                monthsShort: ["Sty", "Lu", "Mar", "Kw", "Maj", "Cze", "Lip", "Sie", "Wrz", "Pa", "Lis", "Gru"],
                today: "Dzisiaj",
                suffix: [],
                meridiem: [],
                weekStart: 1,
                format: "YYYY/MM/DD"
            };
            var d = new Date();
            $(".fdp").datepicker({
                format: "yyyy/mm/dd ",
                todayBtn: true,
                startDate: d,
                autoclose: true,
                language: 'pl'
            });
        </script>    
    </body>
</html>