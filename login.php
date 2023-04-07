<!DOCTYPE html>
<html lang="pl">
  <head>
    <?php require_once "assets/presets/head.php"; ?>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <?php require_once "assets/presets/nav.php"; ?>
    </nav>

    <section class="container text-center login-card">
        <h1>Zaloguj</h1>
          <form action="/shop/login.php" method="POST">
            <label for="login" class="form-label">Login</label>
            <input class="form-control" type="text" name="login">
            <label for="password" class="form-label">Hasło</label>
            <input class="form-control" type="password" name="password">
            <input class="btn btn-dark" type="submit" value="zaloguj">

            <?php
            if(isset($_COOKIE['login_error'])) { ?>
              <div class="alert alert-danger" role="alert">
                <?=$_COOKIE['login_error']?>
              </div>
            <?php
            }
            ?>
          </form>
    </section>

    <footer class="py-5 bg-dark fixed-bottom">
      <?php require_once "assets/presets/footer.php"; ?>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  </body>
</html>

<?php
if(isset($_POST['password']) && isset($_POST['login'])) {
    require_once "connect.php";
    require_once "classes/accountManager.php";
    
    $login = $_POST['login'];
    $passwd = $_POST['password'];

    $account = new AccountManager($db);
    if($account->validateAccount($login, $passwd)) {
        session_start();
        $_SESSION['isLogged'] = true;
        $_SESSION['login'] = $login;
        $_SESSION['account_id'] = $account->getAccontId($login);
        setcookie('login_error', '', -1);
        header('Location: /shop/index.php');
    } else {
        header('Location: /shop/login.php');
        setcookie('login_error', 'Zły login lub hasło!', time()+60*60);
    }
}