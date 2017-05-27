<?php

interface IHTS_Model {

  /**
   * Seçici birincil anahtara göre kayıdı döner.
   * @param  Integer(12)    $id     Seçici birincil anahtar
   * @return Object                 Gelen veri. (Eğer boş ise null döner.)
   */
  public function findByPrimaryKey(&$id);

  /**
   * Bütün kayıtları döner.
   * @return Object|Array            Gelen veriler. (Eğer boş ise null döner.)
   */
  public function findAll();

  /**
   * Bir dizi veya nesne olarak gönderilen veriyi DB ye ekler.
   * @param  Object|Array   $data   Eklenecek veri
   * @return Boolean                Başarılı ise TRUE
   */
  public function insertData(&$data);

  /**
   * Veriyi günceller
   * @param  Integer(12)    $id     Güncellenecek kayıt seçici anahtarı
   * @param  Object|Array   $data   Yeni veri
   * @return Boolean                Başarılı ise TRUE
   */
  public function updateData(&$id, &$data);

  /**
   * Veriyi siler
   * @param  Integer(12)    $id     Silinecek kayıt seçici anahtarı
   * @return Boolean                Başarılı ise TRUE
   */
  public function deleteData(&$id);

  /**
   * Tablodaki oluştuluma tarihi ve oluşturan kullanıcı kolonlarının verisini
   * hazırlar.
   *
   * @param array|object $data Global veri dizisi.
   */
  public function logImmediateCreation(&$data);

  /**
   * Tablodaki güncelleme tarihi ve güncelleyen kullanıcı kolonlarının verisini
   * hazırlar.
   *
   * @param array|object $data Global veri dizisi.
   */
  public function logImmediateUpdate(&$data);

  /**
   * Tabloyu verir.
   * @return Object Tablo
   */
  public function getTable();

  /**
   * Tabloyu setler
   * @param Object $table Tablo
   */
  public function setTable($table);

  /**
   * @return int                    Sorgu sonucu dönen kayıtların sayısını verir.
   */
  public function getNumRows();

  /**
   * @return Query                  Oluşturulan sorguyu döndürür.
   */
  public function getQuery();

  /**
   * @param  $query                 Query'yi setler.
   */
  public function setQuery($query);

  /**
   * @return DB                     Geçerli veritabanını verir.
   */
  public function getCurrentDb();

  /**
   * @param  $currentDb             Geçerli veritabanını setler.
   */
  public function setCurrentDb($currentDb);

  /**
   * @return Array                  Tablo kolonlarını verir.
   */
  public function getFields();

  /**
   * @param  $fields                Tablo kolonlarını setler.
   */
  public function setFields($table);

}
