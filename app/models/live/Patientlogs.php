<?php
require_once 'dao.php';
require_once 'intf.php';
/**
 * Parameters Model
 */
class Patientlogs extends HTS_Model implements IPatientlogsModel {

  function __construct() {
    parent::__construct('hts_live.hts_logs');
  }

}
