<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Application utilities Library
 */
class Apputils {

  private static $username;
  private static $name;
  private static $surname;
  private static $sessId;
  /**
   * @return
   */
  public function getUsername() {
    return $this->username;
  }

  /**
   * @param  $username
   *
   * @return static
   */
  public function setUsername($username) {
    $this->username = $username;
    return $this;
  }

  /**
   * @return
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @param  $name
   *
   * @return static
   */
  public function setName($name) {
    $this->name = $name;
    return $this;
  }

  /**
   * @return
   */
  public function getSurname() {
    return $this->surname;
  }

  /**
   * @param  $surname
   *
   * @return static
   */
  public function setSurname($surname) {
    $this->surname = $surname;
    return $this;
  }

  /**
   * @return
   */
  public function getSessId() {
    return $this->sessId;
  }

  /**
   * @param  $sessId
   *
   * @return static
   */
  public function setSessId($sessId) {
    $this->sessId = $sessId;
    return $this;
  }
}
