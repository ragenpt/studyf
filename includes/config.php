<?php
ini_set('display_errors', 1); // show errors
error_reporting(-1); // of all levels
date_default_timezone_set('UTC'); // PHP will complain about on this error level
ob_start(); // Turns on output buffering 
session_start();
date_default_timezone_set("America/Toronto");

try{
    $connection = new PDO("mysql:dbname=soen_proj;host=localhost", "root", "");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (PDOException $e) {
    exit("Connection Failed: " . $e->getMessage());
}