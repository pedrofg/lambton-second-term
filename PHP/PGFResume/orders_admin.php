<?php
include_once 'header.php';
require 'util.php';

$db = Database::getInstance();
$orders = $db->query("SELECT * FROM orders ORDER BY date DESC");


$PRODUCT_FILE_PATH = 'resources/';
$PRODUCT_IMAGE_PATH = 'resources/images/';

?>

<div class="row">

  <section class="orders-table-section col-md-12" style="margin-top: 30px;">
    <h2 class="title"><i class="fa fa-list" aria-hidden="true" style="margin-right:10px;"></i>Orders</h2>
    <?php if (count($orders) > 0) : ?>
      <table id="orders-table" class="table table-striped table-bordered" cellspacing="0" width="100%">

          <thead>
              <tr>
                  <th>User</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Value</th>
                  <th>File</th>
                  <th>Date</th>
              </tr>
          </thead>
          <tbody>
            <?php foreach ($orders as $order) :
              $product = $db->query('SELECT * FROM product WHERE id = '.$order['product_id'])[0];
              $date = formatDateToScreen($order['date']);
              $user = $db->query('SELECT * FROM users WHERE id = '.$order['user_id'])[0];
            ?>
              <tr>
                  <td><?php echo $user['email'] ?></td>
                  <td><img src="<?php echo $PRODUCT_IMAGE_PATH.$product['img_location'] ?>" width="300px" height="300px" alt=""></td>
                  <td><?php echo $product['name'] ?></td>
                  <td><?php echo $product['value'] ?></td>
                  <td>
                    <?php if (isset($product['file_location'])) : ?>
                      <a href="<?php echo $PRODUCT_FILE_PATH.$product['file_location'] ?>" class="btn btn-primary" style="color: white;">
                        <i class="fa fa-download" aria-hidden="true"></i>
                      </a>
                    <?php endif; ?>
                  </td>
                  <td><?php echo $date ?></td>
              </tr>
            <?php endforeach; ?>

          </tbody>
      </table>
    <?php else : ?>
      <div class="alert alert-info">
        You do not have any order. Go to <strong><a href="shop.php">Shop</a></strong> to buy products.
      </div>
    <?php endif; ?>

  </section>

</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#orders-table').DataTable( {
        responsive: true,
        "order": [[ 5, "desc" ]]
    } );
  });
</script>