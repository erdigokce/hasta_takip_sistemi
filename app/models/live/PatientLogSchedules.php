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

  public function findAllWithFullDeviceSocket() {
    $this->setQuery($this->getCurrentDb()->query("SELECT d.DEVICE_HOST, d.DEVICE_PORT, l.* FROM ".HTS_LIVE.".hts_patient_tracking_devices d, ".HTS_LIVE.".hts_log_schedules l WHERE d.ID = l.DEVICE_ID ORDER BY d.DEVICE_HOST;"));
    $result = $this->getQuery()->result();
    $this->num_rows = $this->getQuery()->num_rows();
    if($this->num_rows > 0) {
      return $result;
    } else {
      return NULL;
    }
  }

}
