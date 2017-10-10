<?php
include_once 'header.php';

$db = Database::getInstance();
$languages = $db->query('SELECT * FROM language');

?>

<div class="row">

  <section class="language-table-section col-md-12" style="margin-top: 30px;">
    <h2 class="title"><i class="fa fa-list" aria-hidden="true" style="margin-right:10px;"></i>Languages</h2>
    <table id="language-table" class="table table-striped table-bordered" cellspacing="0" width="100%">

        <thead>
            <tr>
                <th>Name</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($languages as $language) : ?>
            <tr>
                <td><?php echo $language["name"] ?></td>
                <td><?php echo $language["level"] ?></td>
                <td>
                  <form action="requests/delete_language.php" method="post" onSubmit="if(!confirm('Confirm delete of language?')){return false;}">
                    <input type="text" name="id" style="display:none;" value="<?php echo $language["id"] ?>">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                  </form>
                </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
    </table>

  </section>

  <section class="language-insert-section col-md-12" style="margin-top: 30px;">
    <hr>
    <form id="form-language" action="requests/add_language.php" method="post">

      <div class="form-group">
        <h2 class="title"><i class="fa fa-plus-circle" aria-hidden="true" style="margin-right:10px;"></i>Add Language</h2>
      </div>

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" maxlength="100">
      </div>

      <div class="form-group">
        <label for="level">Level</label>
        <input type="text" class="form-control" name="level" maxlength="100">
      </div>

      <div class="form-group text-right">
        <button type="submit" class="btn btn-default float-right">Submit</button>
      </div>
    </form>

  </section>

</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#language-table').DataTable( {
        responsive: true
    } );
  });
</script>