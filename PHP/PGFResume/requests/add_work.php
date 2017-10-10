<?php
ini_set("error_log", "../error_log.log");

require '../database/database.php';
require '../util.php';

$position = $_POST['position'];
$company = $_POST['company'];
$date_start = formatDateToDB($_POST['date_start']);
$date_end = formatDateToDB($_POST['date_end']);

$project_name_1 = $_POST['project_name_1'];
$project_link_1 = formatUrl($_POST['project_link_1']);

$project_name_2 = $_POST['project_name_2'];
$project_link_2 = formatUrl($_POST['project_link_2']);

$project_name_3 = $_POST['project_name_3'];
$project_link_3 = formatUrl($_POST['project_link_3']);

$db = Database::getInstance();
$pdo = $db->getPDO();

$sql = "INSERT INTO work (
            date_start,
            date_end,
            position,
            company) VALUES (
            :date_start,
            :date_end,
            :position,
            :company)";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':position', $position, PDO::PARAM_STR);
$stmt->bindParam(':company', $company, PDO::PARAM_STR);
$stmt->bindParam(':date_start', $date_start, PDO::PARAM_STR);
$stmt->bindParam(':date_end', $date_end, PDO::PARAM_STR);

$return = $stmt->execute();
$last_id = $pdo->lastInsertId();

error_log('Add Work: '. $return);
error_log('Added Work: '. $last_id);

if (isset($last_id) && $last_id > 0) {

  if (isset($project_name_1) && isset($project_link_1)) {
    $sql = "INSERT INTO work_link (
                work_id,
                link,
                name) VALUES (
                :work_id,
                :link,
                :name)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':work_id', $last_id, PDO::PARAM_STR);
    $stmt->bindParam(':link', $project_link_1, PDO::PARAM_STR);
    $stmt->bindParam(':name', $project_name_1, PDO::PARAM_STR);

    $return = $stmt->execute();
    error_log('Add Project Work: '. $return);
  }

  if (isset($project_name_2) && isset($project_link_2)) {
    $sql = "INSERT INTO work_link (
                work_id,
                link,
                name) VALUES (
                :work_id,
                :link,
                :name)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':work_id', $last_id, PDO::PARAM_STR);
    $stmt->bindParam(':link', $project_link_2, PDO::PARAM_STR);
    $stmt->bindParam(':name', $project_name_2, PDO::PARAM_STR);

    $return = $stmt->execute();
    error_log('Add Project Work: '. $return);
  }

  if (isset($project_name_3) && isset($project_link_3)) {
    $sql = "INSERT INTO work_link (
                work_id,
                link,
                name) VALUES (
                :work_id,
                :link,
                :name)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':work_id', $last_id, PDO::PARAM_STR);
    $stmt->bindParam(':link', $project_link_3, PDO::PARAM_STR);
    $stmt->bindParam(':name', $project_name_3, PDO::PARAM_STR);

    $return = $stmt->execute();
    error_log('Add Project Work: '. $return);
  }
}


header('Location: ../work.php');
exit();


?>