<?php
require_once 'dao.php';
require_once 'intf.php';
/**
 * Patient Tracking Devices Model
 */
class Devices extends HTS_Model implements IDevicesModel {

  private $tablePatients = HTS_LIVE.'.hts_patients';

  function __construct() {
    parent::__construct(HTS_LIVE.'.hts_patient_tracking_devices');
  }

  public function findAllWithFullPatientName() {
    $this->setQuery($this->db->query("SELECT d.*, p.ID as PATIENT_ID, p.PATIENT_NAME, p.PATIENT_SURNAME FROM ".$this->getTable()." d, ".$this->tablePatients." p WHERE d.PATIENT_ID = p.ID ORDER BY p.PATIENT_NAME;"));
    $result = $this->getQuery()->result();
    $this->num_rows = $this->getQuery()->num_rows();
    if($this->num_rows > 0) {
      return $result;
    } else {
      return NULL;
    }
  }

}
