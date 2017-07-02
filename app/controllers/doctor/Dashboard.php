<?php
/**
 * Dashboard Controller Page
 */
class Dashboard extends HTS_Controller {

  function __construct() {
    parent::__construct('dashboard');
    $this->load->helper('form');
    $this->load->library(array('form_validation'));
    $this->load->model('syscore/user');
  }

  /**
   * Index
   */
  public function index() {
    $this->fetchLang();
    loadNavbarLang($this, $data);
    $this->loadMenuLeftLang($data);
    $this->loadPageData($data);

    if(isSessionValid($this)){
      $data['username'] = $this->session->username;
      $data['name'] = $this->session->name;
      $data['surname'] = $this->session->surname;
      $data['auth'] = $this->session->auth;
      $data['user_category'] = $this->user->getUser($this->session->username)->USER_CATEGORY;
      $this->loadDashboard($data);
    } else {
      redirect('login/index/session_expire', 'refresh');
    }
  }

  /**
   * Board
   */
  public function board() {
    if(isSessionValid($this)){
      $this->loadBoardLang($data);
      $this->loadPageData($data);
      $this->load->model(array('syscore/userlogs', 'live/devices', 'live/patients'));
      $resultLastActiveUsers = $this->userlogs->getLastActiveUsers();
      $resultLastAddedDevices = $this->devices->findLastAddedDevices();
      $resultLastAddedPatients = $this->patients->findLastAddedPatients();
      $data['resultLastActiveUsers'] = $resultLastActiveUsers;
      $data['resultLastAddedDevices'] = $resultLastAddedDevices;
      $data['resultLastAddedPatients'] = $resultLastAddedPatients;
      $this->load->view("doctor/board", $data); // BOARD VIEW
    } else {
      redirect('login/index/session_expire', 'refresh');
    }
  }

  /**
   * Device Informatıons
   */
  public function deviceInformations($page_number = HTS_PAGE_NO, $records_per_page = HTS_RECORDS_PER_PAGE, $inquireDevice = NULL) {
    if(isSessionValid($this)){
      $this->loadDeviceInformationsLang($data);
      $this->loadPageData($data);
      $this->load->model(array('live/devices', 'live/patients'));
      $result = NULL;
      $inquireDevice = str_replace('_',' ',$inquireDevice);
      if(!isNullOrEmpty($inquireDevice)) {
        if(is_numeric($inquireDevice)) {
          $result = $this->devices->findByPrimaryKeyWithFullPatientName($inquireDevice);
        } else {
          $result = $this->devices->findDeviceByName($inquireDevice);
        }
      } else {
        $result = $this->devices->findAllWithFullPatientName();
      }
      $result_patients = $this->patients->findAll();
      $data['result'] = $result;
      $data['result_patients'] = $result_patients;
      $data['page_number'] = $page_number;
      $data['records_per_page'] = $records_per_page;
      $this->load->view("doctor/deviceinformations", $data); // DEVICE INFORMATIONS VIEW
    } else {
      redirect('login/index/session_expire', 'refresh');
    }
  }

  /**
   * Patient Informations
   */
  public function patientInformations($page_number = HTS_PAGE_NO, $records_per_page = HTS_RECORDS_PER_PAGE, $inquirePatient = NULL) {
    if(isSessionValid($this)){
      $this->load->model('live/patients');
      $this->loadPatientInformationsLang($data);
      $this->loadPageData($data);
      $result = NULL;
      $inquirePatient = str_replace('_',' ',$inquirePatient);
      if(!isNullOrEmpty($inquirePatient)) {
        if(is_numeric($inquirePatient)) {
          $result = $this->patients->findByPrimaryKey($inquirePatient, FALSE);
        } else {
          $result = $this->patients->findPatientByUsernameOrName($inquirePatient);
        }
      } else {
        $result = $this->patients->findAll();
      }
      $data['result'] = $result;
      $data['page_number'] = $page_number;
      $data['records_per_page'] = $records_per_page;
      $this->load->view("doctor/patientinformations", $data); // PATIENT INFORMATIONS VIEW
    } else {
      redirect('login/index/session_expire', 'refresh');
    }
  }

