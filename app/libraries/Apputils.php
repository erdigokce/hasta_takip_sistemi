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
   * @return Username
   */
  public static function getUsername() {
    return self::$username;
  }

  /**
   * @param  $username
   */
  public static function setUsername($username) {
    self::$username = $username;
  }

  /**
   * @return Name
   */
  public static function getName() {
    return self::$name;
  }

  /**
   * @param  $name
   */
  public static function setName($name) {
    self::$name = $name;
  }

  /**
   * @return Surname
   */
  public static function getSurname() {
    return $this->surname;
  }

  /**
   * @param  $surname
   */
  public static function setSurname($surname) {
    self::$surname = $surname;
  }

  /**
   * @return Session Identifier
   */
  public static function getSessId() {
    return self::$sessId;
  }

  /**
   * @param  $sessId
   */
  public static function setSessId($sessId) {
    self::$sessId = $sessId;
  }
}
