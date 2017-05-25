<?php
require_once 'dao.php';
require_once 'intf.php';
/**
 * Patient Tracking Devices Model
 */
class Devices extends HTS_Model implements IDevicesModel {

  private $tablePatients = HTS_LIVE.'.hts_patients';

  function __construct() {
    $this->setCurrentDb($this->load->database('live', TRUE));
    parent::__construct(HTS_LIVE.'.hts_patient_tracking_devices');
  }

  public function findAllWithFullPatientName() {
    $query = "SELECT d.*, p.ID as PATIENT_ID, p.PATIENT_NAME, p.PATIENT_SURNAME ";
    $query .= "FROM ".$this->getTable()." d, ".$this->tablePatients." p ";
    $query .= "WHERE d.PATIENT_ID = p.ID ORDER BY p.PATIENT_NAME;";
    $this->setQuery($this->getCurrentDb()->query($query));
    $result = $this->getQuery()->result();
    $this->num_rows = $this->getQuery()->num_rows();
    if($this->num_rows > 0) {
      return $result;
    } else {
      return NULL;
    }
  }

  public function findLastAddedDevices($limit = '5', $orderBy = 'DATE_CREATE', $orderAs = 'DESC') {
    $query = "SELECT DEVICE_NAME, DATE_CREATE ";
    $query .= "FROM ".$this->getTable()." ";
    $query .= "ORDER BY ".$orderBy." ".$orderAs." LIMIT ".$limit.";";
    $this->setQuery($this->getCurrentDb()->query($query));
    $result = $this->getQuery()->result();
    $this->num_rows = $this->getQuery()->num_rows();
    if($this->num_rows > 0) {
      return $result;
    } else {
      return NULL;
    }
  }

}
