<?php

include 'IHTS_Model.php';

class HTS_Model extends CI_Model implements IHTS_Model {

  private $currentDb;
  private $table;
  private $query;
  private $num_rows;
  private $fields;

  function __construct($table) {
    parent::__construct();
    if(!isset($this->currentDb)) {
      $this->currentDb = $this->load->database('live', TRUE); //default db
    }
    $this->table = $table;
    $this->setFields($table);
  }

  public function findByPrimaryKey(&$id) {
    $this->query = $this->currentDb->get_where($this->table, array('ID' => $id));
    $row = $this->query->row();
    $this->num_rows = $this->query->num_rows();
    if(isset($row)) {
      return $row;
    } else {
      return NULL;
    }
  }

  public function findAll() {
    $this->query = $this->currentDb->get($this->table);
    $result = $this->query->result();
    $this->num_rows = $this->query->num_rows();
    if($this->num_rows > 0) {
      return $result;
    } else {
      return NULL;
    }
  }

  public function insertData(&$data) {
    if(is_array($data) || is_object($data)) {
      $this->logImmediateCreation($data);
      return $this->currentDb->insert($this->table, $data);
    }
  }

  public function updateData(&$id, &$data) {
    if(is_array($data) || is_object($data)) {
      $this->logImmediateUpdate($data);
      $this->currentDb->where(array('ID' => $id));
      return $this->currentDb->update($this->table, $data);
    }
  }

  public function deleteData(&$id) {
    if(isset($id)) {
      return $this->currentDb->delete($this->table, array('ID' => $id));
    }
  }

  public function logImmediateCreation(&$data) {
    if (in_array('DATE_UPDATE', $this->fields) && in_array('USER_UPDATE', $this->fields)) {
      $data['DATE_CREATE'] = date(getDefaultTimeFormat());
      if(isSetAndNotEmpty($this->session->username)) {
        $data['USER_CREATE'] = $this->session->username;
      } else {
        $data['USER_CREATE'] = HTS_SYSTEM_GENERATED;
      }
    } else {
      unset($data['DATE_CREATE']);
      unset($data['USER_CREATE']);
    }
  }

  public function logImmediateUpdate(&$data) {
    if (in_array('DATE_UPDATE', $this->fields) && in_array('USER_UPDATE', $this->fields)) {
      $data['DATE_UPDATE'] = date(getDefaultTimeFormat());
      if(isSetAndNotEmpty($this->session->username)) {
        $data['USER_UPDATE'] = $this->session->username;
      } else {
        $data['USER_UPDATE'] = HTS_SYSTEM_GENERATED;
      }
    } else {
      unset($data['DATE_UPDATE']);
      unset($data['USER_UPDATE']);
    }
  }

  public function getTable() {
    return $this->table;
  }

  public function setTable($table) {
    $this->table = $table;
  }

  public function getNumRows() {
    return $this->num_rows;
  }

  public function getQuery() {
    return $this->query;
  }

  public function setQuery($query) {
    $this->query = $query;
  }

  public function getCurrentDb() {
    return $this->currentDb;
  }

  public function setCurrentDb($currentDb) {
    $this->currentDb = $currentDb;
  }

  public function getFields() {
    return $this->fields;
  }

  public function setFields($table) {
    $this->query = $this->currentDb->query("SHOW COLUMNS FROM ".$table.";");
    foreach ($this->query->result() as $row) {
      $fields[] = $row->Field;
    }
    $this->fields = $fields;
  }


}
