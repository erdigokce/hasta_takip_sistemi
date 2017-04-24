<?php
/**
 * Dashboard Controller Page
 */
class Dashboard extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->database('syscore');
    $this->load->model('syscore/user');
    $this->load->library('session');
  }

  public function index() {
      $data['title'] = "Doktor Paneli";
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
        redirect('public/home', 'refresh');
      }
  }

}

 ?>
