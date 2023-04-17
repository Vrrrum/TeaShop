<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administracyjny</title>
    <link rel="stylesheet" href="/shop/css/admin.css">
</head>
<body>
    <header>
        <h1>Czajka - Admin Panel</h1>
    </header>
    <main>
        <!-- 
            1. Dodaj produkt
            2. Usuń produkt
            2. Edytuj użytkownika
            3. Usuń użytkownika
         -->
        <div>
            <h2>Dodaj produkt:</h2>
            <form action="/shop/adminPanel.php" method="post"  enctype="multipart/form-data">
                <label for="name">Nazwa produktu: </label>
                <input type="text" name="name" id="name" required> <br>
                <label for="price">cena (zł): </label>
                <input type="number" name="price" id="price" required> <br>
                <label for="quantity">ilość: </label>
                <input type="number" name="quantity" id="quantity" required>
                <label for="description">Opis: </label> <br>
                <textarea name="description" id="description" cols="30" rows="10"></textarea required> <br>
                <label for="image">Zdjęcie: </label>
                <input type="file" name="image" id="image" accept="image/png, image/jpeg, image/webp" required><br>
                <input type="submit" name="submit" value="zatwierdź">
                <input type="hidden" name="addProduct" value="1">
            </form>
        </div>
        <div>
            <h2>Usuń produkt:</h2>
            <form action="/shop/adminPanel.php" method="post">
                <label for="id">Id: </label>
                <input type="number" name="id" id="id"> <br>
                <input type="submit" name="submit" value="zatwierdź">
                <input type="hidden" name="deleteProduct" value="1">
            </form>
        </div>
        <div>
            <h2>Edytuj użytkownika:</h2>
            <form action="/shop/adminPanel.php" method="post">
                <label for="id">Id: </label>
                <input type="number" name="id" id="id"> <br> <br>
                <label for="login">login: </label>
                <input type="text" name="login" id="login" required> <br>
                <label for="password">Hasło: </label>
                <input type="password" name="password" id="password" required> <br>
                <label for="email">E-mail: </label>
                <input type="email" name="email" id="email" required> <br>
                <input type="submit" name="submit" value="zatwierdź">
                <input type="hidden" name="editUsr" value="1">
            </form>
        </div>
        <div>
            <h2>Usuń użytkownika:</h2>
            <form action="/shop/adminPanel.php" method="post">
                <label for="id">Id: </label>
                <input type="number" name="id" id="id"> <br>
                <input type="submit" name="submit" value="zatwierdź">
                <input type="hidden" name="deleteUsr" value="1">
            </form>
        </div>
    </main>
</body>
</html>

<?php
require_once "connect.php";
require_once "classes/admin.php";
require_once "classes/product.php";

if(isset($_POST["submit"])) {
    $admin = new Admin($db);
    
    if(isset($_POST["addProduct"])) {
        $name = $_POST["name"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];
        $description = $_POST["description"];
        $img = $_FILES["image"]["tmp_name"];

        $admin->addProduct($name, $quantity, $description, $price, $name . ".jpg");

        // Uploading Photo
        $target_dir = "assets/img/products/";
        $destination = $target_dir . $name;

        if (($img_info = getimagesize($img)) === FALSE)
            die("Image not found or not an image");

        $width = $img_info[0];
        $height = $img_info[1];

        switch ($img_info[2]) {
            case IMAGETYPE_GIF  : $src = imagecreatefromgif($img);  break;
            case IMAGETYPE_JPEG : $src = imagecreatefromjpeg($img); break;
            case IMAGETYPE_PNG  : $src = imagecreatefrompng($img);  break;
            case IMAGETYPE_WEBP  : $src = imagecreatefromwebp($img);  break;
            default : die("Unknown filetype");
        }

        $tmp = imagecreatetruecolor($width, $height);
        imagecopyresampled($tmp, $src, 0, 0, 0, 0, $width, $height, $width, $height);
        imagejpeg($tmp, $destination . ".jpg");
    }

    if(isset($_POST["deleteProduct"])) {
        $id = $_POST["id"];
        $product = new Product($db);

        $admin->deleteProduct($id);

        $image = $product->getImage($id);

        @unlink("assets/img/products/".$image);
    }

    if(isset($_POST["editUsr"])) {
        $id = $_POST["id"];
        $login = $_POST["login"];
        $passwd = $_POST["password"];
        $email = $_POST["email"];

        $admin->editUser($id, $login, $passwd, $email);
    }

    if(isset($_POST["deleteUsr"])) {
        $id = $_POST["id"];

        $admin->deleteUser($id);
    }
}