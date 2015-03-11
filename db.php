<?php
//database name --> downdropcomment
//table name --> commenttable
//table values --> name--> varchar(20)
				// job --> varchar (25)
				// message --> varchar (250)

$conn=mysql_connect("sbazy.uek.krakow.pl","s176839","DgPir2zw");
mysql_query("SET CHARSET utf8");
mysql_query("SET NAMES 'utf8' COLLATE 'utf8_polish_ci'"); 
$db=mysql_select_db("s176839",$conn);

?>