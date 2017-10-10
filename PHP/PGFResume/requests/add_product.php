<?php
ini_set("error_log", "../error_log.log");

require '../database/database.php';

$target_dir_product_image = "../resources/images/products/";
$image_name = basename($_FILES["image"]["name"]);
$target_image = $target_dir_product_image . $image_name;

$target_dir_product_file = "../resources/products/";
$file_name = basename($_FILES["file"]["name"]);
$target_file = $target_dir_product_file . $file_name;


$name = $_POST['name'];
$value = $_POST['value'];

error_log('$image_name: '. $image_name);
error_log('$file_name: '. $file_name);
error_log('$target_image: '. $target_image);
error_log('$target_file: '. $target_file);


move_uploaded_file($_FILES["image"]["tmp_name"], $target_image);
move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

$db = Database::getInstance();
$pdo = $db->getPDO();

$sql = "INSERT INTO product (
            name,
            value,
            img_location,
            file_location) VALUES (
            :name,
            :value,
            :img_location,
            :file_location)";

$stmt = $pdo->prepare($sql);

$img_dir_db = 'products/'.$image_name;
$file_dir_db = 'products/'.$file_name;
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':value', $value, PDO::PARAM_STR);
$stmt->bindParam(':img_location', $img_dir_db, PDO::PARAM_STR);
$stmt->bindParam(':file_location', $file_dir_db, PDO::PARAM_STR);

$return = $stmt->execute();

error_log('Add Product: '. $return);

header('Location: ../product.php');
exit();

?>