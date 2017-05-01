<?php
require_once 'dao.php';
require_once 'intf.php';
/**
 * Patient Tracking Devices Model
 */
class Devices extends HTS_Model implements IDevicesModel {

  function __construct() {
    parent::__construct('hts_live.hts_patient_tracking_devices');
  }

  public function listDevicesInJson() {
    $allDevices = $this->findAll();
    return json_encode(array('total_rows' => (string) $this->getNumRows(), 'page_data' => $allDevices));
  }

}
