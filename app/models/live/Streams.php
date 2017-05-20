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

  public function findAllWithFullPatientName() {
    $this->setQuery($this->getCurrentDb()->query("SELECT d.*, p.PATIENT_NAME, p.PATIENT_SURNAME FROM ".$this->getTable()." d, ".$this->tablePatients." p WHERE d.PATIENT_ID = p.ID ORDER BY p.PATIENT_NAME;"));
    $result = $this->getQuery()->result();
    $this->num_rows = $this->getQuery()->num_rows();
    if($this->num_rows > 0) {
      return $result;
    } else {
      return NULL;
    }
  }

  public function findListByPatientId($patientId) {
    if(isSetAndNotEmpty($patientId)) {
      $this->getCurrentDb()->where(array('PATIENT_ID' => $patientId));
      $this->getCurrentDb()->where("STREAM_NAME IS NOT NULL");
      $this->setQuery($this->getCurrentDb()->get($this->getTable()));
    }
    if(isSetAndNotEmpty($this->getQuery())) {
      return $this->getQuery()->result();
    } else {
      return NULL;
    }
  }

}
