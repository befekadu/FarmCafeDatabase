<?php
/**
 * Created by PhpStorm.
 * Users: Jordan Gaston, Nahome Befekadu
 * Date: 11/22/15
 * Time: 4:49 PM
 */
// Setting the error repoting level
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Start a PHP session
session_start();

//Include globals
include_once "globals.php";

// Create a database object
try{
    $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
    $db = new PDO($dsn, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo 'Connection Failed: '. $e->getMessage();
    exit;
}



?>
