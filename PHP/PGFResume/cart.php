<?php
include_once 'header.php';

$db = Database::getInstance();
$PRODUCT_IMAGE_PATH = 'resources/images/';

include_once 'session.php';
$session = Session::getInstance();
$cart_session = $session->get_session_data($session->get_cart_session_name());

$cart = NULL;
if (strlen($cart_session) > 0) {
  $cart = explode(",", $cart_session);
  // echo print_r($cart, true);
}

$final_value = 0;
?>

<div class="row">

  <section class="cart-table-section col-md-12" style="margin-top: 30px;">
    <h2 class="title"><i class="fa fa-shopping-cart" aria-hidden="true" style="margin-right:10px;"></i>Cart</h2>
    <?php if (isset($cart)) : ?>
      <table id="cart-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
              <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Value</th>
                <th>Action</th>
              </tr>
          </thead>
          <tbody>
            <?php for($i = 0; $i < count($cart); $i++) :
              $product_id = $cart[$i];
              $product = $db->query("SELECT * FROM product WHERE id = $product_id")[0];
              $final_value = $final_value + (float) $product['value'];
            ?>
              <tr>
                  <td><img src="<?php echo $PRODUCT_IMAGE_PATH.$product['img_location'] ?>" width="150px" height="150px"></td>
                  <td><?php echo $product['name'] ?></td>
                  <td><?php echo $product['value'] ?></td>
                  <td>
                    <input id="product-position" type="text" style="display:none;" value="<?php echo $i ?>">
                    <button type="submit" class="btn btn-danger btn-remove-cart">
                      <i class="fa fa-trash" aria-hidden="true" style="margin-right:10px;"></i>Remove from cart
                    </button>
                  </td>
              </tr>
            <?php endfor; ?>

          </tbody>
      </table>
    <?php else : ?>
      <div class="alert alert-info">
        Your cart is empty. Go to <strong><a href="shop.php">Shop</a></strong> to add products.
      </div>
    <?php endif; ?>

  </section>

  <?php if (isset($cart)) : ?>
    <section class="checkout-section col-md-12" style="margin-top: 30px;">
      <hr>

      <form id="form-checkout" action="requests/checkout.php" method="post" enctype="multipart/form-data" onSubmit="if(!confirm('Confirm checkout?')){return false;}">

        <div class="form-group">
          <h2 class="title"><i class="fa fa-money" aria-hidden="true" style="margin-right:10px;"></i>Checkout</h2>
        </div>

        <div class="form-group">
          <label for="name">Total Value: <?php echo number_format($final_value, 2) ?></label>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success">Checkout</button>
        </div>
      </form>

    </section>
  <?php endif; ?>


</div>


<script type="text/javascript">
  $(document).ready(function() {
    $(".btn-remove-cart").click(function(e) {
      if (confirm("Remove item from cart?")) {
        var productPosition = $(this).parent().find("#product-position").val();

        $.ajax({
          type: "POST",
          url: 'requests/remove_cart.php',
          data: {
            product_position: productPosition
          },
          success: function(data) {
            location.reload();
          }
        });
      }
    });

    $('#cart-table').DataTable( {
        responsive: true
    } );

  });
</script>