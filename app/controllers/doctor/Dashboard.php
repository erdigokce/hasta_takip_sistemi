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
  }

  /**
   * Index
   */
  public function index() {
    $this->lang->load(array('navbar',$this->getPage()), $this->session->langauge);
    loadNavbarLang($this, $data);
    $this->loadMenuLeftLang($data);
    $data['title'] = $this->lang->line('dashboard_title');
    $data['page_controller'] = $this->getPage();
    $data['footer_text'] = $this->lang->line('footer_text');

    if($this->session->has_userdata('auth') && $this->session->auth === TRUE){
      $data['username'] = $this->session->username;
      $data['name'] = $this->session->name;
      $data['surname'] = $this->session->surname;
      $data['auth'] = $this->session->auth;
      $data['user_category'] = $this->user->getUser($this->session->username)->USER_CATEGORY;
      $this->loadDashboard($data);
    } else {
      redirect('login', 'refresh');
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
  public function deviceInformations() {
    if($this->session->has_userdata('auth') && $this->session->auth === TRUE){
      $this->loadDeviceInformationsLang($data);
      $data['css_for_datagrid'] = TRUE;
      $data['js_for_datagrid'] = TRUE;
      $this->load->view("doctor/DeviceInformations", $data); // DEVICE INFORMATIONS VIEW
    } else {
      redirect($this->getPage(), 'refresh');
    }
  }

  /**
   * Patient Informations
   */
  public function patientInformations() {
    if($this->session->has_userdata('auth') && $this->session->auth === TRUE){
      $this->load->model('live/patients');
      $this->load->view("doctor/PatientInformations"); // PATIENT INFORMATIONS VIEW
    } else {
      redirect($this->getPage(), 'refresh');
    }
  }

  /**
   * Patient Logs
   */
  public function patientLogs() {
    if($this->session->has_userdata('auth') && $this->session->auth === TRUE){
      $this->load->model('live/patientlogs');
      $this->load->view("doctor/PatientLogs"); // PATIENT LOGS BOARD VIEW
    } else {
      redirect($this->getPage(), 'refresh');
    }
  }

  /**
   * AJAX Request'ine cevap verir.
   * @return [type] [description]
   */
  public function listDevicesInJson() {
    $this->load->model('live/devices');
    echo $this->devices->listDevicesInJson();
  }

  /**
   * PRIVATE FUNCTIONS
   */

   private function loadDashboard(&$data) {
     $this->load->view("templates/content_top", $data);
     $this->load->view("templates/header", $data);
     $this->load->view("doctor/dashboard", $data); // MAIN DASHBOARD VIEW
     $this->load->view("templates/footer", $data);
     $this->load->view("templates/content_bottom");
   }

   private function loadMenuLeftLang(&$data) {
     $data['menu_left_item_1'] = $this->lang->line('menu_left_item_1');
     $data['menu_left_item_2'] = $this->lang->line('menu_left_item_2');
     $data['menu_left_item_3'] = $this->lang->line('menu_left_item_3');
     $data['menu_left_item_4'] = $this->lang->line('menu_left_item_4');
     $data['dashboard_unauthorized_user'] = $this->lang->line('dashboard_unauthorized_user');
   }

   private function loadDeviceInformationsLang(&$data) {
     $this->lang->load(array('navbar',$this->getPage()), $this->session->langauge);
     $data['device_infos_patient'] = $this->lang->line('device_infos_patient');
     $data['device_infos_device_name'] = $this->lang->line('device_infos_device_name');
     $data['device_infos_device_desc'] = $this->lang->line('device_infos_device_desc');
     $data['device_infos_device_host'] = $this->lang->line('device_infos_device_host');
     $data['device_infos_device_port'] = $this->lang->line('device_infos_device_port');
   }

   private function loadPatientInformationsLang(&$data) {
     $this->lang->load(array('navbar',$this->getPage()), $this->session->langauge);
     $data['patient_infos_name'] = $this->lang->line('patient_infos_name');
     $data['patient_infos_surname'] = $this->lang->line('patient_infos_surname');
     $data['patient_infos_address'] = $this->lang->line('patient_infos_address');
     $data['patient_infos_phone1'] = $this->lang->line('patient_infos_phone1');
     $data['patient_infos_phone2'] = $this->lang->line('patient_infos_phone2');
     $data['patient_infos_email'] = $this->lang->line('patient_infos_email');
   }

}

 ?>
