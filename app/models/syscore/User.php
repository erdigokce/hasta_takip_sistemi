<?php
require_once 'dto.php';
require_once 'intf.php';
/**
 * User Model Page
 */
class User extends HTS_Model implements IUserModel {

  function __construct() {
    parent::__construct('hts_syscore.hts_users');
  }

  public function getUser($selector) {
    if (isset($selector)) {
      if(is_int($selector)){
        return $this->findByPrimaryKey($selector);
      }
      elseif (is_string($selector)) {
        if (!(strpos($selector, "@") === FALSE)) { // Is this string an email?
          $query = $this->db->get_where($this->getTable(), array('USER_EMAIL' => $selector));
        } else { // Or username?
          $query = $this->db->get_where($this->getTable(), array('USERNAME' => $selector));
        }
        $row = $query->row();
        if(isset($row)){
          return $row;
        } else {
          return NULL;
        }
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
