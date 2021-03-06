<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {


    public function login_show() {
        if (($this->session->userdata('user_loged') === TRUE)) {
            redirect("System_controller/Patient_show");
        } else {

            $this->load->view('Login_view');
        }
    }

    public function Admin_show() {
        if (($this->session->userdata('user_loged') === TRUE)) {
            redirect("System_controller/Adminpanel_show");
        } else {

            $this->load->view('Adminpanel_view');
        }

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('Login_view');
    }

    public function login_show() {
        $this->load->view('Login_view');


    }

    public function login() {

        $password = $this->input->post('password');
        try {
            $this->load->model('login_model');
            $data['loginfor'] = $this->login_model->login_m();


            if ($data['loginfor']->num_rows() != 1)
                throw new UnexpectedValueException("Wrong user!");

            $row = $data['loginfor']->row();

            if (!password_verify($password, $row->hasloLekarz))
                throw new UnexpectedValueException("Invalid password!");

            $imie_nazwisko = $row->imieLekarz . ' ' . $row->nazwiskoLekarz;


            $imie_nazwisko = $row->imieLekarz . ' ' . $row->nazwiskoLekarz;

            $imie_nazwisko = $row->imieLekarz.' '.$row->nazwiskoLekarz;


            $user_data = array(
                'user_loged' => TRUE,
                'imie_nazwisko_loged' => $imie_nazwisko,
                'id_loged' => $row->idLekarz
            );

            $this->session->set_userdata($user_data);

            $specialid = 62;
            if ($specialid == $row->idLekarz) {
                redirect('System_controller/Patient_show');
            } else {
                redirect('System_controller/Patient_show');
            }


            redirect('System_controller/Patient_show');

        } catch (Exception $e) {
            echo $e->getMessage();
        }
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

    /**
     * Metoda do rejestracji uzytkownika
     */
    public function register_show() {
        $genpasswrod['gen'] = $this->Generate_haslo();
        $this->load->view('Register_view', $genpasswrod);
        echo form_error();
    }

    public function register() {
        $db = $this->input->post('regi');

        
        if($this->input->post('stanowisko') == 'Lekarz'){
            if (isset($db)){
                if($this->form_validation->run('register') === FALSE ) {


        if (isset($db)) {
            $this->load->library('form_validation');
            if ($this->form_validation->run('register') === FALSE) {

                $this->load->view('AddWorker_view');
            } else {
                $this->load->model('login_model');
                $result = $this->login_model->register();

               redirect('System_controller/Worker_show');
            }
        }
        }
        else{
            if (isset($db)){ 
                if($this->form_validation->run('register') === FALSE){
                $this->load->view('AddWorker_view');
            } else {
                $this->load->model('login_model');
                $result = $this->login_model->registerNurse();
               redirect('System_controller/Worker_show');
            }
        }
        }
    }

    public function Logout() {

                $this->load->view('AddWorker_view');
            }
        }
    }

    public function Logout() {


        if (isset($db)) {
            $this->load->library('form_validation');
            if ($this->form_validation->run('register') === FALSE) {
                $this->load->view('Register_view');
            } else {
                $this->load->model('login_model');
                $result = $this->login_model->register();
                echo $result;
            }
        }
    }
    
    public function Logout(){


        $this->session->unset_userdata('imie_nazwisko_loged');
        $this->session->unset_userdata('user_loged');
        $this->session->sess_destroy();
        $this->load->view('Login_view');
    }

}
