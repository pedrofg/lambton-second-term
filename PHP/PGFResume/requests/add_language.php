<?php
ini_set("error_log", "../error_log.log");

require '../database/database.php';

$name = $_POST['name'];
$level = $_POST['level'];

// error_log('$name: '. $name);
// error_log('$level: '. $level);
// error_log('$institution: '. $institution);
// error_log('$date_start: '. $date_start);
// error_log('$date_end: '. $date_end);

$db = Database::getInstance();
$pdo = $db->getPDO();

$sql = "INSERT INTO language (
            name,
            level) VALUES (
            :name,
            :level)";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':level', $level, PDO::PARAM_STR);

$return = $stmt->execute();

error_log('Add Language: '. $return);

header('Location: ../language.php');
exit();

?>