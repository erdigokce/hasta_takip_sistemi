<?php
/**
 * Login Controller Page
 */
class Login extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->load->helper('url');

    $data['title'] = "Yetkilendirme ve Giriş Sistemi";

    $this->load->view("templates/content_top", $data);
    $this->load->view("templates/header");
    $this->load->view("doctor/login"); // MAIN LOGIN VIEW
    $this->load->view("templates/footer");
    $this->load->view("templates/content_bottom");
  }

}

 ?>
