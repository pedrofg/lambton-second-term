<?php
include_once 'header.php';

$db = Database::getInstance();
$skills = $db->query('SELECT * FROM skill');

?>

<div class="row">

  <section class="skill-table-section col-md-12" style="margin-top: 30px;">
    <h2 class="title"><i class="fa fa-list" aria-hidden="true" style="margin-right:10px;"></i>Languages</h2>
    <table id="skill-table" class="table table-striped table-bordered" cellspacing="0" width="100%">

        <thead>
            <tr>
                <th>Name</th>
                <th>Years</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($skills as $skill) : ?>
            <tr>
                <td><?php echo $skill["name"] ?></td>
                <td><?php echo $skill["years"] ?></td>
                <td>
                  <form action="requests/delete_skill.php" method="post" onSubmit="if(!confirm('Confirm delete of skill?')){return false;}">
                    <input type="text" name="id" style="display:none;" value="<?php echo $skill["id"] ?>">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                  </form>
                </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
    </table>

  </section>

  <section class="skill-insert-section col-md-12" style="margin-top: 30px;">
    <hr>
    <form id="form-skill" action="requests/add_skill.php" method="post">

      <div class="form-group">
        <h2 class="title"><i class="fa fa-plus-circle" aria-hidden="true" style="margin-right:10px;"></i>Add Skill</h2>
      </div>

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" maxlength="100">
      </div>

      <div class="form-group">
        <label for="years">Years</label>
        <select class="form-control" name="years">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div>

      <div class="form-group text-right">
        <button type="submit" class="btn btn-default float-right">Submit</button>
      </div>
    </form>

  </section>

</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#skill-table').DataTable( {
        responsive: true,
        "order": [[ 1, "desc" ]]
    } );
  });
</script>