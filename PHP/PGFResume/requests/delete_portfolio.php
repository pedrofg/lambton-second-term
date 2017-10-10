<?php
ini_set("error_log", "../error_log.log");

require '../database/database.php';

$id = $_POST['id'];

$db = Database::getInstance();
$pdo = $db->getPDO();

$sql = "DELETE FROM portfolio WHERE id =  :id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$return = $stmt->execute();

error_log('Delete Portfolio: '. $return);

header('Location: ../portfolio.php');
exit();

?>