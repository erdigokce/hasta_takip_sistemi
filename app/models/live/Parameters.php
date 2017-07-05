<?php
require_once 'dao.php';
require_once 'intf.php';
/**
 * Parameters Model
 */
class Parameters extends HTS_Model implements IParametersModel {

  function __construct() {
    $this->setCurrentDb($this->load->database('live', TRUE));
    parent::__construct(HTS_LIVE.'.hts_parameters');
  }

  public function findParameterList($screenName, $fieldName) {
    if(isSetAndNotEmpty($screenName) && isSetAndNotEmpty($fieldName)) {
      $this->setQuery($this->getCurrentDb()->get_where($this->getTable(), array('SCREEN_NAME' => $screenName, 'FIELD_NAME' => $fieldName)));
    }
    if(isSetAndNotEmpty($this->getQuery())) {
      return $this->getQuery()->result();
    }
    return NULL;
  }

  public function findParameterValue($screenName, $fieldName, $parameterKey) {
    if(isSetAndNotEmpty($screenName) && isSetAndNotEmpty($fieldName) && isSetAndNotEmpty($parameterKey)) {
      $this->getCurrentDb()->select('PARAMETER_VALUE');
      $this->getCurrentDb()->where(array('SCREEN_NAME' => $screenName, 'FIELD_NAME' => $fieldName, 'PARAMETER_KEY' => $parameterKey));
      $this->setQuery($this->getCurrentDb()->get($this->getTable()));
    }
    if(isSetAndNotEmpty($this->getQuery())) {
      return $this->getQuery()->row();
    }
    return NULL;
  }
}
