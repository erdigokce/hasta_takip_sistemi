<?php

/**
 * Welcomer Page Controller
 *
 * This controller welcomes the root site requests and redirects to the public home page.
 *
 */
class Welcomer extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  public function index() {
    redirect('home','refresh');
  }

}
