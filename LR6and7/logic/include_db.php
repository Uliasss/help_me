<?php
session_start();
//error_reporting(0);

define('DB_USER', 'root');
define('DB_PASSWORD', '');

try{
    $mysql = new PDO('mysql:host=localhost;dbname=exhibition', DB_USER, DB_PASSWORD);
}   catch (PDOException $e){
    print "Error!: " . $e->getMessage();
    die();
}
?>