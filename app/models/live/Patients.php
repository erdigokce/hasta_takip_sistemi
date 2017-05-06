<?php
require_once 'dao.php';
require_once 'intf.php';
/**
 * Parameters Model
 */
class Patients extends HTS_Model implements IPatientsModel {

  function __construct() {
    parent::__construct(HTS_LIVE.'.hts_patients');
  }

}
