<?php 
session_start();

include_once 'Uloga.php';

$putanja="";
// 
$mysql_host = "";
$mysql_database = "";
$mysql_user = "";
$mysql_password = "";
$ida="";


$veza = new PDO(
'mysql:host=' . $mysql_host . ';dbname=' . $mysql_database . ';charset=utf8', 
$mysql_user, 
$mysql_password);
