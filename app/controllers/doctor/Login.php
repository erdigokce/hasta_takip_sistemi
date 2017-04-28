<?php
/**
 * Login Controller Page
 */
class Login extends CI_Controller {

  private $page_controller = 'login';

  function __construct() {
    parent::__construct();
    $this->load->database('syscore');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->library('htsutils'); // logging
    $this->load->model('syscore/user');
    $this->load->model('syscore/userlogs');
    $this->load->model('live/parameters');
  }

  public function index() {
    $this->lang->load(array('navbar',$this->page_controller), $this->session->langauge);
    $this->htsutils->loadNavbarLang($this, $data);
    $data['title'] = $this->lang->line('login_title');
    $data['page_controller'] = $this->page_controller;
    $this->populatePageData($data);
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
    // $this->session->sess_destroy();
    $this->session->unset_userdata($this->wipeArrayOfUserSessionData());
    $this->session->auth = FALSE;
    redirect($this->page_controller, 'refresh');
  }

  /** PRIVATE FUNCTIONS **/

  private function loadLogin(&$data) {
    $this->load->view("templates/content_top", $data);
    $this->load->view("templates/header", $data);
    $this->load->view("doctor/login"); // MAIN LOGIN VIEW
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
      // 'langauge'
    );
  }

  private function generateSession(&$data) {
    $this->form_validation->set_rules('username', $this->lang->line('login_username'), 'required');
    $this->form_validation->set_rules('password', $this->lang->line('login_password'), 'required');
    $data['name'] = "";
    $data['surname'] = "";
    $data['auth'] = FALSE;
    if ($this->form_validation->run() === FALSE) { // Form validation level
      $this->loadLogin($data);
    } else {
      $row = $this->user->getUser($this->input->post('username'));
      $isUserOnline = $this->isUserOnline($row);
      $isUserTimedOut = $this->isUserTimedOut($row);
      if ($isUserOnline === "TRUE" && $isUserTimedOut === "FALSE") {
        $this->loadLogin($data);
      } else {
        $this->tryLogin($row);
      }
    }
  }

  private function resumeSession(&$data) {
    $data['name'] = $this->session->name;
    $data['surname'] = $this->session->surname;
    redirect('dashboard', 'refresh');
  }

  private function isUserOnline(&$row) {
    $userLog = $this->userlogs->getUserLog($row->ID);
    if($userLog->DATE_LAST_LOGOUT < $userLog->DATE_LAST_LOGIN) {
      return "TRUE";
    }
    return "FALSE";
  }

  private function isUserTimedOut(&$row) {
    $userLog = $this->userlogs->getUserLog($row->ID);
    if($this->htsutils->isSetAndNotEmpty($userLog)){
      $time = new DateTime($userLog->DATE_LAST_LOGIN);
      $time2 = new DateTime(date($this->htsutils->getDefaultTimeFormat()));
    } else {
      $this->htsutils->log_error("Kullanıcı loglarına ulaşılamadı! [Kullanıcı ID : ".$row->ID."], [Nesne : ".$userLog."]");
    }
    $diff = abs($time2->getTimestamp() - $time->getTimestamp());
    $timoutInSeconds = (int) $this->parameters->findParameterValue("HTS_PARAMS", "HTS_SESSION", "USER_SESSION_TIMEOUT")->PARAMETER_VALUE;
    if ($this->htsutils->isSetAndNotEmpty($timoutInSeconds)) {
      $timoutInTimestamp = $timoutInSeconds;
      if($diff >= $timoutInTimestamp){
        return "TRUE";
      }
    } else {
      $this->htsutils->log_error("Parametre tablosunda timeout bilgisine ulaşılamadı! [Nesne : ".$timoutInSeconds."]");
    }
    return "FALSE";
  }

  private function tryLogin(&$row) {
    if (isset($row) && $row->PASSWORD === md5($this->input->post('password'))) {
      $session_data = $this->giveArrayOfUserSessionData($row);
      $this->session->set_userdata($session_data);
      $data['name'] = $row->NAME;
      $data['surname'] = $row->SURNAME;
      $data['auth'] = $this->session->auth;
      $this->userlogs->setUserLoginLog($row->ID);
      redirect('dashboard', 'refresh');
    } else {
      $this->session->auth = FALSE;
      $data['auth'] = $this->session->auth;
      $this->htsutils->log_error("Login işlemi başarısız oldu! Kullanıcı adı, e-posta veya parola geçersiz!");
      $this->loadLogin($data);
    }
  }

  private function populatePageData(&$data) {
    $data['login_username'] = $this->lang->line('login_username');
    $data['login_password'] = $this->lang->line('login_password');
    $data['login_submit'] = $this->lang->line('login_submit');
    $data['login_reset'] = $this->lang->line('login_reset');
    $data['login_lost_password'] = $this->lang->line('login_lost_password');
  }
}
