<?php

interface IUserModel {
  public function getUser($selector);
  public function insertUser($username, $password, $user_category, $user_email);
  public function updateUser($id, $data);
  public function deleteUser($id);
}

interface IUserLogsModel {
  public function setUserLoginLog($id);
  public function setUserLogoutLog($id);
}
