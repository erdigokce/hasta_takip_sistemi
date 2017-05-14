<?php

/**
 * Home Controller
 */
class Home extends HTS_Controller {

  function __construct() {
    parent::__construct('home');
  }

  public function index() {
    $this->lang->load(array($this->getPage()), $this->session->language);
    loadNavbarLang($this, $data);
    $data['title'] = $this->lang->line('home_title');
    $data['page_controller'] = $this->getPage();
    $data['footer_text'] = $this->lang->line('footer_text');

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
    $this->load->view("public/home", $data);
    $this->load->view("templates/footer", $data);
    $this->load->view("templates/content_bottom");
  }

}
