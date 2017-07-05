<?php
require_once 'dao.php';
require_once 'intf.php';
/**
 * Streams Model
 */
class Streams extends HTS_Model implements IStreamsModel {

  private $tablePatients = HTS_LIVE.'.hts_patients';

  function __construct() {
    $this->setCurrentDb($this->load->database('live', TRUE));
    parent::__construct(HTS_LIVE.'.hts_streams');
  }

  public function findAllWithFullPatientName($orderBy = 'PATIENT_NAME', $orderAs = 'ASC') {
    $query = "SELECT d.*, p.PATIENT_NAME, p.PATIENT_SURNAME ";
    $query .= "FROM ".$this->getTable()." d, ".$this->tablePatients." p ";
    $query .= "WHERE d.PATIENT_ID = p.ID ";
    $query .= "ORDER BY p.".$orderBy." ".$orderAs.";";
    $this->setQuery($this->getCurrentDb()->query($query));
    $result = $this->getQuery()->result();
    $this->num_rows = $this->getQuery()->num_rows();
    if($this->num_rows > 0) {
      return $result;
    }
    return NULL;
  }

  public function findListByPatientId($patientId) {
    if(isSetAndNotEmpty($patientId)) {
      $this->getCurrentDb()->where(array('PATIENT_ID' => $patientId));
      $this->getCurrentDb()->where("STREAM_NAME IS NOT NULL");
      $this->setQuery($this->getCurrentDb()->get($this->getTable()));
    }
    if(isSetAndNotEmpty($this->getQuery())) {
      return $this->getQuery()->result();
    }
    return NULL;
  }

  public function findStreamsByNameOrTokenOrShareKey(&$param = NULL, $orderBy = HTS_ORDER_BY, $orderAs = HTS_ORDER_AS) {
    if(!isNullOrEmpty($param)) {
      $query = "SELECT d.*, p.PATIENT_NAME, p.PATIENT_SURNAME ";
      $query .= "FROM ".$this->getTable()." d, ".$this->tablePatients." p ";
      $query .= "WHERE d.PATIENT_ID = p.ID AND (d.STREAM_NAME LIKE '%".$param."%' OR d.TOKEN = '".$param."' OR d.SHARE_KEY = '".$param."') ";
      $query .= "ORDER BY p.".$orderBy." ".$orderAs.";";
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
