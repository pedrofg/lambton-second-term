<?php
ini_set("error_log", "../error_log.log");

require_once '../database/database.php';

require_once '../session.php';

error_log('Adding to cart...');

$product_id = $_POST['product_id'];

error_log('$product_id: '. $product_id);


$session = Session::getInstance();
$cart_session = $session->get_session_data($session->get_cart_session_name());

$cart = '';
if (isset($cart_session)) {
  $cart = $cart_session.','.$product_id;
} else {
  $cart = $product_id;
}

$session->set_session_data($session->get_cart_session_name(), $cart);

exit();

?>