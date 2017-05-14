<?php
/**
 * Login Controller Page
 */
class Login extends HTS_Controller {

  function __construct() {
    parent::__construct('login');
    $this->load->helper('form');
    $this->load->library(array('form_validation'));
    $this->load->model(array('syscore/user','syscore/userlogs','live/parameters'));
  }

  public function index($status = 'normal') {
    $this->lang->load(array($this->getPage()), $this->session->langauge);
    loadNavbarLang($this, $data);
    if ($status === 'session_expire') {
      $data['status'] = $status;
      $data['err_session_expire'] = $this->lang->line('err_session_expire');
    }
    $data['title'] = $this->lang->line('login_title');
    $data['page_controller'] = $this->getPage();
    $data['footer_text'] = $this->lang->line('footer_text');
    $this->populatePageLangData($data);
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
    redirect($this->getPage(), 'refresh');
  }

  /** PRIVATE FUNCTIONS **/

  private function loadLogin(&$data) {
    $this->load->view("templates/content_top", $data);
    $this->load->view("templates/header", $data);
    $this->load->view("doctor/login", $data); // MAIN LOGIN VIEW
    $this->load->view("templates/footer", $data);
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
    $this->initData($data);
    if ($this->form_validation->run('signin') === FALSE) { // Form validation level
      $this->loadLogin($data);
    } else {
      $row = $this->user->getUser($this->input->post('username'));
      if(isSetAndNotEmpty($row)) {
        $isUserOnline = $this->isUserOnline($row);
        $isUserTimedOut = $this->isUserTimedOut($row);
      } else {
        $isUserOnline = "FALSE";
        $isUserTimedOut = "FALSE";
        $data['auth_fail'] = TRUE;
      }
      if ($isUserOnline === "TRUE" && $isUserTimedOut === "FALSE") {
        $data['is_user_online'] = TRUE;
        $this->loadLogin($data);
      }
      elseif (isset($data['auth_fail']) && $data['auth_fail'] === TRUE) {
        $this->loadLogin($data);
      } else {
        $this->tryLogin($row);
      }
    }
  }

  private function initData(&$data) {
    $data['name'] = "";
    $data['surname'] = "";
    $data['user_category'] = "";
    $data['auth'] = FALSE;
    $data['is_user_online'] = FALSE;
  }

  private function resumeSession(&$data) {
    $data['name'] = $this->session->name;
    $data['surname'] = $this->session->surname;
    redirect('dashboard', 'refresh');
  }

  /**
   * Kayıtlı kullanıcının etki̇n bi̇r oturumunun olup olmadiğini döndürür.
   * @param  UserLogs  $row     Kullanıcının giriş çıkış loglarının tutulduğu tablo satırı.
   * @return String             Online ise "TRUE"
   */
  private function isUserOnline(&$row) {
    $userLog = $this->userlogs->getUserLog($row->ID);
    if(!isSetAndNotEmpty($userLog)) {
      $this->userlogs->createUserLog($row->ID);
    }
    elseif($userLog->DATE_LAST_LOGOUT < $userLog->DATE_LAST_LOGIN) {
      return "TRUE";
    }
    return "FALSE";
  }

  /**
   * Kayıtlı kullanıcının otrumunun zaman aşımına uğrayıp uğramadığını döndürür.
   * @param  UserLogs  $row     Kullanıcının giriş çıkış loglarının tutulduğu tablo satırı.
   * @return String             Zaman aşımı ise "TRUE"
   */
  private function isUserTimedOut(&$row) {
    $userLog = $this->userlogs->getUserLog($row->ID);
    if(isSetAndNotEmpty($userLog)){
      $time = new DateTime($userLog->DATE_LAST_LOGIN);
      $time2 = new DateTime(date(getDefaultTimeFormat()));
    } else {
      log_error("Kullanıcı loglarına ulaşılamadı! [Kullanıcı ID : ".$row->ID."], [Nesne : ".$userLog."]");
    }
    $diff = abs($time2->getTimestamp() - $time->getTimestamp());
    $timoutInSeconds = (int) $this->parameters->findParameterValue("HTS_PARAMS", "HTS_SESSION", "USER_SESSION_TIMEOUT")->PARAMETER_VALUE;
    if (isSetAndNotEmpty($timoutInSeconds)) {
      $timoutInTimestamp = $timoutInSeconds;
      if($diff >= $timoutInTimestamp){
        return "TRUE";
      }
    } else {
      log_error("Parametre tablosunda timeout bilgisine ulaşılamadı! [Nesne : ".$timoutInSeconds."]");
    }
    return "FALSE";
  }

  private function tryLogin(&$row) {
    if (isset($row) && $row->PASSWORD === md5($this->input->post('password'))) {
      $session_data = $this->giveArrayOfUserSessionData($row);
      $this->session->set_userdata($session_data);
      $data['name'] = $row->NAME;
      $data['surname'] = $row->SURNAME;
      $data['user_category'] = $row->USER_CATEGORY;
      $data['auth'] = $this->session->auth;
      $this->userlogs->setUserLoginLog($row->ID);
      redirect('dashboard', 'refresh');
    } else {
      $this->session->auth = FALSE;
      $data['auth'] = $this->session->auth;
      log_error("Login işlemi başarısız oldu! Kullanıcı adı, e-posta veya parola geçersiz!");
      $this->loadLogin($data);
    }
  }

  private function populatePageLangData(&$data) {
    $data['login_username'] = $this->lang->line('login_username');
    $data['login_password'] = $this->lang->line('login_password');
    $data['login_submit'] = $this->lang->line('login_submit');
    $data['login_reset'] = $this->lang->line('login_reset');
    $data['login_lost_password'] = $this->lang->line('login_lost_password');
    $data['err_user_online'] = $this->lang->line('err_user_online');
    $data['err_auth_fail'] = $this->lang->line('err_auth_fail');
  }
}
