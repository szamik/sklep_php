<?php
include("config.php");
if(isset($_POST['submit']))
{
	$idfilmu = filter_var($_POST["idfilmu"], FILTER_SANITIZE_NUMBER_INT);
	$name=$_POST['namename'];
	$message=$_POST['message'];
	$insert=mysql_query("insert into recenzja_$idfilmu(name,message)values('$name','$message')")or die(mysql_error());

session_start();
$_SESSION["root"] = $idfilmu;

header('Location:opis.php');

	}
?>