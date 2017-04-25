<?php
require_once 'dao.php';
require_once 'intf.php';
/**
 * UserLog
 */
class UserLogs extends HTS_Model implements IUserLogsModel {

  function __construct() {
    parent::__construct('hts_syscore.hts_user_logs');
    $this->load->model('syscore/user');
    date_default_timezone_set('Europe/Istanbul');
  }

  public function setUserLoginLog($userId) {
    $HtsUserLogsDAO['DATE_LAST_LOGIN'] = date("Y-m-d H:i:s");
    $this->executeUpdate($HtsUserLogsDAO, $userId);
  }

  public function setUserLogoutLog($userId) {
    $HtsUserLogsDAO['DATE_LAST_LOGOUT'] = date("Y-m-d H:i:s");
    $this->executeUpdate($HtsUserLogsDAO, $userId);
  }

  /**
   * PRIVATE METHODS
   */

  private function executeUpdate(&$HtsUserLogsDAO, $userId) {
    if (is_array($HtsUserLogsDAO)) {
      $row = $this->db->get_where($this->getTable(), array('USER_ID' => $userId))->row();
      $HtsUserLogsDAO['USER_ID'] = $userId;
      if (!isset($HtsUserLogsDAO['DATE_LAST_LOGIN'])) {
        $HtsUserLogsDAO['DATE_LAST_LOGIN'] = $row->DATE_LAST_LOGIN;
      }
      elseif (!isset($HtsUserLogsDAO['DATE_LAST_LOGOUT'])) {
        $HtsUserLogsDAO['DATE_LAST_LOGOUT'] = $row->DATE_LAST_LOGOUT;
      }
      if(isset($row)) {
        $this->db->where('USER_ID', $userId);
        $this->db->update($this->getTable(), $HtsUserLogsDAO);
      } else {
        $this->insertData($HtsUserLogsDAO);
      }
    }
  }

}
