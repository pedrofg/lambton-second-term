<?php
ini_set("error_log", "../error_log.log");

require '../database/database.php';
require '../util.php';

$target_dir_product_image = "../resources/images/products/";
$image_name = basename($_FILES["image"]["name"]);
$target_image = $target_dir_product_image . $image_name;

$file_name = basename($_FILES["file"]["name"]);

if (!IsNullOrEmptyString($file_name)) {
  $target_dir_product_file = "../resources/products/";
  $target_file = $target_dir_product_file . $file_name;
  move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
  error_log('$file_name: '. $file_name);
  error_log('$target_file: '. $target_file);
}


$name = $_POST['name'];
$value = $_POST['value'];

error_log('$image_name: '. $image_name);
error_log('$target_image: '. $target_image);


move_uploaded_file($_FILES["image"]["tmp_name"], $target_image);


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

$file_dib_db = NULL;
if (!IsNullOrEmptyString($file_name)) {
  $file_dir_db = 'products/'.$file_name;
}

$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':value', $value, PDO::PARAM_STR);
$stmt->bindParam(':img_location', $img_dir_db, PDO::PARAM_STR);
$stmt->bindParam(':file_location', $file_dir_db, PDO::PARAM_STR);

$return = $stmt->execute();

error_log('Add Product: '. $return);

header('Location: ../product.php');
exit();

?>