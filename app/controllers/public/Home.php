<?php

/**
 * Home Controller
 */
class Home extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->library('session');
  }

  public function index() {
    $data['title'] = "Anasayfa";
    if($this->session->has_userdata('auth') && $this->session->auth === TRUE){
      $data['auth'] = $this->session->auth;
      $data['name'] = $this->session->name;
      $data['surname'] = $this->session->surname;
    } else {
      $data['auth'] = FALSE;
      $data['name'] = " ";
      $data['surname'] = " ";
    }
    $this->load->view("templates/content_top", $data);
    $this->load->view("templates/header", $data);
    $this->load->view("public/home");
    $this->load->view("templates/footer");
    $this->load->view("templates/content_bottom");
  }

}
