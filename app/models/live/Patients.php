<?php
require_once 'dao.php';
require_once 'intf.php';
/**
 * Parameters Model
 */
class Patients extends HTS_Model implements IPatientsModel {

  function __construct() {
    $this->setCurrentDb($this->load->database('live', TRUE));
    parent::__construct(HTS_LIVE.'.hts_patients');
  }

  public function findLastAddedPatients($limit = HTS_RECORD_LIMIT, $offset = HTS_RECORD_OFFSET, $orderBy = 'DATE_CREATE', $orderAs = 'DESC') {
    $query = "SELECT PATIENT_NAME, PATIENT_SURNAME, PATIENT_PHONE, DATE_CREATE ";
    $query .= "FROM ".$this->getTable()." ";
    $query .= "ORDER BY ".$orderBy." ".$orderAs." LIMIT ".$limit." OFFSET ".$offset.";";
    $this->setQuery($this->getCurrentDb()->query($query));
    $result = $this->getQuery()->result();
    $this->num_rows = $this->getQuery()->num_rows();
    if($this->num_rows > 0) {
      return $result;
    }
    return NULL;
  }

  public function findPatientByUsernameOrName($param = NULL, $orderBy = 'DATE_CREATE', $orderAs = 'DESC') {
    if (!isNullOrEmpty($param)) {
      $query = "SELECT * FROM ".$this->getTable()." ";
      $query .= "WHERE PATIENT_NAME LIKE '%".$param."%' OR PATIENT_USERNAME = '".$param."' ";
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
