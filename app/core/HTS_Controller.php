<?php

class HTS_Controller extends CI_Controller {

  private $page_controller;

  function __construct($page_controller) {
    parent::__construct();
    $this->page_controller = $page_controller;
  }

  public function getPage() {
    return $this->page_controller;
  }

}
