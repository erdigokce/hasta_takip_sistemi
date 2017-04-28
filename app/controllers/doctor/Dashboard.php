<?php
/**
 * Dashboard Controller Page
 */
class Dashboard extends CI_Controller {

  private $page_controller = 'dashboard';

  function __construct() {
    parent::__construct();
    $this->load->database('syscore');
    $this->load->model('syscore/user');
    $this->load->library('session');
    $this->load->library('htsutils');
  }

  /**
   * Index
   */
  public function index() {
    $this->lang->load(array('navbar',$this->page_controller), $this->session->langauge);
    $this->htsutils->loadNavbarLang($this, $data);
    $this->loadMenuLeftLang($data);
    $data['title'] = $this->lang->line('dashboard_title');
    $data['page_controller'] = $this->page_controller;

    if($this->session->has_userdata('auth') && $this->session->auth === TRUE){
      $data['name'] = $this->session->name;
      $data['surname'] = $this->session->surname;
      $data['auth'] = $this->session->auth;

      $this->load->view("templates/content_top", $data);
      $this->load->view("templates/header", $data);
      $this->load->view("doctor/dashboard"); // MAIN DASHBOARD VIEW
      $this->load->view("templates/footer");
      $this->load->view("templates/content_bottom");
    } else {
      redirect($this->page_controller, 'refresh');
    }
  }

  /**
   * Board
   */
  public function board() {
    if($this->session->has_userdata('auth') && $this->session->auth === TRUE){
      $this->load->view("doctor/board"); // BOARD VIEW
    } else {
      redirect($this->page_controller, 'refresh');
    }
  }

  /**
   * Device Informatıons
   */
  public function device_informations() {
    if($this->session->has_userdata('auth') && $this->session->auth === TRUE){
      $this->load->view("doctor/device_informations"); // DEVICE INFORMATIONS VIEW
    } else {
      redirect($this->page_controller, 'refresh');
    }
  }

  /**
   * Patient Informations
   */
  public function patient_informations() {
    if($this->session->has_userdata('auth') && $this->session->auth === TRUE){
      $this->load->view("doctor/patient_informations"); // PATIENT INFORMATIONS VIEW
    } else {
      redirect($this->page_controller, 'refresh');
    }
  }

  /**
   * Patient Logs
   */
  public function patient_logs() {
    if($this->session->has_userdata('auth') && $this->session->auth === TRUE){
      $this->load->view("doctor/patient_logs"); // PATIENT LOGS BOARD VIEW
    } else {
      redirect($this->page_controller, 'refresh');
    }
  }

  /**
   * PRIVATE FUNCTIONS
   */

   private function loadMenuLeftLang(&$data) {
     $data['menu_left_item_1'] = $this->lang->line('menu_left_item_1');
     $data['menu_left_item_2'] = $this->lang->line('menu_left_item_2');
     $data['menu_left_item_3'] = $this->lang->line('menu_left_item_3');
     $data['menu_left_item_4'] = $this->lang->line('menu_left_item_4');
   }
}

 ?>
