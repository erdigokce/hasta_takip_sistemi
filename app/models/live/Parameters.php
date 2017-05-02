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
      $this->setQuery($this->db->get_where($this->getTable(), array('SCREEN_NAME' => $screenName, 'FIELD_NAME' => $fieldName)));
    }
    if(isSetAndNotEmpty($this->getQuery())) {
      return $this->getQuery()->result();
    } else {
      return NULL;
    }
  }

  public function findParameterValue($screenName, $fieldName, $parameterKey) {
    if(isSetAndNotEmpty($screenName) && isSetAndNotEmpty($fieldName) && isSetAndNotEmpty($parameterKey)) {
      $this->db->select('PARAMETER_VALUE');
      $this->db->where(array('SCREEN_NAME' => $screenName, 'FIELD_NAME' => $fieldName, 'PARAMETER_KEY' => $parameterKey));
      $this->setQuery($this->db->get($this->getTable()));
    }
    if(isSetAndNotEmpty($this->getQuery())) {
      return $this->getQuery()->row();
    } else {
      return NULL;
    }
  }
}
