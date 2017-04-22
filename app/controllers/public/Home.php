<?php

/**
 * Home Controller
 */
class Home extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  public function index() {
    $data['title'] = "Anasayfa";
    $this->load->view("templates/content_top", $data);
    $this->load->view("templates/header");
    $this->load->view("public/home");
    $this->load->view("templates/footer");
    $this->load->view("templates/content_bottom");
  }

}
