<?php

/**
 *
 */
class HTS_Model extends CI_Model {

  private $table;

  function __construct($table) {
    parent::__construct();
    $this->table = $table;
  }

  /**
   * Seçici birincil anahtara göre kayıdı döner.
   * @param  Integer(12)    $id     Seçici birincil anahtar
   * @return Object                 Gelen veri. (Eğer boş ise null döner.)
   */
  public function findByPrimaryKey($id){
    $query = $this->db->get_where($this->table, array('id' => $id));
    $row = $query->row();
    if(isset($row)) {
      return $row;
    } else {
      return NULL;
    }
  }

  /**
   * Bütün kayıtları döner.
   * @return Object|Array            Gelen veriler. (Eğer boş ise null döner.)
   */
  public function findAll(){
    $query = $this->db->get($this->table);
    $result = $query->result();
    if($query->num_rows() > 0) {
      return $result;
    } else {
      return NULL;
    }
  }

  /**
   * Bir dizi veya nesne olarak gönderilen veriyi DB ye ekler.
   * @param  Object|Array   $data   Eklenecek veri
   * @return Boolean                Başarılı ise TRUE
   */
  public function insertData($data) {
    if(is_array($data) || is_object($data)) {
      return $this->db->insert($this->table, $data);
    }
  }

  /**
   * Veriyi günceller
   * @param  Integer(12)    $id     Güncellenecek kayıt seçici anahtarı
   * @param  Object|Array   $data   Yeni veri
   * @return Boolean                Başarılı ise TRUE
   */
  public function updateData($id, $data) {
    if(is_array($data) || is_object($data)) {
      return $this->db->update($this->table, $data, array('ID' => $id));
    }
  }

  /**
   * Veriyi siler
   * @param  Integer(12)    $id     Silinecek kayıt seçici anahtarı
   * @return Boolean                Başarılı ise TRUE
   */
  public function deleteData($id) {
    if(is_array($data) || is_object($data)) {
      return $this->db->delete($this->table, array('ID' => $id));
    }
  }

}
