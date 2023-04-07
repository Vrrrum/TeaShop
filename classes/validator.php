<?php
class Validator {
    private $conn;

    public function __construct($db) {
        $this->$conn = $db; 
    }

    public function doesLoginExists($login) {
        $this->$conn->query("SELECT `login` FROM accounts WHERE `login`='$login'");
        if($this->numRows() == 0)
            return false; 
        else
            return true;
    }
}