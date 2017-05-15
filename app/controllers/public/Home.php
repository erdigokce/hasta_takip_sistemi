<?php

/**
 * Home Controller
 */
class Home extends HTS_Controller {

  function __construct() {
    parent::__construct('home');
  }

  public function index() {
    $this->fetchLang();
    loadNavbarLang($this, $data);
    $data['title'] = $this->lang->line('home_title');
    $data['page_controller'] = $this->getPage();
    $data['footer_text'] = $this->lang->line('footer_text');

    if($this->session->has_userdata('auth') && $this->session->auth === TRUE){
      $data['auth'] = $this->session->auth;
      $data['name'] = $this->session->name;
      $data['surname'] = $this->session->surname;
    } else {
      $data['auth'] = FALSE;
      $data['name'] = " ";
      $data['surname'] = " ";
    }
    $this->loadHomePage($data);
  }

  public function licence() {
    $this->fetchLang();
    $data['home_license_title'] = $this->lang->line('home_license_title');
    $data['home_license_text'] = $this->lang->line('home_license_text');
    $this->load->view("public/license", $data);
  }

  public function project() {
    $this->fetchLang();
    $data['home_project'] = $this->lang->line('home_project');
    $this->load->view("public/project", $data);
  }

  public function system() {
    $this->fetchLang();
    $data['home_system'] = $this->lang->line('home_system');
    $this->load->view("public/system", $data);
  }

  /*****************************************************************************
   ***************************** PRIVATE FUNCTIONS *****************************
   ****************************************************************************/

  /**
   * @param Array $data
   */
  private function loadHomePage(&$data) {
    $this->load->view("templates/content_top", $data);
    $this->load->view("templates/header", $data);
    $this->load->view("public/home", $data);
    $this->load->view("templates/footer", $data);
    $this->load->view("templates/content_bottom");
  }

  private function fetchLang() {
    $this->lang->load(array($this->getPage()), $this->session->language);
  }

}