  /**
   * Patient Logs
   */
  public function patientLogs($patientId = "", $patientUsername = "" , $streamId = "", $streamName = "", $streamShareKey = "", $streamNumber = "", $displayStatus = "none") {
    if(isSessionValid($this)){
      $this->load->model(array('live/patientlogs', 'live/patients', 'live/streams'));
      $this->loadPatientLogsLang($data);
      $this->loadPageData($data);
      if(!isNullOrEmpty($patientId)) {
        $data['patient_selected'] = TRUE;
        $data['patient_id'] = $patientId;
        $data['stream_id'] = $streamId;
        $data['resultPatientLogs'] = $this->patientlogs->findListByPatientId($patientId);
        $data['resultStreams'] = $this->streams->findListByPatientId($patientId);
        if(!isNullOrEmpty($streamId)) {
          $data['patientUsername'] = $patientUsername;
          $data['streamName'] = $streamName;
          $data['streamShareKey'] = $streamShareKey;
          $data['streamNumber'] = $streamNumber;
        }
      }
      $data['displayStatus'] = $displayStatus;
      $data['resultPatients'] = $this->patients->findAll();
      $this->load->view("doctor/patientlogs", $data); // PATIENT LOGS BOARD VIEW
    } else {
      redirect('login/index/session_expire', 'refresh');
    }
  }

  /**
   * Patient Log Schedules
   */
  public function patientLogSchedules($page_number = HTS_PAGE_NO, $records_per_page = HTS_RECORDS_PER_PAGE) {
    if(isSessionValid($this)){
      $this->load->model(array('live/devices','live/patientlogschedules'));
      $result = $this->patientlogschedules->findAllWithFullDeviceSocket();
      $result_devices = $this->devices->findAll();
      $this->loadPatientLogSchedulesLang($data);
      $this->loadPageData($data);
      $data['result'] = $result;
      $data['result_devices'] = $result_devices;
      $data['page_number'] = $page_number;
      $data['records_per_page'] = $records_per_page;
      $this->load->view("doctor/patientlogschedules", $data); // PATIENT LOG SCHEDULES BOARD VIEW
    } else {
      redirect('login/index/session_expire', 'refresh');
    }
  }

  /**
   * Streams
   */
  public function streams($page_number = '1', $records_per_page = '5') {
    if(isSessionValid($this)) {
      $this->load->model(array('live/streams','live/patients'));
      $result = $this->streams->findAllWithFullPatientName();
      $result_patients = $this->patients->findAll();
      $this->loadStreamLang($data);
      $this->loadPageData($data);
      $data['result'] = $result;
      $data['result_patients'] = $result_patients;
      $data['page_number'] = $page_number;
      $data['records_per_page'] = $records_per_page;
      $this->load->view("doctor/streams", $data); // PATIENT LOG SCHEDULES BOARD VIEW
    } else {
      redirect('login/index/session_expire', 'refresh');
    }
  }

  /*****************************************************************************
   ******************** CONTROLLERS FOR DATA MANIPULATION **********************
   ****************************************************************************/

    /**
     * Executes CRUD as given action and sets up the output messages for frontend.
     *
     * @param Object  $model       Model object.
     */
    public function processCRUD($model) {
      $this->fetchLang();
      $xhrData = $this->input->post();
      $this->load->model('live/'.$model);
      if(isset($xhrData["action"]) && $xhrData["action"] == "delete" && isset($xhrData["ID"])) {
        $success = $this->$model->deleteData($xhrData["ID"]);
        $action_text = $this->lang->line('param_action_delete');
      }
      elseif(isset($xhrData["ID"])) {
        if($xhrData["ID"] == "temp") {
          unset($xhrData["ID"]);
          $success = $this->$model->insertData($xhrData);
          $action_text = $this->lang->line('param_action_insert');
        } else {
          $update_id = $xhrData["ID"];
          unset($xhrData["ID"]);
          $success = $this->$model->updateData($update_id, $xhrData);
          $action_text = $this->lang->line('param_action_update');
        }
      }
      if(isset($success) && $success) {
        $response = array('alert_box_success', sprintf($this->lang->line('action_success'), $action_text));
        echo json_encode($response);
      }
      elseif(isset($success) && !$success) {
        $response = array('alert_box_danger', sprintf($this->lang->line('action_fail'), $action_text, $this->$model->error()));
        echo json_encode($response);
      }
    }

  /*****************************************************************************
   ***************************** PRIVATE FUNCTIONS *****************************
   ****************************************************************************/

