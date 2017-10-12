<?php
ini_set("error_log", "../error_log.log");

require '../database/database.php';
require '../session.php';
require '../util.php';

error_log('Signing up...');

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if (IsNullOrEmptyString($email) || IsNullOrEmptyString($username) || IsNullOrEmptyString($password) || IsNullOrEmptyString($confirm_password)) {
  echo 'All fields are required.';
  exit();
}

if ($password != $confirm_password) {
  echo 'Passwords do not match.';
  exit();
}

error_log('$email: '. $email);
error_log('$username: '. $username);
error_log('$password: '. $password);

$db = Database::getInstance();
$pdo = $db->getPDO();

$user = $db->query("SELECT * FROM users WHERE email = '$email' or username = '$username'");

if (count($user) > 0) {
  error_log('This account already exists: '.$email);
  echo 'This account already exists.';
  exit();
}

error_log('New account');

$sql = "INSERT INTO users (
            email,
            username,
            password) VALUES (
            :email,
            :username,
            :password)";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->bindParam(':password', $password, PDO::PARAM_STR);

$return = $stmt->execute();

error_log('Add User: '. $return);

$session = Session::getInstance();
$session->set_session_data($session->get_user_session_name(), $email);

header("Refresh:0");
exit();

?>