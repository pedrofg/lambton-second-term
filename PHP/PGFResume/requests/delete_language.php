<?php
ini_set("error_log", "../error_log.log");

require '../database/database.php';

$id = $_POST['id'];

// error_log('$id: '. $id);

$db = Database::getInstance();
$pdo = $db->getPDO();

$sql = "DELETE FROM language WHERE id =  :id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$return = $stmt->execute();

error_log('Delete Language: '. $return);

header('Location: ../language.php');
exit();

?>