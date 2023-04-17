<?php

class Admin {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addProduct($name, $quantity, $description, $price, $image) {
        $this->conn->query("INSERT INTO products (`name`, `quantity`, `description`, `price`, `image`)
        VALUES ('$name', '$quantity', '$description', '$price', '$image')");
    }

    public function deleteProduct($id) {
        $this->conn->query("DELETE FROM products WHERE 'id_product' = '$id'");
    }

    public function editUser($id, $login, $passwd, $email) {
        $hash = password_hash($passwd, PASSWORD_DEFAULT);
        $this->conn->query("UPDATE accounts SET `login` = '$login', `password` = '$hash', `email` = '$email' WHERE `id_account` = '$id'");
    }

    public function deleteUser($id) {
        $this->conn->query("DELETE FROM accounts WHERE 'id_accounts' = '$id'");
    }
}