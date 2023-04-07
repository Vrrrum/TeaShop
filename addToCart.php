<?php
session_start();
if(!isset($_SESSION['account_id']) || !isset($_POST['product_id'])){
    header("Location: index.php");
    echo "ERROR";
    exit();
}

require_once "connect.php";
require_once "classes/cart.php";

$cart = new Cart($db, $_SESSION['account_id']);
$productId = $_POST['product_id'];

$cart->addToCart($productId, 1);

echo $productId;

header("Location: index.php");