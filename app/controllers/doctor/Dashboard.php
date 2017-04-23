<?php
/**
 * Dashboard Controller Page
 */
class Dashboard extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->database('syscore');
    $this->load->model('syscore/user');
  }

  public function index() {
      $data['title'] = "Doktor Paneli";
      $data['authorized'] = TRUE;
      $row = $this->user->getUser(2);
      $data['name'] = $row->NAME;
      $data['surname'] = $row->SURNAME;

      $this->load->view("templates/content_top", $data);
      $this->load->view("templates/header", $data);
      $this->load->view("doctor/dashboard"); // MAIN DASHBOARD VIEW
      $this->load->view("templates/footer");
      $this->load->view("templates/content_bottom");
  }

}

 ?>
