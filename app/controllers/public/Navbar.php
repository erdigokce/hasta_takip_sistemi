<?php
/**
 * Navbar Controller Page
 */

class Navbar extends HTS_Controller {

  function __construct() {
    parent::__construct('navbar');
    $this->load->library('session');
  }

  public function lang($selectedLangauge, $lastPage) {
    $this->session->set_userdata('langauge', $selectedLangauge);
    redirect($lastPage, 'refresh');
  }
}
