<?php

require 'user.php';

$isLoggedIn = false;
$user = User::getInstance();
if ($user->isLoggedIn()) {
  $isLoggedIn = true;
}

?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">PGF Resume</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Resume</a></li>
        <?php if ($isLoggedIn) : ?>
          <?php if ($user->is_admin) : ?>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="education.php">Education</a></li>
            <li><a href="language.php">Languages</a></li>
            <li><a href="work.php">Works</a></li>
            <li><a href="skill.php">Skills</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
            <li><a href="product.php">Products</a></li>
            <li><a href="orders_admin.php">Orders</a></li>
          <?php else : ?>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="orders.php">Orders</a></li>
          <?php endif; ?>
        <?php endif; ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if ($isLoggedIn) : ?>
          <li><p class="navbar-text">Hello! <?php echo $user->username ?></p></li>
          <li><a id="logout-btn" style="cursor: pointer;">Logout</a></li>
        <?php else : ?>
          <li><a id="login-btn" style="cursor: pointer;">Login</a></li>
          <li><a id="sign-up-btn" style="cursor: pointer;">Sign Up</a></li>
        <?php endif; ?>
      </ul>
    </div><!--/.nav-collapse -->
  </div><!--/.container-fluid -->
</nav>


<!-- Modal -->
<div id="signup-modal" class="modal fade" role="dialog" style="display:none;" >
  <div class="modal-dialog" style="width:300px;">

    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-sign-in" aria-hidden="true" style="margin-right:10px;"></i>Sign Up</h4>
      </div>
      <div class="modal-body">
        <form id="form-signup" action="requests/signup.php" method="post">

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" maxlength="100">
          </div>

          <div class="form-group">
            <label for="email">Username</label>
            <input type="text" class="form-control" name="username" maxlength="100">
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" maxlength="100">
          </div>

          <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" maxlength="100">
          </div>

          <div id="signup-error" class="alert alert-danger" style="display: none;">
            <strong>Error!</strong> <span>This account already exists.</span>
          </div>

          <div class="form-group text-right">
            <button type="submit" class="btn btn-default float-right">Submit</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>


<!-- Modal -->
<div id="login-modal" class="modal fade" role="dialog" style="display:none;" >
  <div class="modal-dialog" style="width:300px;">

    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-sign-in" aria-hidden="true" style="margin-right:10px;"></i>Login</h4>
      </div>
      <div class="modal-body">
        <form id="form-login" action="requests/login.php" method="post">

          <div class="form-group">
            <label for="name">Email or Username</label>
            <input type="text" class="form-control" name="email" maxlength="100">
          </div>

          <div class="form-group">
            <label for="level">Password</label>
            <input type="password" class="form-control" name="password" maxlength="100">
          </div>

          <div id="login-error" class="alert alert-danger" style="display: none;">
            <strong>Error!</strong> Wrong Password.
          </div>

          <div class="form-group text-right">
            <button type="submit" class="btn btn-default float-right">Submit</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('li.active').removeClass('active');

    var screenFileName = location.pathname.split("/").pop();
    $('a[href="' + screenFileName + '"]').closest('li').addClass('active');


    $("#sign-up-btn").click(function(e) {
      $('#signup-modal').appendTo("body").modal('show');
    });

    $("#login-btn").click(function(e) {
      $('#login-modal').appendTo("body").modal('show');
    });

    $("#logout-btn").click(function(e) {

      $.ajax({
        type: "POST",
        url: 'requests/logout.php',
        success: function(data) {
          location.replace('index.php');
        }
      });
    });

    $("#form-login").submit(function(e) {

        $.ajax({
          type: "POST",
          url: $("#form-login").attr("action"),
          data: $("#form-login").serialize(),
          success: function(data) {
             if (data == "error") {
               $("#login-error").show();
             } else {
               $("#login-modal").modal('hide');
               location.replace('index.php');
             }
          }
        });

        e.preventDefault(); // avoid to execute the actual submit of the form.
    });

    $("#form-signup").submit(function(e) {

        $.ajax({
          type: "POST",
          url: $("#form-signup").attr("action"),
          data: $("#form-signup").serialize(),
          success: function(data) {
             if (data) {
               $("#signup-error").show();
               $("#signup-error span").text(data);
             } else {
               $("#signup-modal").modal('hide');
               location.replace('index.php');
             }
          }
        });

        e.preventDefault(); // avoid to execute the actual submit of the form.
    });
  });
</script>