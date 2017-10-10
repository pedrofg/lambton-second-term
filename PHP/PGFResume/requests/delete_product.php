<?php
ini_set("error_log", "../error_log.log");

require '../database/database.php';

$id = $_POST['id'];

$db = Database::getInstance();
$pdo = $db->getPDO();

$sql = "DELETE FROM product WHERE id =  :id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$return = $stmt->execute();

error_log('Delete Product: '. $return);

header('Location: ../product.php');
exit();

?>