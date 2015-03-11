<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Sklep z filmami</title>
	<meta name="description" content="Projekt zaliczeniowy"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
		
		<form action="https://ssl.dotpay.pl/" method="post">

			<input type=hidden name="id" value="72890">

			<input type=hidden name="control" value="1234">

			<input type=hidden name="url" value="http://v-ie.uek.krakow.pl/~s176937/sklep/index.php"><br>

			<input type=hidden name="type" value="1">

			<input type=hidden name="txtguzik" value="Powr󴠤o serwisu">

			<input type=hidden name="URLC" value="http://mojaDomena/realizacja.php">

			<input type=hidden name="lang" value="pl">

			<input type=hidden name="potw" value="1">

			<input type=hidden name="email_potw" value="sunder.fresh@gmail.com">

			<textarea style="display:none;" cols="30" rows="5" name="opis" value="Oplata za wyzpozyczenie"> Oplata za wyzpozyczenie</textarea><br>

			<span class="b"></span>

			<?php

			echo '<input type="hidden" name="kwota" value="'.$total.'">'

			?>

			<div id="listing">
			<center><h2> Formularz do zapłaty</h2></center><br>
				
				<div id="formularz">
					<div class="col-xs-8">
					<input class="form-control" name="forename"  placeholder="Podaj imię" maxlength="20" type="text">	   
					</div><br><br>
					<div class="col-xs-8">
					<input name="surname" class="form-control" placeholder="Podaj nazwisko" maxlength="20" type="text">
					</div><br><br>
					<div class="col-xs-8">
					<input class="form-control" name="street" placeholder="Podaj ulicę" maxlength="20" type="text">
					</div><br><br>
					<div class="col-xs-8">
					<input class="form-control" name="street_n1" placeholder="Podaj numer domu" maxlength="20" type="text">
					</div><br><br>
					<div class="col-xs-8">
					<input class="form-control" name="street_n2" placeholder="Podaj numer mieszkania" maxlength="20" type="text">
					</div><br><br>
					<div class="col-xs-8">
					<input class="form-control" name="city" placeholder="Podaj miejscowość" maxlength="20" type="text">
					</div><br><br>
					<div class="col-xs-8">
					<input class="form-control" name="postcode" placeholder="Podaj kod pocztowy" maxlength="20" type="text">
					</div><br><br>
					<div class="col-xs-8">
					<input class="form-control" name="email" placeholder="Podaj email" maxlength="20" type="text">
					</div><br><br>
					<div class="col-xs-8">
					<input class="form-control" name="phone" placeholder="Podaj telefon" maxlength="20" value="+48" type="text">
					</div><br><br>

				</div>
				
				<div id="banki">
					<br>
					<input value="0" name="kanal" checked="checked" type="radio">Karta VISA, MasterCard, EuroCard, JCB<br>
					<input value="1" name="kanal" type="radio">mTransfer<br>
					<input value="2" name="kanal" type="radio">Płacę z Inteligo<br>
					<input value="3" name="kanal" type="radio">Multitransfer<br>
					<input value="6" name="kanal" type="radio">Przelew24 (BZWBK)<br>
					<input value="7" name="kanal" type="radio">ING Bank Śląski "ING Online"<br>
					<input value="8" name="kanal" type="radio">Bank BPH "Sezam"<br>
					<input value="11" name="kanal" type="radio">Przelew lub przekaz pocztowy<br>
					<input value="10" name="kanal" type="radio">Bank Millenium "Millenet"<br>
					<input value="17" name="kanal" type="radio">Plać z Nordea<br>
					<input value="9" name="kanal" type="radio">Pekao24 (Bank Pekao S.A.)<br>
					<input value="13" name="kanal" type="radio">Deutsche Bank PBC S.A.<br>
					<input value="14" name="kanal" type="radio">Kredyt Bank S.A. (KB24)<br>
					<input value="15" name="kanal" type="radio">Inteligo (Bank PKO BP)<br>
					<input value="16" name="kanal" type="radio">Lukas Bank
				</div>
			
				<br>
			
				<div id="koncowy_guzior">
					<br><center>
					<a class="btn btn-primary btn-lg" href="index.php"><i class="fa fa-home fa-fw"></i> Strona Główna</a>
					<a class="btn btn-primary btn-lg" href="sklep.php"><i class="fa fa-book fa-fw"></i> Sklep</a>
					<a class="btn btn-primary btn-lg" href="logout.php"><i class="fa fa-arrow-right"></i> Wyloguj</a>	
					<input class="btn btn-warning btn-lg" type="submit" value=" Zaplać" />
						
				</div>
					
			</div>
		</form>
	</body>
</html>