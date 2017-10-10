<?php
ini_set("error_log", "../error_log.log");

require '../database/database.php';

$name = $_POST['name'];
$years = $_POST['years'];

$db = Database::getInstance();
$pdo = $db->getPDO();

$sql = "INSERT INTO skill (
            name,
            years) VALUES (
            :name,
            :years)";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':years', $years, PDO::PARAM_INT);

$return = $stmt->execute();

error_log('Add Skill: '. $return);

header('Location: ../skill.php');
exit();

?>