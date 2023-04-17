<?php 
session_start();
require_once "connect.php";
require_once "classes/cart.php";

$cart = new Cart($db, $_SESSION['account_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "assets/presets/head.php"; ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <?php require_once "assets/presets/nav.php"; ?>
    </nav>

    <main class="p-3">
        <div class="cartList">
            <!-- <div class="d-flex m-5 justify-content-around">
                <div class="display-5"><p >Herbata bar</p></div>
                <div class="display-5"><p>25zł</p></div>
                <div class="display-5 itemCount">
                    <input value = "1" min="1" type="number" class="cartItem">
                </div>
                <div class="display-5">
                    <button class="btn btn-outline-danger" type="submit">-</button>
                </div>
            </div> -->
        </div>

        <div class="round bg-secondary d-flex flex-row justify-content-around p-2">
            <div><h3 class="text-light" id="final-price">Cena : <?=$cart->getCartValue()?> zł</h3></div>
            <div><button class="btn btn-outline-light" type="submit">Zamów</button></div>
        </div>
    </main>

    <footer class="py-5 bg-dark fixed-bottom">
      <?php require_once "assets/presets/footer.php"; ?>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="js/cart.js"></script>
</body>
</html>