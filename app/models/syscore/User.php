<?php
require_once 'dto.php';
/**
 * User Model Page
 */
class User extends HTS_Model {

  function __construct() {
    parent::__construct('hts_syscore.hts_users');
  }

  public function getUser($id) {
    return $this->findByPrimaryKey($id);
  }

  public function getUser($username, $email = NULL, $password) {
    if(isset($password)){
      if (isset($username)) {
        $query = $this->get_where($this->table, array('USERNAME' => $username, 'PASSWORD' => md5($password)));
      }
      elseif (isset($email)) {
        $query = $this->get_where($this->table, array('USER_EMAIL' => $username, 'PASSWORD' => md5($password)));
      }
      $row = $query->row();
      if(isset($row)){
        return $row;
      } else {
        return NULL;
      }
    }
  }

  public function insertUser($username, $password, $user_category, $user_email) {
    $userDto = new HtsUserDTO(null,$username,md5($password),$user_category,$user_email);
    $this->insertData($userDto);
  }

  public function updateUser($id, $data) {
    $userDto = new HtsUserDTO();
    if (is_array($data)) {
      $userDto->username = $data['username'];
      $userDto->password = md5($data['password']);
      $userDto->user_category = $data['user_category'];
      $userDto->user_email = $data['user_email'];
    }
    if (is_object($data) && $data instanceof HtsUserDTO) {
      return $this->updateData($id, $userDto);
    }
  }

  public function deleteUser($id) {
    return $this->deleteData($id);
  }

}
