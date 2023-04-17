<?php 
session_start();
require_once "connect.php";
require_once "classes/product.php";

$product = new Product($db);

$id = $_GET['id'];
$name = $product->getName($id);
$desc = $product->getDescription($id);
$price = $product->getPrice($id);
$image = $product->getImage($id);

if(!$name) {
  header('Location: /shop/404.php');
}
?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <?php require_once "assets/presets/head.php"; ?>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <?php require_once "assets/presets/nav.php"; ?>
    </nav>

    <main class="py-5">
      <div class="container">
          <div class="row">
              <div class="product-img col-8" style="background-image: url('/shop/assets/img/products/<?=$image?>')">
                  
              </div>
              <div class="col-4">
                <h2><?=$name?></h2>
                <span class="h2 font-weight-bold price"><?=$price?> zł</span>
                <p><?=$desc?></p>
                <form action="addToCart.php" method="post">
                  <input class="btn btn-outline-dark" type="submit" value="Dodaj do koszyka">
                  <input type="hidden" name="product_id" value="<?=$id?>">
                </form>
              </div>
          </div>
      </div>
    </main>

    <footer class="py-5 bg-dark fixed-bottom">
      <?php require_once "assets/presets/footer.php"; ?>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  </body>
</html>
