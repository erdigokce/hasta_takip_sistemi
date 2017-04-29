<?php
/**
 * Dashboard Controller Page
 */
class Dashboard extends HTS_Controller {

  function __construct() {
    parent::__construct('dashboard');
    $this->load->database('syscore');
    $this->load->model('syscore/user');
    $this->load->library('session');
    $this->load->library('htsutils');
  }

  /**
   * Index
   */
  public function index() {
    $this->lang->load(array('navbar',$this->getPage()), $this->session->langauge);
    $this->htsutils->loadNavbarLang($this, $data);
    $this->loadMenuLeftLang($data);
    $data['title'] = $this->lang->line('dashboard_title');
    $data['page_controller'] = $this->getPage();

    if($this->session->has_userdata('auth') && $this->session->auth === TRUE){
      $data['username'] = $this->session->username;
      $data['name'] = $this->session->name;
      $data['surname'] = $this->session->surname;
      $data['auth'] = $this->session->auth;
      $data['user_category'] = $this->user->getUser($this->session->username)->USER_CATEGORY;
      $this->loadDashboard($data);
    } else {
      redirect($this->getPage(), 'refresh');
    }
  }

  /**
   * Board
   */
  public function board() {
    if($this->session->has_userdata('auth') && $this->session->auth === TRUE){
      $this->load->view("doctor/board"); // BOARD VIEW
    } else {
      redirect($this->getPage(), 'refresh');
    }
  }

  /**
   * Device Informatıons
   */
  public function device_informations() {
    if($this->session->has_userdata('auth') && $this->session->auth === TRUE){
      $this->load->view("doctor/device_informations"); // DEVICE INFORMATIONS VIEW
    } else {
      redirect($this->getPage(), 'refresh');
    }
  }

  /**
   * Patient Informations
   */
  public function patient_informations() {
    if($this->session->has_userdata('auth') && $this->session->auth === TRUE){
      $this->load->view("doctor/patient_informations"); // PATIENT INFORMATIONS VIEW
    } else {
      redirect($this->getPage(), 'refresh');
    }
  }

  /**
   * Patient Logs
   */
  public function patient_logs() {
    if($this->session->has_userdata('auth') && $this->session->auth === TRUE){
      $this->load->view("doctor/patient_logs"); // PATIENT LOGS BOARD VIEW
    } else {
      redirect($this->getPage(), 'refresh');
    }
  }

  /**
   * PRIVATE FUNCTIONS
   */

   private function loadDashboard(&$data) {
     $this->load->view("templates/content_top", $data);
     $this->load->view("templates/header", $data);
     $this->load->view("doctor/dashboard", $data); // MAIN DASHBOARD VIEW
     $this->load->view("templates/footer");
     $this->load->view("templates/content_bottom");
   }

   private function loadMenuLeftLang(&$data) {
     $data['menu_left_item_1'] = $this->lang->line('menu_left_item_1');
     $data['menu_left_item_2'] = $this->lang->line('menu_left_item_2');
     $data['menu_left_item_3'] = $this->lang->line('menu_left_item_3');
     $data['menu_left_item_4'] = $this->lang->line('menu_left_item_4');
     $data['dashboard_unauthorized_user'] = $this->lang->line('dashboard_unauthorized_user');
   }
}

 ?>
