<?php
require_once "classes/db.php";

$host = "localhost";
$dbuser = "root";
$dbpass = ''; 
$dbname = 'czajka';

$db = new Db($host, $dbuser, $dbpass, $dbname);