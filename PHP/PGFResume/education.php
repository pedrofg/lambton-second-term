<?php
include_once 'header.php';
require 'util.php';

$db = Database::getInstance();
$educations = $db->query('SELECT * FROM education');

?>

<div class="row">

  <section class="education-table-section col-md-12" style="margin-top: 30px;">
    <h2 class="title"><i class="fa fa-list" aria-hidden="true" style="margin-right:10px;"></i>Educations</h2>
    <table id="education-table" class="table table-striped table-bordered" cellspacing="0" width="100%">

        <thead>
            <tr>
                <th>Name</th>
                <th>Level</th>
                <th>Institution</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($educations as $education) :
              $date_start = formatDateToScreen($education['date_start']);
              $date_end = formatDateToScreen($education['date_end']);
          ?>
            <tr>
                <td><?php echo $education["name"] ?></td>
                <td><?php echo $education["level"] ?></td>
                <td><?php echo $education["institution"] ?></td>
                <td><?php echo $date_start ?></td>
                <td><?php echo $date_end ?></td>
                <td>
                  <form action="requests/delete_education.php" method="post" onSubmit="if(!confirm('Confirm delete of education?')){return false;}">
                    <input type="text" name="id" style="display:none;" value="<?php echo $education["id"] ?>">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                  </form>
                </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
    </table>

  </section>

  <section class="education-insert-section col-md-12" style="margin-top: 30px;">
    <hr>
    <form id="form-education" action="requests/add_education.php" method="post">

      <div class="form-group">
        <h2 class="title"><i class="fa fa-plus-circle" aria-hidden="true" style="margin-right:10px;"></i>Add Education</h2>
      </div>

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" maxlength="100">
      </div>

      <div class="form-group">
        <label for="level">Level</label>
        <input type="text" class="form-control" name="level" maxlength="100">
      </div>

      <div class="form-group">
        <label for="institution">Institution</label>
        <input type="text" class="form-control" name="institution" maxlength="100">
      </div>

      <div class="form-group">
        <label for="date_start">Start Date</label>
        <div class="input-group">
          <input type="text" class="form-control datepicker" name="date_start" readonly>
          <label class="input-group-addon btn" for="date">
             <span class="fa fa-calendar open-datetimepicker"></span>
          </label>
        </div>
      </div>

      <div class="form-group">
        <label for="date_end">End Date</label>
        <div class="input-group">
          <input type="text" class="form-control datepicker" name="date_end" readonly>
          <label class="input-group-addon btn" for="date">
             <span class="fa fa-calendar open-datetimepicker"></span>
          </label>
        </div>
      </div>

      <div class="form-group text-right">
        <button type="submit" class="btn btn-default float-right">Submit</button>
      </div>
    </form>

  </section>

</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#education-table').DataTable( {
        responsive: true,
        "order": [[ 4, "desc" ]]
    } );
    $('.datepicker').datepicker();
  });
</script>