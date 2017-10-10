<?php
ini_set("error_log", "../error_log.log");

require '../database/database.php';

$name = $_POST['name'];
$level = $_POST['level'];
$institution = $_POST['institution'];
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];

// error_log('$name: '. $name);
// error_log('$level: '. $level);
// error_log('$institution: '. $institution);
// error_log('$date_start: '. $date_start);
// error_log('$date_end: '. $date_end);

$time_start = strtotime($date_start);
$date_start = date('Y-m-d', $time_start);

$time_end = strtotime($date_end);
$date_end = date('Y-m-d', $time_end);

$db = Database::getInstance();
$pdo = $db->getPDO();

$sql = "INSERT INTO education (
            name,
            level,
            institution,
            date_start,
            date_end) VALUES (
            :name,
            :level,
            :institution,
            :date_start,
            :date_end)";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':level', $level, PDO::PARAM_STR);
$stmt->bindParam(':institution', $institution, PDO::PARAM_STR);
$stmt->bindParam(':date_start', $date_start, PDO::PARAM_STR);
$stmt->bindParam(':date_end', $date_end, PDO::PARAM_STR);

$return = $stmt->execute();

error_log('Add Education: '. $return);

header('Location: ../education.php');
exit();

?>