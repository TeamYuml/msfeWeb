<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class System_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('login_model');
    }

    public function LoadViewUser() {
        $this->load->view('UserNavBar_view');
    }

    public function Patient_list() {
        $this->load->model('login_model');
        $result['list'] = $this->login_model->patientshow();
        return $result['list'];
    }

    public function Patient_list_A() {
        $result['list'] = $this->login_model->patientshow_a();
        return $result['list'];
    }

    public function Worker_list() {

        $result['list'] = $this->login_model->workershow();
        $result['list2'] = $this->login_model->workerNshow();
        return $result['list'];
    }

    public function Patient_show() {
        if (($this->session->userdata('user_loged') === TRUE)) {
            if ($this->session->userdata('id_loged') == 62) {
                $d['patient'] = $this->Patient_list_A();
                $this->LoadViewUser();
                $this->load->view('Adminpanel_view', $d);
            } else {
                $d['patient'] = $this->Patient_list();
                $this->LoadViewUser();
                $this->load->view('Loged_view', $d);
            }
        } else {

            redirect("login_controller/Login_show");
        }
    }

    public function Worker_show() {
        if (($this->session->userdata('user_loged') === TRUE)) {
            $d['worker'] = $this->login_model->workershow();
            $d['workerN'] = $this->login_model->workerNshow();
           // $d['worker'] = $this->Worker_list();
            $this->load->view('Worker_view', $d);
        } else {
            redirect("login_controller/Login_show");
        }
    }

    public function Adminpanel_show() {
        if (($this->session->userdata('user_loged') === TRUE)) {
            $d['patient'] = $this->Patient_list();
            $this->load->view('Adminpanel_view', $d);
        } else {

            redirect("login_controller/Login_show");
        }
    }

    public function Delete_Confirm() {

        $id = $this->input->post('delete');
        $this->load->model('login_model');
        $deleted = $this->login_model->Deletedpatient($id);
        if ($deleted == true) {
            redirect('System_controller/Patient_show', 'refresh');
        } else {
            show_404();
        }
    }

    public function Delete_Confirm_w() {
        $id = $this->input->post('delete');
        $deleted = $this->login_model->Deletedworker($id);
        if ($deleted == true) {
            redirect('System_controller/Worker_show', 'refresh');
        } else {
            show_404();
        }
    }
      public function Delete_Confirm_N() {
        $id = $this->input->post('delete');
        $deleted = $this->login_model->DeletedworkerN($id);
        if ($deleted == true) {
            redirect('System_controller/Worker_show', 'refresh');
        } else {
            show_404();
        }
    }

    public function Delete_w() {

        $id_delete = $this->input->get('A');
        $this->load->model('login_model');
        $deleted = $this->login_model->Deletedworker($id_delete);
        if ($deleted == true) {
            redirect('System_controller/Worker_show', 'refresh');
        } else {
            show_404();
        }
    }

    //Wyszukiwanie pacjenta z poziomu  Lekarza 
    public function SearchP() {
        if ($this->form_validation->run('search') === FALSE) {
            $msg_val['msg'] = 'Nie ma takiego pacjenta';
            $this->LoadViewUser();
            $this->load->view('Loged_view', $msg_val);
        } else {
            $result['patient'] = $this->login_model->Search_P();
            $this->LoadViewUser();
            $this->load->view('Loged_view', $result);
        }
    }

    public function SearchP_info() {
        if ($this->form_validation->run('search') === FALSE) {
            $msg_val['msg'] = 'Nie ma takiego pacjenta';
            $this->LoadViewUser();
            $this->load->view('Patient_info', $msg_val);
        } else {
            $result['patient'] = $this->login_model->Search_P();
            $this->LoadViewUser();
            $this->load->view('Patient_info', $result);
        }
    }

    public function SearchU() {
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if ($this->form_validation->run('search') === FALSE) {
            $msg_val['msg'] = 'Nie ma takiego pacjenta';
            $this->load->view('Adminpanel_view', $msg_val);
        } else {
            $this->load->model('login_model');
            $result['patient'] = $this->login_model->Search_U();
            $this->load->view('Adminpanel_view', $result);
        }
    }

    public function SearchW() {
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if ($this->form_validation->run('search') === FALSE) {
            $msg_val['msg'] = 'Nie ma takiego pracownika';
            $this->load->view('Worker_view', $msg_val);
        } else {
            $this->load->model('login_model');
            $result['worker'] = $this->login_model->Search_W();
            $this->load->view('Worker_view', $result);
        }
    }

    public function Patient_info() {
        $this->load->model('login_model');
        $result['patient'] = $this->login_model->Patient_info_m();
        $this->load->view('Patient_info', $result);
    }

    public function Worker_info() {
        $result['worker'] = $this->login_model->Worker_info_m();
        $this->load->view('Worker_info', $result);
    }
    
      public function Nurse_info() {
        $result['worker'] = $this->login_model->Worker_info_N();
        $this->load->view('Nurse_info', $result);
    }

    public function AddPatient_show() {
        $this->load->view('AddPatient_view');
    }

    public function AddWorker_show() {
        $this->load->view('AddWorker_view');
    }

    public function Generate_haslo($chars_min = 8, $chars_max = 10, $use_upper_case = true, $include_numbers = true, $include_special_chars = false) {
        $length = rand($chars_min, $chars_max);
        $selection = 'aeuoyibcdfghjklmnpqrstvwxz';
        if ($include_numbers) {
            $selection .= "1234567890";
        }
        if ($include_special_chars) {
            $selection .= "!@#$%&";
        }
        $password = "";
        for ($i = 0; $i < $length; $i++) {
            $current_letter = $use_upper_case ? (rand(0, 1) ? strtoupper($selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))];
            $password .= $current_letter;
        }
        return $password;
    }

    public function AddPatient() {
        $gen_password = $this->Generate_haslo();
        $db = $this->input->post('ok');
        if (isset($db)) {
            $this->load->library('form_validation');
            if ($this->form_validation->run('val_pattientadd') === FALSE) {
                $this->load->view('AddPatient_view');
            } else {
                $this->load->model('login_model');
                $this->login_model->Patientadd_m($gen_password);
                $to_add = $this->input->post('pesel');
                $this->NewUser_id($to_add);
            }
        }
    }

    public function NewUser_id($to_add) {
        $this->load->model('login_model');
        $newid['id'] = $this->login_model->NewUserid_m($to_add);
        foreach ($newid['id'] as $d):
            $a = $d->idUser;
        endforeach;
        echo $a;
        $this->ConnectUser($a);
    }

    public function ConnectUser($a) {
        $this->load->model('login_model');


        $this->login_model->ConnectUser_m($a);
        redirect('System_controller/Patient_show');
    }

    public function Calendar_show() {
        $this->session->unset_userdata('user_loged_h');
        $this->load->view('Calendar_view', array());
        $idUserH = $this->input->post('harmo');

        $userloged = array(
            'user_loged_h' => $idUserH
        );
        $this->session->set_userdata($userloged);
    }

    public function Calendar_show2() {
        $this->load->view('Calendar_view', array());
    }

    public function get_events() {
        $this->load->model('login_model');
        // Our Start and End Dates
        $start = $this->input->get("start");
        $end = $this->input->get("end");



        $startdt = new DateTime('now'); // setup a local datetime
        $startdt->setTimestamp($start); // Set the date based on timestamp
        $start_format = $startdt->format('Y-m-d H:i:s');

        $enddt = new DateTime('now'); // setup a local datetime
        $enddt->setTimestamp($end); // Set the date based on timestamp
        $end_format = $enddt->format('Y-m-d H:i:s');

        $events = $this->login_model->get_events($start_format, $end_format);

        $data_events = array();

        foreach ($events->result() as $r) {

            $data_events[] = array(
                "id" => $r->ID,
                "title" => $r->title,
                "description" => $r->description,
                "end" => $r->end,
                "start" => $r->start,
                "time" => $r->CzasPodania
            );
        }

        echo json_encode(array("events" => $data_events));
        echo exit();
    }

    public function add_event() {
        $this->load->model('login_model');
        /* Our calendar data */
        $name = $this->input->post("name");
        $desc = $this->input->post("description");
        $start_date = $this->input->post("start_date");
        $end_date = $this->input->post("end_date");
        $time = $this->input->post('time');




        $this->login_model->add_event(array(
            "title" => $name,
            "description" => $desc,
            "start" => $start_date,
            "end" => $end_date,
            "CzasPodania" => $time,
            "IDUser" => $this->session->userdata('user_loged_h')
                )
        );

        redirect("System_controller/Calendar_show2");
    }

    public function edit_event() {
        //$this->load->model('login_model');
        $eventid = intval($this->input->post("eventid"));
        $event = $this->login_model->get_event($eventid);
        if ($event->num_rows() == 0) {
            echo"Invalid Event";
            exit();
        }

        $event->row();

        /* Our calendar data */
        $name = $this->input->post("name");
        $desc = $this->input->post("description");
        $start_date = $this->input->post("start_date");
        $end_date = $this->input->post("end_date");
        $delete = $this->input->post("delete");
        $time = $this->input->post('time');

        if (!$delete) {
            $this->login_model->update_event($eventid, array(
                "title" => $name,
                "description" => $desc,
                "start" => $start_date,
                "end" => $end_date,
                "CzasPodania" => $time
                    )
            );
        } else {
            $this->login_model->delete_event($eventid);
        }

        redirect("System_controller/Calendar_show2");
    }

    public function Przywroc_confirm_u() {
        $id = $this->input->post('przywroc_u');
        $id_u = $this->login_model->Przywroc_patient($id);
        if ($id_u == true) {
            redirect('System_controller/Patient_show', 'refresh');
        } else {
            show_404();
        }
    }

    public function Przywroc_confirm_w() {
        $id = $this->input->post('przywroc_w');
        $id_w = $this->login_model->Przywroc_worker($id);
        if ($id_w == true) {
            redirect('System_controller/Worker_show', 'refresh');
        } else {
            show_404();
        }
    }
    
      public function Przywroc_confirm_N() {
        $id = $this->input->post('przywroc_w');
        $id_w = $this->login_model->Przywroc_workerN($id);
        if ($id_w == true) {
            redirect('System_controller/Worker_show', 'refresh');
        } else {
            show_404();
        }
    }

    public function Patient_Worker() {
        if (($this->session->userdata('user_loged') === TRUE)) {

            $d['test'] = $this->login_model->GetDataConnect();
            $d['list'] = $this->login_model->AllID_list();
            $d['list2'] = $this->login_model->getA();
            $d['list3'] = $this->login_model->ID_L();
            $d['list4'] = $this->login_model->IDNurse();
            $this->load->view('Patient_Worker_view', $d);
        } else {
            redirect("login_controller/Login_show");
        }
    }

    public function Connect_con() {
        $id = $this->input->post('conn');
       $conn = $this->login_model->Connect_res($id);
        if ($conn == true) {
            redirect('System_controller/Patient_Worker', 'refresh');
        } else {
            show_404();
        }
    }


  

    public function Delete_Connect() {
        $id = $this->input->post('delete');
         $conn = $this->login_model->Delete_res($id);
         if ($conn == true) {
            redirect('System_controller/Patient_Worker', 'refresh');
        } else {
            show_404();
        }
   
    }

  

    public function AddLPP() {
        $idU = $this->input->post('iduser');
        $idL = $this->input->post('idlekarz');
        $idN = $this->input->post('idnurse');

        if ($idN == 'nd') {
            $idN = 0;
            $check['d'] = $this->login_model->checkLP($idU, $idL, $idN);
            if ($check['d']->num_rows() == 1) {
                $this->login_model->UpdateConnect_LPP($idU, $idL);
            } else {
                $this->login_model->AddConnect_LPP($idU, $idL, $idN);
            }

            redirect('System_controller/Patient_Worker');
        } else {
            $check['d'] = $this->login_model->checkLPP($idU, $idL, $idN);
            if ($check['d']->num_rows() == 1) {
                $this->session->set_flashdata('message', 'Takie połączenie już istnieje. Sprawdź jego aktywność');
            } else {
                $this->login_model->UpdateConnect_LPP($idU, $idL);
                // $this->login_model->AddConnect_LPP($idU, $idL, $idN);
            }
            redirect('System_controller/Patient_Worker');
        }
    }

    public function AddConnectLP() {
        $idU = $this->input->post('iduser');
        $idL = $this->input->post('idlekarz');
        $idN = $this->input->post('idnurse');

        if ($idN == 'nd') {
            $idN = null;
        } else {
            $check['d'] = $this->login_model->checkLP($idU, $idL, $idN);
            if ($check['d']->num_rows() == 1) {
                $this->session->set_flashdata('message', 'Takie połączenie już istnieje. Sprawdź jego aktywność');
            } else {
                $this->login_model->AddConnect_LP($idU, $idL, $idN);
            }
            redirect('System_controller/Patient_Worker');
        }
    }

    public function AddConnectPP() {
        $idU = $this->input->post('iduser');
        $idN = $this->input->post('idnurse');

        $check['d'] = $this->login_model->checkPP($idU, $idN);
        if ($check['d']->num_rows() == 1) {
            $this->session->set_flashdata('message', 'Takie połączenie już istnieje. Sprawdź jego aktywność');
        } else {
            echo"NOPE";
            //$this->login_model->AddConnect_PP($idU, $idN);
        }
        redirect('System_controller/Patient_Worker');
    }

}
