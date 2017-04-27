<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * HTS Utilities Library
 */
class Htsutils {

  public function isSetAndNotEmpty(&$var) {
    return isset($var) && !empty($var);
  }

  public function isNullOrEmpty(&$var) {
    return $var == NULL || empty($var);
  }

  public function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

  public function log_error($err_msg='Bir hata oluştu!') {
    log_message('error', $err_msg);
  }

  public function getDefaultTimeFormat() {
    return "Y-m-d H:i:s";
  }
}
