<?php

class login_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }

    /**
     * Metoda do hashowania hasla
     * @param string $password
     * @return string
     */
    private function hashPassword($password) {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        return $hash;
    }

    /* function login() {
      $password = $this->input->post('password');
      $hashpassword = $this->hashPassword($password);
      $zalogowany = $this->input->post('email');
      $this->db->select('*');
      $this->db->from('lekarzmsfe');
      $this->db->where(array('loginLekarz' => $zalogowany, 'hasloLekarz' => $hashpassword));
      $query = $this->db->get();
      $user = $query->result();
      return $user ? TRUE : FALSE;
      }
     * 
     */

    function login_m() {
        $user = $user = $this->input->post('email');
        $this->db->select('*');
        $this->db->from('lekarzmsfe');
        $this->db->where("loginLekarz", $user);
        $query = $this->db->get();

        return $query;
    }

    function login() {
        $password = $this->input->post('password');
        // $hashpassword = $this->hashPassword($password);
        $zalogowany = $this->input->post('email');
        $this->db->select('*');
        $this->db->from('lekarzmsfe');
        $this->db->where(array('loginLekarz' => $zalogowany));
        $query = $this->db->get();
        $row = $query->row();

        if (!password_verify($password, $row->hasloLekarz)) {
            $d = 'nok';
            return $d;
        } else {
            $d2 = 'ok';
            return $d2;
        }
    }

    /* public function register() {
      // pobieranie hasla
      $password = $this->input->post('pwd');
      $hash = password_hash($password, PASSWORD_BCRYPT);
      // array do insertowania do bazy danych
      $lekarz = array(
      'imieLekarz' => $this->input->post('imie'),
      'nazwiskoLekarz' => $this->input->post('nazwisko'),
      'loginLekarz' => $this->input->post('login'),
      'hasloLekarz' => $hash,
      'pesel' => $this->input->post('pesel'),
      'miejscepracyLekarz' => $this->input->post('miejscePracy'),
      'telefonLekarza' => $this->input->post('telefon')
      );
      // performing insert
      $this->db->insert('lekarzmsfe', $lekarz);
      }
     * 
     */

    public function register() {
        // pobieranie hasla
        $password = $this->input->post('pwd');
        $hashedPassword = $this->hashPassword($password);
        // array do insertowania do bazy danych
        $lekarz = array(
            'imieLekarz' => $this->input->post('imie'),
            'nazwiskoLekarz' => $this->input->post('nazwisko'),
            'loginLekarz' => $this->input->post('login'),
            'hasloLekarz' => $hashedPassword,
            'miejscepracyLekarz' => $this->input->post('miejscePracy'),
            'pesel' => $this->input->post('pesel'),
            'telefonLekarza' => $this->input->post('telefon')
        );
        // performing insert
        $this->db->insert('lekarzmsfe', $lekarz);
    }

    public function patientshow() {
        $id = $this->session->userdata('id_loged');
        $this->db->select('d.idUser, d.imieUser, d.nazwiskoUser, d.PESELUser');
        $this->db->from('usermsfe as d, userconnect as p ');
        $this->db->where('d.idUser = p.idUser');
        $this->db->where(array('p.idLekarz' => $id,
            'd.isActiveUser' => 1));
        $query = $this->db->get();
        $de = $query->result();
        return $de;
    }

    public function Deletedpatient($id_delete) {

        $this->db->where(array('idUser' => $id_delete));
        $d = $this->db->delete('userconnect');

        $this->db->where(array('idUser' => $id_delete));
        $this->db->set(array('isActiveUser' => 0));
        $up = $this->db->update('usermsfe');

        $res = array('update' => $up,
            'delete' => $d);
        return $res;
    }

    public function Search_P() {
        $this->db->select('*');
        $this->db->from('usermsfe');
        $this->db->where(array('PESELUser' => $this->input->post('szukaj'),
            'isActiveUser' => 1));
        $query = $this->db->get();
        $de = $query->result();
        return $de;
    }

    public function Patient_info_m() {
        $this->db->select('*');
        $this->db->from('usermsfe');
        $this->db->where(array('idUser' => $this->input->post('info')));
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function Patientadd_m($gen_password) {
        $hashedPassword = $this->hashPassword($gen_password);
        $patinet = array(
            'imieUser' => $this->input->post('imie'),
            'nazwiskoUser' => $this->input->post('nazwisko'),
            'emailUser' => $this->input->post('login'),
            'hasloUser' => $hashedPassword,
            'adresUser' => $this->input->post('adres'),
            'PESELUser' => $this->input->post('pesel'),
            'telefonUser' => $this->input->post('telefon')
        );
        $this->db->insert('usermsfe', $patinet);
    }

    public function NewUserid_m($to_add) {
        $this->db->select('idUser');
        $this->db->from('usermsfe');
        $this->db->where(array('PESELUser' => $to_add));
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function ConnectUser_m($newid) {
        $patientconnect = array(
            'idUser' => $newid,
            'idLekarz' => $this->session->userdata('id_loged')
        );
        $this->db->insert('userconnect', $patientconnect);
    }

    public function get_events($start, $end) {

        return $this->db->where(array('IDUser' => $this->session->userdata('user_loged_h')))->get("calendar_events");
    }

    public function add_event($data) {
        $this->db->insert("calendar_events", $data);
    }

    public function get_event($id) {
        return $this->db->where("ID", $id)->get("calendar_events");
    }

    public function update_event($id, $data) {
        $this->db->where("ID", $id)->update("calendar_events", $data);
    }

    public function delete_event($id) {
        $this->db->where("ID", $id)->delete("calendar_events");
    }

}
