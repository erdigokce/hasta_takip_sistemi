<?php
require_once 'dao.php';
require_once 'intf.php';
/**
 * Parameters Model
 */
class Patients extends HTS_Model implements IPatientsModel {

  function __construct() {
    parent::__construct('hts_live.hts_patients');
  }

}
