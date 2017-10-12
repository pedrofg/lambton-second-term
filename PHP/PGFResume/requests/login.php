<?php
ini_set("error_log", "../error_log.log");

require '../database/database.php';
require '../session.php';

error_log('Logging in...');

$email = $_POST['email'];
$password = $_POST['password'];

error_log('$email: '. $email);
error_log('$password: '. $password);

$db = Database::getInstance();
$pdo = $db->getPDO();

$user = $db->query("SELECT * FROM users WHERE (email = '$email' OR username = '$email') AND password = '$password'");

if (count($user) == 0) {
  error_log('Loggin error');
  echo 'error';
  exit();
}

$session = Session::getInstance();
$session->set_session_data($session->get_user_session_name(), $email);

header("Refresh:0");
exit();

?>