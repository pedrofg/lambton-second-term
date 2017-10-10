<?php
ini_set("error_log", __DIR__."/error_log.log");

error_log('User starting');

require_once __DIR__.'/database/database.php';
error_log('User require database');
require_once __DIR__.'/session.php';
error_log('User require session');

class User {

    public $id;
    public $email;
    public $password;
    public $is_admin;
    private static $session;
    private static $inst = null;

    public function __construct() {
      error_log('User __construct()');
      User::$session = Session::getInstance();
      $this->loadData();
    }

    public static function getInstance() {
      error_log('User getInstance()');
        if (static::$inst === null) {
            static::$inst = new User();

        }
        return static::$inst;
    }

    private function loadData() {
      error_log('User loadData()');
      $userSession = $this->getUserSession();

      if (isset($userSession) && !isset($this->email) && !isset($this->password)) {
        error_log('User loading data');

        $db = Database::getInstance();
        $pdo = $db->getPDO();

        $user_query = $db->query("SELECT * FROM users WHERE email = '$userSession'");

        if (count($user_query) > 0) {
          $user_query = $user_query[0];
          error_log('user found: '.print_r($user_query, true));

          $this->id = $user_query['id'];
          $this->email = $user_query['email'];
          $this->password = $user_query['password'];
          $this->is_admin = $user_query['is_admin'];
        }

      } else {
          error_log('sessions is empty');
      }
    }

    private function getUserSession() {
      error_log('User getUserSession()');
      return User::$session->get_session_data( User::$session->get_user_session_name() );
    }

    public function isLoggedIn() {
      error_log('calling isLoggedIn');
      $user = $this->getUserSession();
      if (isset($user)) {
        error_log('isLoggedIn true');
        return true;
      }
      error_log('isLoggedIn false');
      return false;
    }

}

?>