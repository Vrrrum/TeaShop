<?php 
session_start();
require_once "connect.php";
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

    <header class="py-5">
      <?php require_once "assets/presets/header.php"; ?>
    </header>

    <section class="py-5">
      <?php require_once "assets/presets/products.php"; ?>
    </section>

    <footer class="py-5 bg-dark">
      <?php require_once "assets/presets/footer.php"; ?>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  </body>
</html>
