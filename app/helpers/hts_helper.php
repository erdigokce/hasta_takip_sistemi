<?php

defined('BASEPATH') OR exit('No direct script access allowed');

  function get(&$param) {
    return isset($param) ? $param : "";
  }

  function isSetAndNotEmpty(&$var) {
    return isset($var) && !empty($var);
  }

  function isNullOrEmpty(&$var) {
    return $var == NULL || empty($var);
  }

  function console_log(&$data) {
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

  function log_error($err_msg='Bir hata oluştu!') {
    log_message('error', $err_msg);
  }

  function getDefaultTimeFormat() {
    return "Y-m-d H:i:s";
  }

  function loadNavbarLang(&$obj, &$data) {
    $data['nav_pro'] = $obj->lang->line('nav_pro');
    $data['nav_pro_inbox'] = $obj->lang->line('nav_pro_inbox');
    $data['nav_pro_settings'] = $obj->lang->line('nav_pro_settings');
    $data['nav_pro_logout'] = $obj->lang->line('nav_pro_logout');
    $data['nav_pro_login'] = $obj->lang->line('nav_pro_login');
    $data['nav_pro_dashboard'] = $obj->lang->line('nav_pro_dashboard');
    $data['nav_lang'] = $obj->lang->line('nav_lang');
    $data['nav_lang_en'] = $obj->lang->line('nav_lang_en');
    $data['nav_lang_tr'] = $obj->lang->line('nav_lang_tr');
  }
