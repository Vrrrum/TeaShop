<div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/shop/index.php">Czajka</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#!">Strona głowna</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                id="navbarDropdown"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                >Sklep</a
              >
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Wszystkie produkty</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="#!">Popularne produkty</a></li>
                <li><a class="dropdown-item" href="#!">Nowe dostawy</a></li>
              </ul>
            </li>
          </ul>
          <form class="d-flex">
            <?php
            if(isset($_SESSION['isLogged'])) {
            ?>
              <a href="/shop/logout.php" class="p-2">Wyloguj</a>
              <button class="btn btn-outline-dark" type="submit">
                <i class="bi-cart-fill me-1"></i>
                Cart
                <span class="badge bg-dark text-white ms-1 rounded-pill">$</span>
              </button>
            <?php
            } else {
            ?>
              <a href="/shop/login.php" class="p-2">Zaloguj</a>
              <a href="/shop/register.php" class="p-2">Zarejestruj</a>
            <?php 
            } ?>
          </form>
        </div>
      </div>