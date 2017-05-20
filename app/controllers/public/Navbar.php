<?php
/**
 * Navbar Controller Page
 */

class Navbar extends HTS_Controller {

  function __construct() {
    parent::__construct('navbar');
  }

  public function lang($selectedLanguage, $lastPage) {
    $this->session->set_userdata('language', $selectedLanguage);
    redirect($lastPage, 'refresh');
  }
}
