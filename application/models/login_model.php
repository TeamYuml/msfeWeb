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

}
