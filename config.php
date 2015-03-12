<?php
$currency = 'PLN'; 

$db_username = 'root';
$db_password = '';
$db_name = 'database_sklep';
$db_host = 'localhost';
 mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("database_sklep") or die(mysql_error()); 
 mysql_query("SET CHARSET utf8");
 mysql_query("SET NAMES 'utf8' COLLATE 'utf8_polish_ci'"); 
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);
?>