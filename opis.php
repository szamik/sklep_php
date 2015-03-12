<?php 		
if(isset($_POST['id_filmu'])){
	$id_filmu 	= filter_var($_POST["id_filmu"], FILTER_SANITIZE_NUMBER_INT); 
}

else{
	

session_start();
$id_filmu = $_SESSION["root"];


}



?>
<!DOCTYPE HTML>
<html lang="pl">

<head>
	<meta charset="utf-8" />
	<title>Sklep z filmami</title>
	<meta name="description" content="Projekt zaliczeniowy"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="style.css" type="text/css" />
	</head>

<body>

	<div id="container">
	
		<div id="logo">
		
			<img src="img/logo.png" />
	
		</div>
		
		<div id="nav">
			
			<div id="przyciski" class ="btn-group-vertical">
			<a class="btn btn-primary btn-lg" href="logout.php">Wyloguj</a>
			<a class="btn btn-info btn-lg" href="sklep.php">Sklep</a>
			<a class="btn btn-info btn-lg" href="index.php">Strona główna</a>
			<a class="btn btn-info btn-lg" href="view_cart.php">Koszyk</a>
			<br><br>
			
			<h3> Dodaj recenzję:</h3>
			
			<?php
			echo'		
						<form name="comment" method="post" action="comment.php" onSubmit="return validation()">
							<table>
								<tr>
									<td>Podpisz się: <br><input type="text" name="namename" id="tnameid" style="color:black"></td>
								</tr>
								<tr>
									<td><br>Twoja recenzja:<br><textarea name="message" id="tmessageid" style="color:black" style="resize: none;"></textarea></td>
								 </tr>
								 <tr>
									<td>
										<form action="comment.php" method="post">
											<input type="hidden" name="idfilmu" value='.$id_filmu.'>
											<input class="btn btn-info btn-sm" type="submit" name="submit" id="submit" value="Wyślij recenzję">
										</form>
									</td>
								 
								 </tr>
							</table>
						</form>
						
						</div>
		</div>';
		?>

			<?php // wyświetlanie opisu z bazy danych
				include("config.php");
				if(isset($_POST["id_filmu"]) || $id_filmu)
				{
					$query  = "SELECT opis FROM opisy WHERE id = $id_filmu";
					$result = mysql_query($query)
						or die("<h1>Zapytanie zdechło<h1>");
					while ($row = mysql_fetch_array($result)) 
					{
						echo $row["opis"];
					}

				}
			?>
				
				
			<h2>Recenzje gości</h2>
					
			<?php // wyświetlenie recenzji z bazy
				include("config.php");
				$select=mysql_query("select * from recenzja_$id_filmu");
				while($row=mysql_fetch_array($select))
				{
					echo "<div id='sty'>";
					echo "<div id='nameid'>".$row['name']."</div>";
					echo "<div id='msgid'>".$row['message']."</div>";
					echo "</div><br />";
				}
			?>


			<script type="text/javascript">
			function validation()
			{
				var nam=document.comment.namename.value;
				var nam1=document.getElementById('tnameid');
				if(nam=="")
				{
					document.comment.namename.focus();
					nam1.style.borderColor="#f00";
					return false;
				}
				var nam1=document.getElementById('tnameid');
				nam1.style.borderColor="";
				var mess=document.comment.message.value;
				var mess1=document.getElementById('tmessageid');
				if(mess=="")
				{
					document.comment.message.focus();
					mess1.style.borderColor="#f00";
					return false;
				}
			}
			</script>
				
		
	</div>	
					

    <!-- JavaScript plugins (requires jQuery) -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<!-- JavaScript plugins (requires jQuery) -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
    <!-- Optionally enable responsive features in IE8 -->
    <script src="js/respond.js"></script>
		
	
</body>

</html>