   /**
   * @param Array $data
   */
   private function loadPageData(&$data) {
     $data['title'] = $this->lang->line('dashboard_title');
     $data['page_controller'] = $this->getPage();
     $data['footer_text'] = $this->lang->line('footer_text');
   }

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
     $data['menu_left_item_6'] = $this->lang->line('menu_left_item_6');
     $data['dashboard_unauthorized_user'] = $this->lang->line('dashboard_unauthorized_user');
   }

   private function loadBoardLang(&$data) {
     $this->fetchLang();
     $data['board_last_users'] = $this->lang->line('board_last_users');
     $data['board_last_active_userfullname'] = $this->lang->line('board_last_active_userfullname');
     $data['board_user_last_login_date'] = $this->lang->line('board_user_last_login_date');
     $data['board_last_added_devices'] = $this->lang->line('board_last_added_devices');
     $data['board_last_added_devicename'] = $this->lang->line('board_last_added_devicename');
     $data['board_device_add_date'] = $this->lang->line('board_device_add_date');
     $data['board_last_added_patients'] = $this->lang->line('board_last_added_patients');
     $data['board_last_reviewed_patients'] = $this->lang->line('board_last_reviewed_patients');
     $data['board_upcoming_streams'] = $this->lang->line('board_upcoming_streams');
     $data['board_last_added_patientfullname'] = $this->lang->line('board_last_added_patientfullname');
     $data['board_patient_add_date'] = $this->lang->line('board_patient_add_date');
     $data['patient_infos_phone1'] = $this->lang->line('patient_infos_phone1');
     $data['schedule_device_socket'] = $this->lang->line('schedule_device_socket');
   }

   private function loadDeviceInformationsLang(&$data) {
     $this->fetchLang();
     $data['device_infos_inquire'] = $this->lang->line('device_infos_inquire');
     $data['device_infos_inquire_button'] = $this->lang->line('device_infos_inquire_button');
     $data['device_infos_inquire_placeholder'] = $this->lang->line('device_infos_inquire_placeholder');
     $data['device_infos_patient'] = $this->lang->line('device_infos_patient');
     $data['device_infos_device_name'] = $this->lang->line('device_infos_device_name');
     $data['device_infos_device_desc'] = $this->lang->line('device_infos_device_desc');
     $data['device_infos_device_mac'] = $this->lang->line('device_infos_device_mac');
     $data['device_infos_device_host'] = $this->lang->line('device_infos_device_host');
     $data['device_infos_device_port'] = $this->lang->line('device_infos_device_port');
   }

   private function loadPatientInformationsLang(&$data) {
     $this->fetchLang();
     $data['patient_infos_inquire'] = $this->lang->line('patient_infos_inquire');
     $data['patient_infos_inquire_button'] = $this->lang->line('patient_infos_inquire_button');
     $data['patient_infos_inquire_placeholder'] = $this->lang->line('patient_infos_inquire_placeholder');
     $data['patient_infos_name'] = $this->lang->line('patient_infos_name');
     $data['patient_infos_surname'] = $this->lang->line('patient_infos_surname');
     $data['patient_infos_address'] = $this->lang->line('patient_infos_address');
     $data['patient_infos_phone1'] = $this->lang->line('patient_infos_phone1');
     $data['patient_infos_phone2'] = $this->lang->line('patient_infos_phone2');
     $data['patient_infos_email'] = $this->lang->line('patient_infos_email');
     $data['patient_infos_username'] = $this->lang->line('patient_infos_username');
     $data['patient_infos_apikey'] = $this->lang->line('patient_infos_apikey');
   }

   private function loadPatientLogSchedulesLang(&$data) {
     $this->fetchLang();
     $data['schedule_device_socket'] = $this->lang->line('schedule_device_socket');
     $data['schedule_pattern'] = $this->lang->line('schedule_pattern');
     $data['schedule_type'] = $this->lang->line('schedule_type');
     $data['schedule_duration'] = $this->lang->line('schedule_duration');
     $data['schedule_description'] = $this->lang->line('schedule_description');
   }

   private function loadPatientLogsLang(&$data) {
     $this->fetchLang();
     $data['patient_logs_last_activity'] = $this->lang->line('patient_logs_last_activity');
     $data['patient_logs_live'] = $this->lang->line('patient_logs_live');
     $data['patient_logs_history'] = $this->lang->line('patient_logs_history');
     $data['patient_logs_select_patient'] = $this->lang->line('patient_logs_select_patient');
     $data['patient_logs_select_stream'] = $this->lang->line('patient_logs_select_stream');
     $data['patient_logs_select_stream_to_display'] = $this->lang->line('patient_logs_select_stream_to_display');
   }

   private function loadStreamLang(&$data) {
     $this->fetchLang();
     $data['stream_patient'] = $this->lang->line('stream_patient');
     $data['stream_name'] = $this->lang->line('stream_name');
     $data['stream_token'] = $this->lang->line('stream_token');
     $data['stream_sharekey'] = $this->lang->line('stream_sharekey');
     $data['stream_filenumber'] = $this->lang->line('stream_filenumber');
   }

   /**
    * Fetches required lang files.
    */
   private function fetchLang() {
     $this->lang->load(array($this->getPage()), $this->session->language);
   }

}

 ?>
