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
        )
);

$config['error_prefix'] = '<div class="alert alert-danger alert-dismissable text-left fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
$config['error_suffix'] = '</div>';
