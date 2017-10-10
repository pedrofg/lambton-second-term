<?php
ini_set("error_log", "../error_log.log");

require_once '../database/database.php';

require_once '../session.php';

require_once '../user.php';

error_log('Checking out...');

$session = Session::getInstance();
$cart_session = $session->get_session_data($session->get_cart_session_name());

$cart = explode(",", $cart_session);

$db = Database::getInstance();
$pdo = $db->getPDO();

$user = User::getInstance();
$user_id = $user->id;

for($i = 0; $i < count($cart); $i++) {
  $product_id = $cart[$i];


  $sql = "INSERT INTO orders (
              user_id,
              product_id) VALUES (
              :user_id,
              :product_id)";

  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
  $stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);

  $stmt->execute();
}

$session->delete_session($session->get_cart_session_name());

header('Location: ../cart.php');
exit();

?>