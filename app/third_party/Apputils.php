<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Application utilities Library
 */
class AppUtils {

  private static $username;
  private static $name;
  private static $surname;
  private static $sessId;
  private static $hostIP;
  private static $userAgent;
  private static $selectedLangauge;

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
    return self::$surname;
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

  /**
   * @return
   */
  public static function getUserAgent() {
    return self::$userAgent;
  }

  /**
   * @param  $userAgent
   */
  public static function setUserAgent($userAgent) {
    self::$userAgent = $userAgent;
  }

  /**
   * @return
   */
  public static function getHostIP() {
    return self::$hostIP;
  }

  /**
   * @param  $hostIP
   */
  public static function setHostIP($hostIP) {
    self::$hostIP = $hostIP;
  }

  /**
   * @return
   */
  public static function getSelectedLangauge() {
    return self::$selectedLangauge;
  }

  /**
   * @param  $selectedLangauge
   */
  public static function setSelectedLangauge($selectedLangauge) {
    self::$selectedLangauge = $selectedLangauge;
  }
}
