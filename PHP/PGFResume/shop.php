<?php
include_once 'header.php';

$db = Database::getInstance();
$products = $db->query('SELECT * FROM product');
$PRODUCT_IMAGE_PATH = 'resources/images/';

?>

<div class="row">

  <section class="language-table-section col-md-12" style="margin-top: 30px; padding-bottom: 20px;">
    <h2 class="title" style="margin-bottom: 20px;"><i class="fa fa-list" aria-hidden="true" style="margin-right:10px;"></i>Shop Products</h2>
          <?php foreach ($products as $product) : ?>
            <div class="product-item col-md-4">
              <input id="product-id" type="text" name="id" style="display:none;" value="<?php echo $product["id"] ?>">
              <img src="<?php echo $PRODUCT_IMAGE_PATH.$product['img_location'] ?>" style="width: 100%; height: 100%;">
              <h4><?php echo $product["name"] ?> - <span style="">$<?php echo $product["value"] ?></span></h4>

              <button type="submit" class="btn btn-success btn-add-cart"><i class="fa fa-cart-plus" aria-hidden="true" style="margin-right:10px;"></i>Add to cart</button>
            </div>

          <?php endforeach; ?>

  </section>

</div>


<script type="text/javascript">
  $(document).ready(function() {
    $(".btn-add-cart").click(function(e) {
      var productID = $(this).parent().find("#product-id").val();

      $.ajax({
        type: "POST",
        url: 'requests/add_cart.php',
        data: {
          product_id: productID
        },
        success: function(data) {
          alert('Product added to cart');
        }
      });
    });
  });
</script>