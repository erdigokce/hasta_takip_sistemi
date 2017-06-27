<?php

/**
 * LostPassword Controller Page
 */
class LostPassword extends HTS_Controller {

  function __construct() {
    parent::__construct('lostpassword');
    $this->load->helper('form');
    $this->load->library(array('form_validation'));
    $this->load->model(array('syscore/user','syscore/userlogs','live/parameters'));
  }

  public function index() {
    $this->lang->load(array($this->getPage()), $this->session->language);
    $data['auth'] = FALSE;
    $this->loadLostPassword($data);
  }

  public function resetPasswordRequest() {
    $this->lang->load(array($this->getPage()), $this->session->language);
    // Form validation level
    if ($this->form_validation->run('pw_reset_request') === FALSE) {
      $this->loadLostPassword($data);
    } else {
      $email = isSetAndNotEmpty($_REQUEST['saveMail']) ? $_REQUEST['saveMail'] : '';
      if($user = $this->user->getUser($email)) { // Continue if an user exists with this email
        // Create the unique user password reset key
        $resetKey = hash('sha512', HTS_504_BIT_WPA_KEY.$email);
        // Create a url which we will direct them to reset their password
        $passwordResetUrl = base_url().$this->getPage()."/welcomeRequest/".$resetKey."/".$user->USERNAME."/";
        // Mail them their key
        $data['lp_mail_body'] = $this->lang->line('lp_mail_body');
        $data['lp_mail_body'] = sprintf($data['lp_mail_body'], $user->NAME, $passwordResetUrl);
        $data['lp_mail_title'] = $this->lang->line('lp_mail_title');
        $attributes = 'From: no-reply@hastak.pe.hu' . "\r\n" .
                      'Content-Type: text/html; charset=UTF-8' . "\r\n";
        mail($email, $data['lp_mail_title'], $data['lp_mail_body'], $attributes);
        $data['email'] =  $user->USER_EMAIL;
        $data['lp_description'] = $this->lang->line('lp_description');
      }
      $this->loadLostPassword($data);
    }
  }

  public function welcomeRequest($key = null, $username = null) {
    $this->lang->load(array($this->getPage()), $this->session->language);
    $data['auth'] = FALSE;
    $data['reset_key'] = $key;
    $data['email'] = $this->user->getUser($username)->USER_EMAIL;
    $data['username'] = $username;
    $data['lp_new_password'] = $this->lang->line('lp_new_password');
    $data['lp_new_password_retry'] = $this->lang->line('lp_new_password_retry');
    $data['lp_new_password_send'] = $this->lang->line('lp_new_password_send');
    $this->loadLostPassword($data);
  }

  public function changePassword($reset_key = null, $username = null) {
    $this->lang->load(array($this->getPage()), $this->session->language);
    $data['lp_new_password'] = $this->lang->line('lp_new_password');
    $data['lp_new_password_retry'] = $this->lang->line('lp_new_password_retry');
    $data['lp_new_password_send'] = $this->lang->line('lp_new_password_send');
    if ($this->form_validation->run('new_password_request') === FALSE) {
      $data['reset_key'] = $reset_key;
      $data['email'] = $this->user->getUser($username)->USER_EMAIL;
      $data['username'] = $username;
      $this->loadLostPassword($data);
    } else {
      $newPassword = isSetAndNotEmpty($_REQUEST['newPassword']) ? $_REQUEST['newPassword'] : null;
      if (!isNullOrEmpty(get($newPassword)) && !isNullOrEmpty(get($username))) {
        $user = $this->user->getUser($username);
        $data['username'] = $user->USERNAME;
        $data['password'] = md5($newPassword);
        $data['user_category'] = $user->USER_CATEGORY;
        $data['user_email'] = $user->USER_EMAIL;
        $this->user->updateUser($user->ID, $data);
      }
      redirect('login','refresh');
    }
  }

  /** PRIVATE FUNCTIONS **/

  private function loadLostPassword(&$data) {
    $data['page_controller'] = $this->getPage();
    loadNavbarLang($this, $data);
    $this->populatePageLangData($data);
    $this->load->view("templates/content_top", $data);
    $this->load->view("templates/header", $data);
    $this->load->view("public/lostpassword", $data); // MAIN LOST PASSWORD VIEW
    $this->load->view("templates/footer", $data);
    $this->load->view("templates/content_bottom");
  }

  private function populatePageLangData(&$data) {
    $data['title'] = $this->lang->line('lostpassword_title');
    $data['footer_text'] = $this->lang->line('footer_text');
    $data['lp_user_email'] = $this->lang->line('lp_user_email');
    $data['lp_user_email_validate'] = $this->lang->line('lp_user_email_validate');
    $data['lp_user_email_send'] = $this->lang->line('lp_user_email_send');
  }

}
