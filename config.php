<?php
$currency = 'PLN'; 

$db_username = 's176839';
$db_password = 'DgPir2zw';
$db_name = 's176839';
$db_host = 'sbazy.uek.krakow.pl';
 mysql_connect("sbazy.uek.krakow.pl", "s176839", "DgPir2zw") or die(mysql_error()); 
 mysql_select_db("database_sklep") or die(mysql_error()); 
 mysql_query("SET CHARSET utf8");
 mysql_query("SET NAMES 'utf8' COLLATE 'utf8_polish_ci'"); 
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);
?>
