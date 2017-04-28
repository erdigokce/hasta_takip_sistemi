<?php
/**
 * Navbar Controller Page
 */

class Navbar extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->library('session');
    $this->load->library('htsutils');
  }

  public function lang($selectedLangauge, $lastPage) {
    $this->session->set_userdata('langauge', $selectedLangauge);
    redirect($lastPage, 'refresh');
  }
}
