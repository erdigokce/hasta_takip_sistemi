<?php

class HtsUserDTO {

  public $id;
  public $username;
  public $password;
  public $user_category;
  public $user_email;

  function __construct($id, $username, $password, $user_category, $user_email) {
    $this->$id = $id;
    $this->$username = $username;
    $this->$password = $password;
    $this->$user_category = $user_category;
    $this->$user_email = $user_email;
  }

}
