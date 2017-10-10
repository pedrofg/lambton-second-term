<?php
include_once 'header.php';

$db = Database::getInstance();
$products = $db->query('SELECT * FROM product');

$PRODUCT_FILE_PATH = 'resources/';
$PRODUCT_IMAGE_PATH = 'resources/images/';

?>

<div class="row">

  <section class="product-table-section col-md-12" style="margin-top: 30px;">
    <h2 class="title"><i class="fa fa-list" aria-hidden="true" style="margin-right:10px;"></i>Portfolio</h2>
    <table id="product-table" class="table table-striped table-bordered" cellspacing="0" width="100%">

        <thead>
            <tr>
                <th>Name</th>
                <th>Value</th>
                <th>Image</th>
                <th>File</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $product) :
          ?>
            <tr>
                <td><?php echo $product['name'] ?></td>
                <td><?php echo $product['value'] ?></td>
                <td><img src="<?php echo $PRODUCT_IMAGE_PATH.$product['img_location'] ?>" width="300px" height="300px" alt=""></td>
                <td>
                    <a href="<?php echo $PRODUCT_FILE_PATH.$product['file_location'] ?>" class="btn btn-primary" style="color: white;">
                      <i class="fa fa-download" aria-hidden="true"></i>
                    </a>
                </td>
                <td>
                  <form action="requests/delete_product.php" method="post" onSubmit="if(!confirm('Confirm delete of product?')){return false;}">
                    <input type="text" name="id" style="display:none;" value="<?php echo $product["id"] ?>">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                  </form>
                </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
    </table>

  </section>

  <section class="product-insert-section col-md-12" style="margin-top: 30px;">
    <hr>
    <form id="form-product" action="requests/add_product.php" method="post" enctype="multipart/form-data">

      <div class="form-group">
        <h2 class="title"><i class="fa fa-plus-circle" aria-hidden="true" style="margin-right:10px;"></i>Add Product</h2>
      </div>

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" maxlength="100">
      </div>

      <div class="form-group">
        <label for="name">Value</label>
        <input type="number" step="0.01" class="form-control" name="value" maxlength="100">
      </div>

      <div class="form-group">
       <label for="image">Product image</label>
       <input type="file" class="form-control-file" name="image" id="image" aria-describedby="fileHelp">
      </div>

      <div class="form-group">
       <label for="image">Product File</label>
       <input type="file" class="form-control-file" name="file" id="file" aria-describedby="fileHelp">
      </div>


      <div class="form-group text-right">
        <button type="submit" class="btn btn-default float-right">Submit</button>
      </div>
    </form>

  </section>

</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#product-table').DataTable( {
        responsive: true
    } );
  });
</script>