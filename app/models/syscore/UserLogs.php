<?php
require_once 'dao.php';
require_once 'intf.php';
/**
 * UserLog
 */
class UserLogs extends HTS_Model implements IUserLogsModel {

  function __construct() {
    $this->setCurrentDb($this->load->database('syscore', TRUE));
    parent::__construct(HTS_SYSCORE.'.hts_user_logs');
    $this->load->model('syscore/user');
    date_default_timezone_set('Europe/Istanbul');
  }

  public function getUserLog($userId) {
    return $this->getCurrentDb()->get_where($this->getTable(), array('USER_ID' => $userId))->row();
  }

  public function createUserLog($userId) {
    $HtsUserLogsDAO['USER_ID'] = $userId;
    $HtsUserLogsDAO['DATE_LAST_LOGIN'] = date(getDefaultTimeFormat());
    $HtsUserLogsDAO['DATE_LAST_LOGOUT'] = date(getDefaultTimeFormat());
    $this->getCurrentDb()->insert($this->getTable(), $HtsUserLogsDAO);
  }

  public function setUserLoginLog($userId) {
    $HtsUserLogsDAO['DATE_LAST_LOGIN'] = date(getDefaultTimeFormat());
    $this->executeUpdate($HtsUserLogsDAO, $userId);
  }

  public function setUserLogoutLog($userId) {
    $HtsUserLogsDAO['DATE_LAST_LOGOUT'] = date(getDefaultTimeFormat());
    $this->executeUpdate($HtsUserLogsDAO, $userId);
  }

  public function getLastActiveUsers($limit = '5', $orderBy = 'date_last_login', $orderAs = 'desc') {
    $subQuery = "select USER_ID from ".HTS_SYSCORE.".hts_user_logs";
    $query = "select u.NAME, u.SURNAME, ul.DATE_LAST_LOGIN, ul.DATE_LAST_LOGOUT ";
    $query .= "from ".HTS_SYSCORE.".hts_users u, ".HTS_SYSCORE.".hts_user_logs ul ";
    $query .= "where ul.USER_ID = u.ID and ul.USER_ID in (".$subQuery.") ";
    $query .= "order by ".$orderBy." ".$orderAs." limit ".$limit.";";
    $this->setQuery($this->getCurrentDb()->query($query));

    $result = $this->getQuery()->result();
    if(isset($result)){
      return $result;
    } else {
      return NULL;
    }
  }

  /**
   * PRIVATE METHODS
   */

  private function executeUpdate(&$HtsUserLogsDAO, $userId) {
    if (is_array($HtsUserLogsDAO)) {
      $row = $this->getCurrentDb()->get_where($this->getTable(), array('USER_ID' => $userId))->row();
      $HtsUserLogsDAO['USER_ID'] = $userId;
      if (!isset($HtsUserLogsDAO['DATE_LAST_LOGIN'])) {
        $HtsUserLogsDAO['DATE_LAST_LOGIN'] = $row->DATE_LAST_LOGIN;
      }
      elseif (!isset($HtsUserLogsDAO['DATE_LAST_LOGOUT'])) {
        $HtsUserLogsDAO['DATE_LAST_LOGOUT'] = $row->DATE_LAST_LOGOUT;
      }
      if(isset($row)) {
        $this->getCurrentDb()->where('USER_ID', $userId);
        $this->getCurrentDb()->update($this->getTable(), $HtsUserLogsDAO);
      }
    }
  }

}
