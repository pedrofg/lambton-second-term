<?php
ini_set("error_log", "../error_log.log");

require '../database/database.php';

$name = $_POST['name'];
$occupation = $_POST['occupation'];
$city = $_POST['city'];
$state = $_POST['state'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$linkedin = $_POST['linkedin'];
$github = $_POST['github'];
$about = $_POST['about'];
$id = 1;

// error_log('$name: '. $name);
// error_log('$occupation: '. $occupation);
// error_log('$city: '. $city);
// error_log('$state: '. $state);
// error_log('$email: '. $email);
// error_log('$phone: '. $phone);
// error_log('$linkedin: '. $linkedin);
// error_log('$github: '. $github);
// error_log('$about: '. $about);

$db = Database::getInstance();
$pdo = $db->getPDO();

$sql = "UPDATE profile SET
        name = :name,
        occupation = :occupation,
        city = :city,
        state = :state,
        email = :email,
        phone = :phone,
        linkedin = :linkedin,
        github = :github,
        about = :about
        WHERE id = :id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':occupation', $occupation, PDO::PARAM_STR);
$stmt->bindParam(':city', $city, PDO::PARAM_STR);
$stmt->bindParam(':state', $state, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
$stmt->bindParam(':linkedin', $linkedin, PDO::PARAM_STR);
$stmt->bindParam(':github', $github, PDO::PARAM_STR);
$stmt->bindParam(':about', $about, PDO::PARAM_STR);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

$return = $stmt->execute();

error_log('Edit Profile: '. $return);

header('Location: ../profile.php?saved='.$return);
exit();

?>