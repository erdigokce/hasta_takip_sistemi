<?php

/**
 * Dashboard Model Page
 */
class Dashboard_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  public function get_patients() {
    $query = $this->db->get('hts_patients');
    return $query->result();
  }

  public function get_last_patient_logs() {
    $query = $this->db->get('hts_logs');
    return $query->result();
  }

}
