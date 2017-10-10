<?php
ini_set("error_log", "../error_log.log");

require '../session.php';

error_log('loggind out');

$session = Session::getInstance();
$session->delete_session($session->get_user_session_name());

header("Refresh:0");
exit();

?>