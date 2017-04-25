<?php
/**
 * Login Controller Page
 */
class Login extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->database('syscore');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->model('syscore/user');
    $this->load->model('syscore/userlogs');
  }

  public function index() {
    $data['title'] = "Yetkilendirme ve Giriş Sistemi";

    if($this->session->has_userdata('auth') && $this->session->auth === TRUE){
      $this->resumeSession($data);
    } else {
      $this->generateSession($data);
    }

  }

  public function logout() {
    if(isset($this->session->user_id) && !empty($this->session->user_id)){
      $this->userlogs->setUserLogoutLog($this->session->user_id);
    }
    $this->session->sess_destroy();
    $this->session->unset_userdata($this->wipeArrayOfUserSessionData());
    $this->session->auth = FALSE;
    redirect('login', 'refresh');
  }

  /** PRIVATE FUNCTIONS **/

  private function loadLogin(&$data) {
    $this->load->view("templates/content_top", $data);
    $this->load->view("templates/header", $data);
    $this->load->view("doctor/login"); // MAIN LOGIN VIEW
    $this->load->view("templates/footer");
    $this->load->view("templates/content_bottom");
  }

  private function loadDashboard(&$data) {
    $this->load->view("templates/content_top", $data);
    $this->load->view("templates/header", $data);
    $this->load->view('doctor/dashboard');
    $this->load->view("templates/footer");
    $this->load->view("templates/content_bottom");
  }

  private function giveArrayOfUserSessionData(&$row) {
    return array(
      'auth' => TRUE ,
      'user_id' => $row->ID,
      'username' => $row->USERNAME,
      'user_email' => $row->USER_EMAIL,
      'user_category' => $row->USER_CATEGORY,
      'name' => $row->NAME,
      'surname' => $row->SURNAME
    );
  }

  private function wipeArrayOfUserSessionData() {
    return array(
      // 'auth',
      'user_id',
      'username',
      'user_email',
      'user_category',
      'name',
      'surname'
    );
  }

  private function generateSession(&$data) {
    $this->form_validation->set_rules('username', 'Kullanıcı Adı/Email', 'required');
    $this->form_validation->set_rules('password', 'Şifre', 'required');
    if ($this->form_validation->run() === FALSE) {
      $data['name'] = "";
      $data['surname'] = "";
      $data['auth'] = FALSE;
      $this->loadLogin($data);
    }
    else {
      $row = $this->user->getUser($this->input->post('username'));
      if (isset($row) && $row->PASSWORD === md5($this->input->post('password'))) {
        $session_data = $this->giveArrayOfUserSessionData($row);
        $this->session->set_userdata($session_data);
        $data['name'] = $row->NAME;
        $data['surname'] = $row->SURNAME;
        $data['auth'] = $this->session->auth;
        $this->userlogs->setUserLoginLog($row->ID);
        $this->loadDashboard($data);
      } else {
        $this->session->auth = FALSE;
        $data['auth'] = $this->session->auth;
        $this->loadLogin($data);
        // TODO: SHOW MESSAGE
      }
    }
  }

  private function resumeSession(&$data) {
    $data['name'] = $this->session->name;
    $data['surname'] = $this->session->surname;
    redirect('dashboard', 'refresh');
  }

}

 ?>
