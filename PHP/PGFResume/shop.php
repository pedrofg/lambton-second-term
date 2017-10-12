<?php
include_once 'header.php';

$query = '';
if (isset($_GET['q'])) {
  $query = $_GET['q'];
}

$db = Database::getInstance();
$products = $db->query("SELECT * FROM product WHERE name LIKE '%$query%' ORDER BY name");
$PRODUCT_IMAGE_PATH = 'resources/images/';

?>

<div class="row">

  <section class="language-table-section col-md-12" style="margin-top: 30px; padding-bottom: 20px;">
    <h2 class="title" style="margin-bottom: 20px;"><i class="fa fa-list" aria-hidden="true" style="margin-right:10px;"></i>Shop Products</h2>

    <form id="form-search" class="form-inline text-right" style="margin-bottom: 20px; margin-right: 10px;">
      <div class="form-group ">
        <input type="text" class="form-control" name="input-search" id="input-search" placeholder="What are you looking for?">
      </div>
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <?php if (count($products) > 0) : ?>
      <div class="grid" style="margin: auto; text-align: center;">
      <?php foreach ($products as $product) : ?>
        <div class="grid-item product-item">
          <input id="product-id" type="text" name="id" style="display:none;" value="<?php echo $product["id"] ?>">
          <img src="<?php echo $PRODUCT_IMAGE_PATH.$product['img_location'] ?>" style="width: 100%; height: 100%;">
          <h4><?php echo $product["name"] ?> - <span style="">$<?php echo $product["value"] ?></span></h4>

          <button type="submit" class="btn btn-success btn-add-cart"><i class="fa fa-cart-plus" aria-hidden="true" style="margin-right:10px;"></i>Add to cart</button>
        </div>
      <?php endforeach; ?>
      </div>
    <?php else : ?>
      <div class="alert alert-info">
        Sorry, there is no product with <strong><?php echo $query ?></strong> in its name.
      </div>
    <?php endif; ?>
  </section>

</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('.grid').masonry({
      itemSelector: '.grid-item'
    });

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

    $("#form-search").submit(function(e) {
        var searchQuery = $('#input-search').val();
        window.location.search = '&q=' + searchQuery;

        e.preventDefault(); // avoid to execute the actual submit of the form.
    });

  });
</script>

<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>