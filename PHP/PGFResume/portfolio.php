<?php
include_once 'header.php';

$db = Database::getInstance();
$portfolios = $db->query('SELECT * FROM portfolio');

?>

<div class="row">

  <section class="portfolio-table-section col-md-12" style="margin-top: 30px;">
    <h2 class="title"><i class="fa fa-list" aria-hidden="true" style="margin-right:10px;"></i>Portfolio</h2>
    <table id="portfolio-table" class="table table-striped table-bordered" cellspacing="0" width="100%">

        <thead>
            <tr>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($portfolios as $portfolio) : ?>
            <tr>
                <td><img src="<?php echo $IMG_PATH.$portfolio['img_location'] ?>" width="150px" height="150px" alt=""></td>
                <td>
                  <form action="requests/delete_portfolio.php" method="post" onSubmit="if(!confirm('Confirm delete of portfolio?')){return false;}">
                    <input type="text" name="id" style="display:none;" value="<?php echo $portfolio["id"] ?>">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                  </form>
                </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
    </table>

  </section>

  <section class="portfolio-insert-section col-md-12" style="margin-top: 30px;">
    <hr>
    <form id="form-portfolio" action="requests/add_portfolio.php" method="post" enctype="multipart/form-data">

      <div class="form-group">
        <h2 class="title"><i class="fa fa-plus-circle" aria-hidden="true" style="margin-right:10px;"></i>Add Portfolio</h2>
      </div>

      <div class="form-group">
       <label for="image">Portfolio image</label>
       <input type="file" class="form-control-file" name="image" id="image" aria-describedby="fileHelp">
     </div>


      <div class="form-group text-right">
        <button type="submit" class="btn btn-default float-right">Submit</button>
      </div>
    </form>

  </section>

</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#portfolio-table').DataTable( {
        responsive: true
    } );
  });
</script>