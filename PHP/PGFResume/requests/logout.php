<?php
ini_set("error_log", "../error_log.log");

require '../session.php';

error_log('loggind out');

$session = Session::getInstance();
$session->clear_all_session();

header("Refresh:0");
exit();

?>