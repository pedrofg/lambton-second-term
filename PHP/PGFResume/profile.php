<?php
include_once 'header.php';

$return = isset($_REQUEST['saved']) ? $_REQUEST['saved'] : null;

?>

<div class="row">
  <section class="personal-section col-md-12" style="margin-top: 30px;">

    <?php if (isset($return)) : ?>
      <?php if ($return == 1) : ?>
        <div class="alert alert-success">
          <strong>Success!</strong> Profile was updated.
        </div>
      <?php else : ?>
        <div class="alert alert-error">
          <strong>Error!</strong> Please try again.
        </div>
      <?php endif; ?>
    <?php endif; ?>

    <form id="form-profile" action="requests/edit_profile.php" method="post">

      <div class="form-group">
        <h2 class="title"><i class="fa fa-edit" aria-hidden="true" style="margin-right:10px;"></i>Edit Profile</h2>
      </div>

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" maxlength="100" value="<?php echo $name ?>">
      </div>

      <div class="form-group">
        <label for="name">Occupation</label>
        <input type="text" class="form-control" name="occupation" maxlength="100" value="<?php echo $occupation ?>">
      </div>

      <div class="form-group">
        <label for="name">City</label>
        <input type="text" class="form-control" name="city" maxlength="100" value="<?php echo $city ?>">
      </div>

      <div class="form-group">
        <label for="name">State</label>
        <input type="text" class="form-control" name="state" maxlength="100" value="<?php echo $state ?>">
      </div>

      <div class="form-group">
        <label for="name">Email</label>
        <input type="text" class="form-control" name="email" maxlength="100" value="<?php echo $email ?>">
      </div>

      <div class="form-group">
        <label for="name">Phone</label>
        <input type="text" class="form-control" name="phone" maxlength="100" value="<?php echo $phone ?>">
      </div>

      <div class="form-group">
        <label for="name">Linkedin</label>
        <input type="text" class="form-control" name="linkedin" maxlength="100" value="<?php echo $linkedin ?>">
      </div>

      <div class="form-group">
        <label for="name">Github</label>
        <input type="text" class="form-control" name="github" maxlength="100" value="<?php echo $github ?>">
      </div>

      <div class="form-group">
        <label for="name">About</label>
        <textarea class="form-control" rows="5" name="about" value=""><?php echo $about ?></textarea>
      </div>

      <div class="form-group text-right">
        <button type="submit" class="btn btn-default float-right">Submit</button>
      </div>
    </form>
  </section>

</div>