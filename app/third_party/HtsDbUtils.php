<?php

/**
 * HTS Database Utilization File
 */
class HtsDbUtils {

  private static $db_live;
  private static $db_syscore;

  function __construct() {
    self::$db_live = $this->load->database('live', TRUE);
    self::$db_syscore = $this->load->database('syscore', TRUE);
  }

  /**
   * @return Object     db driver instance for "live" database
   */
  public static function getDb_live() {
    return self::$db_live;
  }

  /**
   * @param  $db_live   sets db driver object for "live" database
   */
  public static function setDb_live($db_live) {
    self::$db_live = $db_live;
    return $this;
  }

  /**
   * @return Object     db driver instance for "syscore" database
   */
  public static function getDb_syscore() {
    return self::$db_syscore;
  }

  /**
   * @param  $db_syscore sets db driver object for "syscore" database
   */
  public static function setDb_syscore($db_syscore) {
    self::$db_syscore = $db_syscore;
    return $this;
  }

}
