<?php
require_once APPPATH."/third_party/Apputils.php";

class HTS_Controller extends CI_Controller {

  private $page_controller;

  function __construct($page_controller) {
    parent::__construct();
    $this->page_controller = $page_controller;
    $this->load->library(array('session'));
    if(isNullOrEmpty(session_id())){
      $this->session->langauge = getCurrentLocale() != HTS_LOCALE_TR ? 'english' : 'turkish';
    }
    $this->lang->load(array('navbar', 'error', 'messages'), $this->session->langauge);
  }

  public function getPage() {
    return $this->page_controller;
  }

}
