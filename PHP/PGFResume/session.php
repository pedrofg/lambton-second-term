<?php
class Session {

    private static $USER_SESSION = "user_session";

    public function __construct() {
      if( !isset($_SESSION) ){
        $this->init_session();
      }
    }

    public static function getInstance() {
        static $inst = null;
        if ($inst === null) {
            $inst = new Session();
        }
        return $inst;
    }

    public function init_session() {
      session_start();
    }

    public function session_exist( $session_name ) {
      if ( isset($_SESSION[$session_name]) ) {
        return true;
      } else {
        return false;
      }
    }

    public function set_session_data( $session_name , $data ) {
      $_SESSION[$session_name] = $data;

      error_log('set_session_data: '.$session_name. ' - '.$data);
    }

    public function get_session_data( $session_name ) {
      if (isset( $_SESSION[$session_name])) {
        error_log('get_session_data: '.$_SESSION[$session_name]);
        return $_SESSION[$session_name];
      } else {
        return null;
      }
    }

    public function delete_session( $session_name ) {
      unset($_SESSION[$session_name]);

      error_log('delete_session: '.$session_name);
    }

    public function get_user_session_name() {
      return Session::$USER_SESSION;
    }

}

?>