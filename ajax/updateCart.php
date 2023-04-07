<?php
session_start();

require_once "../connect.php";
require_once "../classes/cart.php";

if(isset($_POST['product_id']) && $_SESSION['account_id']) {
    $cart = new Cart($db, $_SESSION['account_id']);

    $action = $_POST['action'];
    $product_id = $_POST['product_id'];
    $account_id = $_SESSION['account_id'];
    $data = $_POST['data'];

    if($action == "delete") {
        $cart->removeFromCart($product_id);
    } else if($action == "update") {
        $cart->updateCount($product_id, $data);
    }
}
?>