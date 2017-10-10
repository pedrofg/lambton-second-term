<?php
ini_set("error_log", "../error_log.log");

require '../database/database.php';

$target_dir = "../resources/images/resume/";
$file_name = basename($_FILES["image"]["name"]);
$target_file = $target_dir . $file_name;

error_log('$file_name: '. $file_name);
error_log('$target_file: '. $target_file);


move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

$db = Database::getInstance();
$pdo = $db->getPDO();

$sql = "INSERT INTO portfolio (
            img_location) VALUES (
            :img_location)";

$stmt = $pdo->prepare($sql);

$file_dir_db = 'resume/'.$file_name;
$stmt->bindParam(':img_location', $file_dir_db, PDO::PARAM_STR);

$return = $stmt->execute();

error_log('Add Portfolio: '. $return);

header('Location: ../portfolio.php');
exit();

?>