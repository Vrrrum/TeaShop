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
        <h1>Zarejestruj</h1>
          <form action="/shop/register.php" method="POST">
            <label for="login" class="form-label">Login</label>
            <input class="form-control" type="text" name="login">
            <label for="email" class="form-label">E-mail</label>
            <input class="form-control" type="text" name="email">
            <label for="password" class="form-label">Hasło</label>
            <input class="form-control" type="password" name="password">
            <label for="re-password" class="form-label">Powtórz hasło</label>
            <input class="form-control" type="password" name="re-password">  
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

  if($_POST['password'] == $_POST['re-password']) {
    $login = $_POST['login'];
    $passwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
  
    $account = new AccountManager($db);
    $account->addAccount($login, $passwd, $email);

    header('Location: /shop/login.php');
    setcookie('login_error', '', -1);
  } else {
    header('Location: /shop/register.php');
    setcookie('login_error', 'Hasła nie są identyczne!', time()+60*60);
  }
}