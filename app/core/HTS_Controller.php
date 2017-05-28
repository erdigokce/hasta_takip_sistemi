<?php

include 'IHTS_Controller.php';

class HTS_Controller extends CI_Controller implements IHTS_Controller {

  private $page_controller;

  function __construct($page_controller) {
    parent::__construct();
    $this->page_controller = $page_controller;
    $this->load->library(array('session'));
    arrangeLangauge();
    $CI =& get_instance();
    $CI->config->config['language'] = $this->session->language;
    $this->lang->load(array('navbar', 'error', 'messages'), $this->session->language);
  }

  public function getPage() {
    return $this->page_controller;
  }

}
