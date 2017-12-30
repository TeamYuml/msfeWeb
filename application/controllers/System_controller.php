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
    }

    public function Patient_list() {
        $this->load->model('login_model');
        $result['list'] = $this->login_model->patientshow();
        return $result['list'];
    }

    public function Patient_show() {
        $d['patient'] = $this->Patient_list();
        $this->load->view('Loged_view', $d);
    }

    public function Delete_Confirm() {

        $id['delete'] = $this->input->post('delete');
        $this->load->view('DeleteConfirm_view', $id);
    }

    public function Delete() {

        $id_delete = $this->input->get('A');
        $this->load->model('login_model');
        $deleted = $this->login_model->Deletedpatient($id_delete);
        if ($deleted == true) {
            redirect('System_controller/Patient_show', 'refresh');
        } else {
            show_404();
        }
    }

    public function SearchP() {
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if ($this->form_validation->run('search') === FALSE) {
            $msg_val['msg'] = 'Nie ma takiego pacjenta';
            $this->load->view('Loged_view', $msg_val);
        } else {
            $this->load->model('login_model');
            $result['patient'] = $this->login_model->Search_P();
            $this->load->view('Loged_view', $result);
        }
    }

    public function Patient_info() {
        $this->load->model('login_model');
        $result['patient'] = $this->login_model->Patient_info_m();
        $this->load->view('Patient_info', $result);
    }

    public function AddPatient_show() {
        $this->load->view('AddPatient_view');
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

}
