<?php
require_once 'dao.php';
require_once 'intf.php';
/**
 * Parameters Model
 */
class Patientlogschedules extends HTS_Model implements IPatientLogSchedulesModel {

  function __construct() {
    $this->setCurrentDb($this->load->database('live', TRUE));
    parent::__construct(HTS_LIVE.'.hts_log_schedules');
  }

  public function findAllWithFullDeviceSocket($orderBy = 'DEVICE_HOST', $orderAs = 'ASC') {
    $query = "SELECT d.DEVICE_HOST, d.DEVICE_PORT, l.* ";
    $query .= "FROM ".HTS_LIVE.".hts_patient_tracking_devices d, ".$this->getTable()." l ";
    $query .= "WHERE d.ID = l.DEVICE_ID ";
    $query .= "ORDER BY ".$orderBy." ".$orderAs.";";
    $this->setQuery($this->getCurrentDb()->query($query));
    $result = $this->getQuery()->result();
    $this->num_rows = $this->getQuery()->num_rows();
    if($this->num_rows > 0) {
      return $result;
    }
    return NULL;
  }

  public function findByPrimaryKeyWithFullDeviceSocket(&$param = NULL) {
    if(!isNullOrEmpty($param)) {
      $query = "SELECT d.DEVICE_HOST, d.DEVICE_PORT, l.* ";
      $query .= "FROM ".HTS_LIVE.".hts_patient_tracking_devices d, ".$this->getTable()." l ";
      $query .= "WHERE d.ID = l.DEVICE_ID AND d.ID = ".$param." ";
      $query .= "ORDER BY ".$orderBy." ".$orderAs.";";
      $this->setQuery($this->getCurrentDb()->query($query));
      $result = $this->getQuery()->result();
      $this->num_rows = $this->getQuery()->num_rows();
      if($this->num_rows > 0) {
        return $result;
      }
    }
    return NULL;
  }

  public function findSchedulesByTypeOrDescription(&$param = NULL, $orderBy = 'DATE_CREATE', $orderAs = 'DESC') {
    if (!isNullOrEmpty($param)) {
      $query = "SELECT d.DEVICE_HOST, d.DEVICE_PORT, l.* ";
      $query .= "FROM ".HTS_LIVE.".hts_patient_tracking_devices d, ".$this->getTable()." l ";
      $query .= "WHERE d.ID = l.DEVICE_ID AND (l.SCHEDULE_TYPE LIKE '%".$param."%' OR l.DESCRIPTION LIKE '%".$param."%') ";
      $query .= "ORDER BY ".$orderBy." ".$orderAs.";";
      $this->setQuery($this->getCurrentDb()->query($query));
      $result = $this->getQuery()->result();
      $this->num_rows = $this->getQuery()->num_rows();
      if($this->num_rows > 0) {
        return $result;
      }
    }
    return NULL;
  }
 
}
