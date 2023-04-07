<?php
require "validator.php";

class AccountManager extends Validator {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addAccount($login, $passwd, $email) {
        $date = date("Y-m-d");

        $this->conn->query("INSERT INTO accounts (`login`, `password`, `email`, `creation_time`)
        VALUES ('$login', '$passwd', '$email', '$date')");
    }

    public function validateAccount($login, $passwd) {
        $this->conn->query("SELECT `password` FROM accounts WHERE `login` = '$login'");
        if($this->conn->numRows() == 1) {
            $hash = $this->conn->fetchAll()[0]['password'];
            if(password_verify($passwd, $hash))
                return true;
        }
        return false;
    }

    public function getAccontId($login) {
        $this->conn->query("SELECT `id_account` FROM accounts WHERE `login` = '$login'");
        $id = $this->conn->fetchAll();
        return $id[0]['id_account'];
    }
}