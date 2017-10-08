<?php
  require 'database/database.php';

  $db = Database::getInstance();
  $profile = $db->query('SELECT * FROM profile WHERE id = 1')[0];

  $name = $profile['name'];
  $occupation = $profile['occupation'];
  $city = $profile['city'];
  $state = $profile['state'];
  $email = $profile['email'];
  $phone = $profile['phone'];
  $linkedin = $profile['linkedin'];
  $github = $profile['github'];
  $about = $profile['about'];
  $img_profile = $profile['img_location'];

  $IMG_PATH = 'resources/images/';
?>

<!DOCTYPE html>
<html>

<!-- Head used to set meta tags, title and import some css's -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PGF Resume</title>

  <!-- Bootstrap used to make the whole page responsive and easier to implement using the grid system -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awsome to use some responsive font icons -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Owl carousel used in the portoflio paginated list -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">
  <!-- Style.css used to stylize the page -->
  <link rel="stylesheet" href="style/style.css">

</head>

<body>
  <!-- container is a bootstrap class which avoid the side margins and center the content -->
  <div class="container">

    <header>
      <?php include_once 'navbar.php'; ?>
    </header>