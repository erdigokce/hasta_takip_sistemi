<?php

/**
 * Home Controller
 */
class Home extends HTS_Controller {

  function __construct() {
    parent::__construct('home');
    $this->load->library('session');
    $this->load->library('htsutils');
  }

  public function index() {
    $this->lang->load(array('navbar',$this->getPage()), $this->session->langauge);
    $this->htsutils->loadNavbarLang($this, $data);
    $data['title'] = $this->lang->line('home_title');
    $data['page_controller'] = $this->getPage();

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
