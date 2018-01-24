<?php

/**
 * Plik z webservicem dla aplikacji
 * harmonogramu usera na androida
 */
class Android extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Rejestracja u�ytkownika
     */
    public function register()
    {
        $this->load->helper('url');

        $email = $this->input->post('email');
        $haslo = $this->input->post('haslo');
        $imie = $this->input->post('imie');
        $nazwisko = $this->input->post('nazwisko');
        $pesel = $this->input->post('pesel');
        $adres = $this->input->post('adres');

        // Selectowanie emaila w celu sprawdzenia czy taki jest juz w DB
        $this->db->select('emailUser');
        $this->db->where('emailUser', $email);
        $query = $this->db->get('usermsfe');

        if ($query->num_rows() == 1) {
            echo "Ten email juz istnieje";
        } else {

            // Sprawdzenie peselu czy istnieje w DB
            $this->db->select('PESELUser');
            $this->db->where('PESELUser', $pesel);
            $query = $this->db->get('usermsfe');
            if ($query->num_rows() == 1) {
                echo "Taki pesel juz istnieje";
            } else {
            
                $this->db->reset_query();

                // hashowanie hasla
                $hashedPassword = password_hash($haslo, PASSWORD_DEFAULT);

                // array z danymi ktore beda dodane do bazy danych
                $user = array(
                    'emailUser' => $email,
                    'hasloUser' => $hashedPassword,
                    'imieUser' => $imie,
                    'nazwiskoUser' => $nazwisko,
                    'PESELUser' => $pesel,
                    'MiastoUser' => $adres,
                    'telefonUser' =>'123333333',
                    'UlicaUser' => 'FAJNE',
                    'NrmUser' =>'12', 
                    
                );

                // dodanie rekordu do bazy danych
                if ($this->db->insert('usermsfe', $user) === true) {
                    // select id nowo utworzonego rekordu
                    $insertID = $this->db->insert_id();

                    // pokazanie id uzytkownika
                    echo $insertID;
                } else {
                    echo "Cos poszlo nie tak";
                }
            }
        }
    }

    /**
     * Pobieranie harmonogramu u�ytkownika
     * z bazy danych wystawionego przez lekarza
     */
    public function getHarmonogram()
    {
        $this->load->helper('url');

        $userID = $this->input->post('userID');

        $clickedDate = $this->input->post('clickedDate');

        // select harmonogramu usera
        $this->db->select('ID');
        $this->db->where('IDUser', $userID);
        $query = $this->db->get('calendar_events');

        if ($query->num_rows() != 1) {
            echo "Brak harmonogramu";
            // log something here
        } else {
            $this->db->reset_query();

            // select lekow ktore sa powinny zostac pobrane odpowiedniego dnia
            // ktory wskazuje zmienna clickedDate
            $this->db->select('CzasPodania, title');
            $this->db->from('calendar_events');
            $this->db->where('IDUser', $userID);
            $this->db->where('Start <=', $clickedDate);
            $this->db->where('End >=', $clickedDate);
            $this->db->order_by('CzasPodania', 'ASC');
            $this->db->order_by('title', 'ASC');
            $query = $this->db->get();

            if ($query->num_rows() == 0) {
                echo "Brak harmonogramu";
            } else {
                // wyswietlenie lekow oraz godziny ich pobrania
                foreach ($query->result() as $row) {
                    echo $row->CzasPodania . ":".
                        $row->title . ",";
                }
            }
        }
    }

    /**
     * Logowanie u�ytkownika
     */
    public function login()
    {
        $this->load->helper('url');

        $email = $this->input->post('email');

        $haslo = $this->input->post('haslo');

        $this->db->select('idUser, hasloUser');
        $this->db->from('usermsfe');
        $this->db->where('emailUser', $email);
        $query = $this->db->get();

        if ($query->num_rows() != 1) {
            echo "Zly email";
        } else {
            $row = $query->row();

            if (password_verify($haslo, $row->hasloUser)) {
                echo $row->idUser;
            } else {
                echo "Zly haslo";
            }
        }
    }
}

