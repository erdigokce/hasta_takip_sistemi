<?php
require_once 'dao.php';
require_once 'intf.php';
/**
 * Parameters Model
 */
class Parameters extends HTS_Model implements IParametersModel {

  function __construct() {
    parent::__construct('hts_live.hts_parameters');
  }

  public function findParameterList($screenName, $fieldName) {
    if(isSetAndNotEmpty($screenName) && isSetAndNotEmpty($fieldName)) {
      $query = $this->db->get_where($this->getTable(), array('SCREEN_NAME' => $screenName, 'FIELD_NAME' => $fieldName));
    }
    if(isSetAndNotEmpty($query)) {
      return $query->result();
    } else {
      return NULL;
    }
  }

  public function findParameterValue($screenName, $fieldName, $parameterKey) {
    if(isSetAndNotEmpty($screenName) && isSetAndNotEmpty($fieldName) && isSetAndNotEmpty($parameterKey)) {
      $this->db->select('PARAMETER_VALUE');
      $this->db->where(array('SCREEN_NAME' => $screenName, 'FIELD_NAME' => $fieldName, 'PARAMETER_KEY' => $parameterKey));
      $query = $this->db->get($this->getTable());
    }
    if(isSetAndNotEmpty($query)) {
      return $query->row();
    } else {
      return NULL;
    }
  }
}
