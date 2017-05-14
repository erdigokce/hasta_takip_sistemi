<?php
require_once 'dao.php';
require_once 'intf.php';
/**
 * Parameters Model
 */
class Patientlogs extends HTS_Model implements IPatientLogsModel {

  function __construct() {
    $this->setCurrentDb($this->load->database('live', TRUE));
    parent::__construct(HTS_LIVE.'.hts_logs');
  }

  public function findListByPatientId($patientId) {
    if(isSetAndNotEmpty($patientId)) {
      $this->setQuery($this->getCurrentDb()->get_where($this->getTable(), array('PATIENT_ID' => $patientId)));
    }
    if(isSetAndNotEmpty($this->getQuery())) {
      return $this->getQuery()->result();
    } else {
      return NULL;
    }
  }

}
