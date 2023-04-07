<?php

class Product {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    protected function makeSelectQuery($row, $id) {
        $this->conn->query("SELECT `$row` FROM products WHERE `id_product` = '$id'");
        if($this->conn->numRows() != 1) return false;

        return $this->conn->fetchAll()[0]["$row"];
    }

    public function getProductsCount() {
        $this->conn->query("SELECT `id_product` FROM products");
        return $this->conn->numRows();
    }
    public function getIdArray() {
        $this->conn->query("SELECT `id_product` FROM products");
        $result = $this->conn->fetchAll();
        $idArray = array();
        
        foreach ($result as $value) {
            array_push($idArray, $value["id_product"]);
        }
        return $idArray;
    }
    public function getName($id) {
        return $this->makeSelectQuery('name', $id);
    }
    public function getDescription($id) {
        return $this->makeSelectQuery('description', $id);
    }
    public function getImage($id) {
        return $this->makeSelectQuery('image', $id);
    }
    public function getPrice($id) {
        return $this->makeSelectQuery('price', $id);
    }
}