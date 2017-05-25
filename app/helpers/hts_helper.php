<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function get(&$param) {
  return isset($param) ? $param : "";
}

/**
 * Gönderilen element tanımlı ve boş değilse TRUE döndürür.
 * @param  mixed  $var      Kontrol edilecek element.
 * @return boolean          Sonucu döndürür.
 */
function isSetAndNotEmpty($var) {
  return isset($var) && !empty($var);
}

/**
 * Gönderilen element null veya boş ise TRUE döndürür.
 * @param  mixed  $var      Kontrol edilecek element.
 * @return boolean          Sonucu döndürür.
 */
function isNullOrEmpty($var) {
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

/**
 * Navbar dil metinlerini setler.
 * @param  Object $obj  Include eden ekran
 * @param  Array $data Ekran datası
 */
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
  $data['nav_common_about'] = $obj->lang->line('nav_common_about');
  $data['nav_common_licence'] = $obj->lang->line('nav_common_licence');
  $data['nav_common_system'] = $obj->lang->line('nav_common_system');
  $data['nav_common_project'] = $obj->lang->line('nav_common_project');
  $data['nav_common_app'] = $obj->lang->line('nav_common_app');
}

/**
 * Geçerli konumu verir.
 * @return Integer  (localewincharset) Örn: TR için 1254
 */
function getCurrentLocale() {
  $matches = array();
  preg_match("/\d+/",setlocale(LC_ALL, null), $matches);
  return $matches[0];
}

/**
 * Öntanımlı dili belirler. Session datasını setler.
 */
function arrangeLangauge() {
  if(!isset($_SESSION['language'])) {
    $_SESSION['language'] = getCurrentLocale() == HTS_LOCALE_TR ? 'turkish' : 'english';
  }
}

/**
 * Detects session validation and authorization status.
 * @param  Object  $obj Controller object.
 * @return boolean      Returns true is session valid and authorized.
 */
function isSessionValid(&$obj) {
  return $obj->session->has_userdata('auth') && $obj->session->auth === TRUE;
}
