<?php

/**
 * Lost Password English Langauge File
 */

 defined('BASEPATH') OR exit('No direct script access allowed');

$lang['lostpassword_title'] = "Password Restoring System";

$lang['lp_new_password'] = "New Password";
$lang['lp_new_password_retry'] = "New Password (Confirm)";
$lang['lp_new_password_send'] = "Submit Password";
$lang['lp_user_email'] = "E-Mail Address";
$lang['lp_user_email_validate'] = "E-Mail Address (Confirm)";
$lang['lp_user_email_send'] = "Send Mail";
$lang['lp_description'] = "
  A validation link is going to be sent to %s address.
  Please check your inbox...
";
$lang['lp_mail_title'] = base_url()." - Password Reset";
$lang['lp_mail_body'] = "
  Dear %s,\n\n

  If this e-mail does not apply to you please ignore it. It appears that you
  have requested a password reset at our website ".base_url().".\n\n

  To reset your password, please click the link below. If you cannot click it,
  please paste it into your web browser's address bar.\n\n

  Link : %s \n\n

  Thanks,\n
  HASTAK User Affairs Administration
";
