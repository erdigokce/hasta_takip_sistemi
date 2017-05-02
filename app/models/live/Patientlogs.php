<?php
require_once 'dao.php';
require_once 'intf.php';
/**
 * Parameters Model
 */
class Patientlogs extends HTS_Model implements IPatientLogsModel {

  function __construct() {
    parent::__construct(HTS_LIVE.'.hts_logs');
  }

}
