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

    public function registerNurse() {
        // pobieranie hasla
        $password = $this->input->post('pwd');
        $hashedPassword = $this->hashPassword($password);
        // array do insertowania do bazy danych
        $nurse = array(
            'imieP' => $this->input->post('imie'),
            'nazwiskoP' => $this->input->post('nazwisko'),
            'email' => $this->input->post('login'),
            'hasloP' => $hashedPassword,
            'miejscepracy' => $this->input->post('miejscePracy'),
            'pesel' => $this->input->post('pesel'),
            'telefon' => $this->input->post('telefon')
        );
        // performing insert
        $this->db->insert('pielegniarkamsfe', $nurse);
    }

    public function patientshow() {
        $id = $this->session->userdata('id_loged');
        $this->db->select('d.idUser, d.imieUser, d.nazwiskoUser, d.PESELUser, d.isActiveUser');
        $this->db->from('usermsfe as d, userconnect as p ');
        $this->db->where('d.idUser = p.idUser_C');
        $this->db->where(array('p.idLekarz_C' => $id,
            'd.isActiveUser' => 1));
        $query = $this->db->get();
        $de = $query->result();
        return $de;
    }

    public function patientshow_a() {
        $this->db->select('*');
        $this->db->from('usermsfe');
        $query = $this->db->get();
        $de = $query->result();
        return $de;
    }

    public function workershow() {
        $this->db->select('*');
        $this->db->from('lekarzmsfe');
        $query = $this->db->get();
        $de = $query->result();
        return $de;
    }

    public function workerNshow() {
        $this->db->select('*')->from('pielegniarkamsfe');
        $query = $this->db->get();
        $de = $query->result();
        return $de;
    }

    public function Deletedpatient($id_delete) {

        $this->db->where(array('idUser_C' => $id_delete));
        $this->db->set(array('isActive' => 0));
        $d = $this->db->update('userconnect');

        $this->db->where(array('idUser' => $id_delete));
        $this->db->set(array('isActiveUser' => 0));
        $up = $this->db->update('usermsfe');

        $res = array('update' => $up,
            'delete' => $d);
        return $res;
    }

    public function Deletedworker($id_delete) {

        $this->db->where(array('idLekarz_C' => $id_delete));
        $d = $this->db->delete('userconnect');

        $this->db->where(array('idLekarz' => $id_delete));
        $this->db->set(array('isActiveLekarz' => 0));
        $up = $this->db->update('lekarzmsfe');

        $res = array('update' => $up,
            'delete' => $d);
        return $res;
    }
    
      public function DeletedworkerN($id_delete) {

        $this->db->where(array('idP_C' => $id_delete));
        $d = $this->db->delete('userconnect');

        $this->db->where(array('idP' => $id_delete));
        $this->db->set(array('isActive' => 0));
        $up = $this->db->update('pielegniarkamsfe');

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

    public function Search_U() {
        $this->db->select('*');
        $this->db->from('usermsfe');
        $this->db->where(array('PESELUser' => $this->input->post('szukaj')));
        $query = $this->db->get();
        $de = $query->result();
        return $de;
    }

    public function Search_W() {
        $this->db->select('*');
        $this->db->from('lekarzmsfe');
        $this->db->where(array('pesel' => $this->input->post('szukaj')));
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

    public function Worker_info_m() {
        $this->db->select('*');
        $this->db->from('lekarzmsfe');
        $this->db->where(array('idLekarz' => $this->input->post('info')));
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
     public function Worker_info_N() {
        $this->db->select('*');
        $this->db->from('pielegniarkamsfe');
        $this->db->where(array('idP' => $this->input->post('info')));
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
            'miastoUser' => $this->input->post('miasto'),
            'ulicaUser' => $this->input->post('ulica'),
            'NrmUser' => $this->input->post('nrm'),
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
            'idUser_C' => $newid,
            'idLekarz_C' => $this->session->userdata('id_loged')
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

    public function Przywroc_worker($id) {
        $this->db->where(array('idLekarz' => $id));
        $this->db->set(array('isActiveLekarz' => 1));
        $up = $this->db->update('lekarzmsfe');

        $res = array('update' => $up);
        return $res;
    }
    
        public function Przywroc_workerN($id) {
        $this->db->where(array('idP' => $id));
        $this->db->set(array('isActive' => 1));
        $up = $this->db->update('pielegniarkamsfe');

        $res = array('update' => $up);
        return $res;
    }

    public function Przywroc_patient($id) {
        $this->db->where(array('idUser' => $id));
        $this->db->set(array('isActiveUser' => 1));
        $up = $this->db->update('usermsfe');

        $res = array('update' => $up);
        return $res;
    }

    public function AllID_list() {


        $this->db->select('idUser,peselUser,nazwiskoUser');
        $this->db->from('usermsfe');
        $this->db->where(['isActiveUser' => 1]);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    public function ID_L() {
        $this->db->select('idLekarz, imieLekarz,nazwiskoLekarz');
        $this->db->from('lekarzmsfe');
        $this->db->where(['isActiveLekarz' => 1]);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    public function IDNurse() {
        $this->db->select('idP, imieP,nazwiskoP');
        $this->db->from('pielegniarkamsfe');
        $this->db->where(['isActive' => 1]);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    public function getA() {
        $this->db->select('*');
        $this->db->from('userconnect');
        $query3 = $this->db->get();
        $r3 = $query3->result();
        return $r3;
    }

    public function Connect_res($id) {

        $this->db->where(array('ID_U' => $id));
        $this->db->set(array('isActive' => 1));
        $up = $this->db->update('userconnect');
        $res = array('update' => $up);
        return $res;
    }

    public function Delete_res($id) {

        $this->db->where(array('ID_U' => $id));
        $this->db->set(array('isActive' => 0));
        $up = $this->db->update('userconnect');
        $res = array('update' => $up);
        return $res;
    }

    public function AddConnect_LPP($idU, $idL, $idN) {
        $add = array(
            'idUser_C' => $idU,
            'idLekarz_C' => $idL,
            'idP_C' => $idN
        );
        $this->db->insert('userconnect', $add);
    }

    public function UpdateConnect_LPP($idU, $idL) {

        $this->db->where(['idUser_C' => $idU,
            'idLekarz_C' => $idL]);
        $this->db->set(['idP_C' => $this->input->post('idnurse')]);
        $this->db->update('userconnect');
    }

    public function checkLP($idU, $idL,$idN) {
        $this->db->select('*');
        $this->db->from('userconnect');
        $this->db->where(['idUser_C' => $idU,
            'idLekarz_C' => $idL,
                'idP_C' => $idN]);
        $query = $this->db->get();
        return $query;
    }

    public function checkLPP($idU, $idL, $idN) {
        $this->db->select('*');
        $this->db->from('userconnect');
        $this->db->where(['idUser_C' => $idU,
            'idLekarz_C' => $idL,
            'idP_C' => $idN]);
        $query = $this->db->get();
        return $query;
    }

    public function checkPP($idU, $idN) {
        $this->db->select('*');
        $this->db->from('userconnect');
        $this->db->where(['idUser_C' => $idU,
            'idP_C' => $idN,
            'idLekarz_C' > 0]);
        $query = $this->db->get();
        return $query;
    }

    public function Nurseall() {
        $this->db->select('*')->from('pielegniarkamsfe')->where('isActive' == 1);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function GetDataConnect() {
        $this->db->select ('usermsfe.peselUser,usermsfe.nazwiskoUser, lekarzmsfe.imieLekarz, lekarzmsfe.nazwiskoLekarz,
                 userconnect.idUser_C,userconnect.idLekarz_C,userconnect.idP_C,
                 userconnect.isActive,userconnect.ID_U, pielegniarkamsfe.imieP, pielegniarkamsfe.nazwiskoP')
                ->from ('userconnect') 
                ->JOIN (' usermsfe','userconnect.idUser_C = usermsfe.idUser')
                ->JOIN ('lekarzmsfe','  userconnect.idLekarz_C = lekarzmsfe.idLekarz')
                ->JOIN ('pielegniarkamsfe', ' userconnect.idP_C = pielegniarkamsfe.idP','LEFT');             

        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

}
