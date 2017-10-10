<?php
ini_set("error_log", "../error_log.log");

require_once '../database/database.php';

require_once '../session.php';

error_log('Removing from cart...');

$product_position = $_POST['product_position'];

error_log('$product_position: '. $product_position);


$session = Session::getInstance();
$cart_session = $session->get_session_data($session->get_cart_session_name());

$cart = explode(",", $cart_session);
unset($cart[$product_position]);

if (count($cart) > 0) {
  $cart_session = implode(',', $cart);
  $session->set_session_data($session->get_cart_session_name(), $cart_session);
} else {
  $session->delete_session($session->get_cart_session_name());
}


exit();

?>