<?php
session_start();

require_once "../connect.php";
require_once "../classes/cart.php";
require_once "../classes/product.php";

$cart = new Cart($db, $_SESSION['account_id']);
$products = new Product($db);


$productsId = $cart->getProductsArray();
$result = [];

foreach ($productsId as $id) {
    $item = [
                "id" => $id,
                "name" => $products->getName($id),
                "price" => $products->getPrice($id),
                "count" => $cart->getItemCount($id)
            ];
    array_push($result, $item);
}
echo json_encode($result);

