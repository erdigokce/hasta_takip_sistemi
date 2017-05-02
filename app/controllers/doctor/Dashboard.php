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
      redirect('login/session_expire', 'refresh');
    }
  }

  /**
   * Board
   */
  public function board() {
    if($this->session->has_userdata('auth') && $this->session->auth === TRUE){
      $this->load->view("doctor/board"); // BOARD VIEW
    } else {
      redirect('login/session_expire', 'refresh');
    }
  }

  /**
   * Device Informatıons
   */
  public function deviceInformations($page_number = '1', $records_per_page = '10') {
    if($this->session->has_userdata('auth') && $this->session->auth === TRUE){
      $this->load->model('live/devices');
      $result = $this->devices->findAllWithFullPatientName();
      $this->loadDeviceInformationsLang($data);
      $data['query'] = $this->devices->getQuery();
      $data['result'] = $result;
      $data['num_rows'] = $this->devices->getNumRows();
      $data['page_number'] = $page_number;
      $data['records_per_page'] = $records_per_page;
      $this->load->view("doctor/DeviceInformations", $data); // DEVICE INFORMATIONS VIEW
    } else {
      redirect('login/session_expire', 'refresh');
    }
  }

  /**
   * Patient Informations
   */
  public function patientInformations($page_number = '1', $records_per_page = '10') {
    if($this->session->has_userdata('auth') && $this->session->auth === TRUE){
      $this->load->model('live/patients');
      $result = $this->patients->findAll();
      $this->loadPatientInformationsLang($data);
      $data['query'] = $this->patients->getQuery();
      $data['result'] = $result;
      $data['num_rows'] = $this->patients->getNumRows();
      $data['page_number'] = $page_number;
      $data['records_per_page'] = $records_per_page;
      $this->load->view("doctor/PatientInformations", $data); // PATIENT INFORMATIONS VIEW
    } else {
      redirect('login/session_expire', 'refresh');
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
      redirect('login/session_expire', 'refresh');
    }
  }

  /**
   * Patient Log Schedules
   */
  public function patientLogSchedules($page_number = '1', $records_per_page = '10') {
    if($this->session->has_userdata('auth') && $this->session->auth === TRUE){
      $this->load->model('live/patientlogschedules');
      $result = $this->patientlogschedules->findAllWithFullDeviceSocket();
      $this->loadPatientLogSchedulesLang($data);
      $data['query'] = $this->patientlogschedules->getQuery();
      $data['result'] = $result;
      $data['num_rows'] = $this->patientlogschedules->getNumRows();
      $data['page_number'] = $page_number;
      $data['records_per_page'] = $records_per_page;
      $this->load->view("doctor/PatientLogSchedules", $data); // PATIENT LOG SCHEDULES BOARD VIEW
    } else {
      redirect('login/session_expire', 'refresh');
    }
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
     $data['menu_left_item_5'] = $this->lang->line('menu_left_item_5');
     $data['dashboard_unauthorized_user'] = $this->lang->line('dashboard_unauthorized_user');
   }

   private function loadDeviceInformationsLang(&$data) {
     $this->lang->load(array('navbar',$this->getPage()), $this->session->langauge);
     $data['device_infos_patient'] = $this->lang->line('device_infos_patient');
     $data['device_infos_device_name'] = $this->lang->line('device_infos_device_name');
     $data['device_infos_device_desc'] = $this->lang->line('device_infos_device_desc');
     $data['device_infos_device_mac'] = $this->lang->line('device_infos_device_mac');
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
     $data['patient_infos_apikey'] = $this->lang->line('patient_infos_apikey');
   }

   private function loadPatientLogSchedulesLang(&$data) {
     $this->lang->load(array('navbar',$this->getPage()), $this->session->langauge);
     $data['schedule_device_socket'] = $this->lang->line('schedule_device_socket');
     $data['schedule_pattern'] = $this->lang->line('schedule_pattern');
     $data['schedule_type'] = $this->lang->line('schedule_type');
     $data['schedule_duration'] = $this->lang->line('schedule_duration');
     $data['schedule_description'] = $this->lang->line('schedule_description');
   }

}

 ?>
