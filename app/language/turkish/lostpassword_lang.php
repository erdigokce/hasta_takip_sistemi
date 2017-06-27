<?php

/**
 * Lost Password Turkish Langauge File
 */

 defined('BASEPATH') OR exit('No direct script access allowed');

$lang['lostpassword_title'] = "Şifre Kurtarma Sistemi";

$lang['lp_new_password'] = "Yeni Şifre";
$lang['lp_new_password_retry'] = "Yeni Şifre (Tekrar)";
$lang['lp_new_password_send'] = "Şifreyi Onayla";
$lang['lp_user_email'] = "E-Posta Adresi";
$lang['lp_user_email_validate'] = "E-Posta Adresi (Tekrar)";
$lang['lp_user_email_send'] = "Yenileme Maili Gönder";
$lang['lp_description'] = "
  %s adresine bir doğrulama linki gönderilecektir.
  Lütfen gelen kutunuzu kontrol ediniz...
";
$lang['lp_mail_title'] = base_url()." - Şifre Yenileme";
$lang['lp_mail_body'] = "
  Sayın %s,\n\n

  Bu email sizi ilgilendirmiyorsa lütfen göz ardı ediniz. Öyle görünüyorki
  ".base_url()." web sitemizde bir şifre yenileme talebinde bulundunuz.\n\n

  Şifrenizi yenilemek için lütfen aşağıdaki bağlantıya tıklayınız. Eğer
  tıklayamıyorsanız, Lütfen tarayıcınızın adres çubuğuna bağlantıyı
  yapıştırınız.\n\n

  Bağlantı : %s \n\n

  Teşekkürler,\n
  HASTAK Kullanıcı İşleri Yönetimi
";
