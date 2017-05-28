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

  public function findLastAddedPatients($limit = '5', $offset = '0', $orderBy = 'DATE_CREATE', $orderAs = 'DESC') {
    $query = "SELECT PATIENT_NAME, PATIENT_SURNAME, PATIENT_PHONE, DATE_CREATE ";
    $query .= "FROM ".$this->getTable()." ";
    $query .= "ORDER BY ".$orderBy." ".$orderAs." LIMIT ".$limit." OFFSET ".$offset.";";
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
