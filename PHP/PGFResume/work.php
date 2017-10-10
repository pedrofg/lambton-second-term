<?php
include_once 'header.php';
require 'util.php';

$db = Database::getInstance();
$works = $db->query('SELECT * FROM work');

?>

<div class="row">

  <section class="work-table-section col-md-12" style="margin-top: 30px;">
    <h2 class="title"><i class="fa fa-list" aria-hidden="true" style="margin-right:10px;"></i>Works</h2>
    <table id="work-table" class="table table-striped table-bordered" cellspacing="0" width="100%">

        <thead>
            <tr>
                <th>Position</th>
                <th>Company</th>
                <th>Projects</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($works as $work) :
              $date_start = formatDateToScreen($work['date_start']);

              if (isset($work['date_end'])) {
                $date_end = formatDateToScreen($work['date_end']);
              } else {
                $date_end = 'PRESENT';
              }

              $work_links = $db->query('SELECT * FROM work_link WHERE work_id='.$work["id"]);
              $work_projects = '';
              foreach ($work_links as $work_link)
                $work_projects .= '<a style="display:block;" target="_blank" href="'.$work_link['link'].'">'.$work_link['name'].'</a> '

          ?>
            <tr>
                <td><?php echo $work["position"] ?></td>
                <td><?php echo $work["company"] ?></td>
                <td><?php echo $work_projects ?></td>
                <td><?php echo $date_start ?></td>
                <td><?php echo $date_end ?></td>
                <td>
                  <form action="requests/delete_work.php" method="post" onSubmit="if(!confirm('Confirm delete of work?')){return false;}">
                    <input type="text" name="id" style="display:none;" value="<?php echo $work["id"] ?>">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                  </form>
                </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
    </table>

  </section>

  <section class="work-insert-section col-md-12" style="margin-top: 30px;">
    <hr>
    <form id="form-work" action="requests/add_work.php" method="post">

      <div class="form-group">
        <h2 class="title"><i class="fa fa-plus-circle" aria-hidden="true" style="margin-right:10px;"></i>Add Work</h2>
      </div>

      <div class="form-group">
        <label for="position">Position</label>
        <input type="text" class="form-control" name="position" maxlength="100">
      </div>

      <div class="form-group">
        <label for="company">Company</label>
        <input type="text" class="form-control" name="company" maxlength="100">
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

      <label>Project #1</label>

      <div class="form-group row">
        <div class="col-md-6">
          <label>Name</label>
          <input type="text" class="form-control" name="project_name_1" maxlength="100">
        </div>

        <div class="col-md-6">
          <label>Link</label>
          <input type="text" class="form-control" name="project_link_1" maxlength="100">
        </div>
      </div>

      <label>Project #2</label>
      <div class="form-group row">
        <div class="col-md-6">
          <label>Name</label>
          <input type="text" class="form-control" name="project_name_2" maxlength="100">
        </div>

        <div class="col-md-6">
          <label>Link</label>
          <input type="text" class="form-control" name="project_link_2" maxlength="100">
        </div>
      </div>

      <label>Project #3</label>
      <div class="form-group row">
        <div class="col-md-6">
          <label>Name</label>
          <input type="text" class="form-control" name="project_name_3" maxlength="100">
        </div>

        <div class="col-md-6">
          <label>Link</label>
          <input type="text" class="form-control" name="project_link_3" maxlength="100">
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

    $('#work-table').DataTable( {
      responsive: true,
      "order": [[ 4, "desc" ]]
    });

    $('.datepicker').datepicker();
  });
</script>