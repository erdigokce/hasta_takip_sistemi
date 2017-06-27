<?php

$config = array(
        'signin' => array(
                array(
                        'field' => 'username',
                        'label' => 'lang:login_username',
                        'rules' => 'trim|required|min_length[3]|max_length[20]'
                ),
                array(
                        'field' => 'password',
                        'label' => 'lang:login_password',
                        'rules' => 'trim|required|min_length[8]'
                )
        ),
        'pw_reset_request' => array(
                array(
                        'field' => 'saveMail',
                        'label' => 'lang:lp_user_email',
                        'rules' => 'trim|required|valid_email'
                ),
                array(
                        'field' => 'saveMailValidate',
                        'label' => 'lang:lp_user_email_validate',
                        'rules' => 'trim|required|valid_email|matches[saveMail]'
                )
        ),
        'new_password_request' => array(
                array(
                        'field' => 'newPassword',
                        'label' => 'lang:lp_new_password',
                        'rules' => 'trim|required|min_length[8]|max_length[32]'
                ),
                array(
                        'field' => 'newPasswordValidate',
                        'label' => 'lang:lp_new_password_retry',
                        'rules' => 'trim|required|matches[newPassword]'
                )
        )
);

$config['error_prefix'] = '<div class="alert alert-danger alert-dismissable text-left fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
$config['error_suffix'] = '</div>';
