<?php
ini_set("error_log", "../error_log.log");

require '../database/database.php';

$id = $_POST['id'];

// error_log('$id: '. $id);

$db = Database::getInstance();
$pdo = $db->getPDO();

$sql = "DELETE FROM education WHERE id =  :id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$return = $stmt->execute();

error_log('Delete Education: '. $return);

header('Location: ../education.php');
exit();

?>