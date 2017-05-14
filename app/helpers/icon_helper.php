<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Ulusal bayrağın ikonunu döndürür.
 * @param  String $nation ISO 3166-1 ALPHA-2 standardında iki haneli ülke kodu.
 * @return Array          "Dosya uzantısı dahil imaj yolu", "Genişlik", "Yükseklik", "Alternatif Metin"
 */
function getNationalFlag($nation = 'tr') {
  include APPPATH."config/icons.php";
  $nation = strtolower($nation);
  if(isset($national_flags[$nation])) {
    return $national_flags[$nation];
  }
}
