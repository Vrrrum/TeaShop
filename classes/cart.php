<?php
class Cart {
    private $conn;
    private $accountId;

    public function __construct($db, $id) {
        $this->conn = $db;
        $this->accountId = $id;
    }

    public function getIdArray() : array{
        $this->conn->query("SELECT `id_cart` FROM carts");
        $result = $this->conn->fetchAll();
        $idArray = array();
        
        foreach ($result as $value) {
            array_push($idArray, $value["id_cart"]);
        }
        return $idArray;
    }

    public function addToCart($productId, $count) {
        $id = $this->accountId;
        $this->conn->query("INSERT INTO carts (`id_account`, `id_product`, `count`)
        VALUES ('$id', '$productId', '$count')");
    }
    public function removeFromCart($productId) {
        $id = $this->accountId;
        $this->conn->query("DELETE FROM carts WHERE `id_account` = '$id' AND `id_product` = '$productId'");
    }
    public function updateCount($productId, $count) {
        $id = $this->accountId;
        $this->conn->query("UPDATE carts SET `count` = $count WHERE `id_account` = '$id' AND `id_product` = '$productId'");
    }

    public function getProductsArray() {
        $id = $this->accountId;
        $this->conn->query("SELECT id_product FROM carts WHERE id_account = $id");
        $productsArray = [];
        
        foreach ($this->conn->fetchAll() as $value) {
            array_push($productsArray, $value["id_product"]);
        }

        return $productsArray;
    }
    public function getCartValue() {
        $id = $this->accountId;
        $this->conn->query("SELECT ROUND(SUM(products.price*carts.count), 2) 'sum' FROM `carts` JOIN products ON carts.id_product = products.id_product WHERE carts.id_account = '$id'");
        return $this->conn->fetchAll()[0]['sum'];
    }
    public function getItemCount($productId) {
        $accountId = $this->accountId;
        $this->conn->query("SELECT count FROM carts WHERE id_product = $productId AND id_account = $accountId");
        return $this->conn->fetchAll()[0]['count'];
    }
}