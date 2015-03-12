<?php
session_start();
include_once("config.php");
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
			<a class="btn btn-info btn-lg" href="index.php">Strona główna</a>
			<a class="btn btn-info btn-lg" href="view_cart.php">Koszyk</a>
			<h2>Twój koszyk</h2>
						

							<?php
				if(isset($_SESSION["products"]))
				{
					$total = 0;
					foreach ($_SESSION["products"] as $cart_itm)
					{
				echo '
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>
									'.$cart_itm["name"].'
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									Cena: '.$cart_itm["price"].' zł </br>
								</td>
							</tr>
							<tr>
								<td>
									<span class="remove-itm"><a class="btn btn-danger btn-xs" href="cart_update.php?removep='.$cart_itm["code"].'&return_url=">Usuń</a></span></br></br>
								</td>
							</tr>
					  </table>
						</div>';
						$subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
						$total = ($total + $subtotal);
						
					}

				echo '
				<strong>Suma : '.$total.' zł</strong> </br>
				<div class="btn-toolbar">
					<div class="btn-group">
				<span class="check-out-txt"><a class="btn btn-primary btn-sm" href="view_cart.php">Zatwierdź</a></span>
					</div>
					<div class="btn-group" >
				<span class="empty-cart"><a class="btn btn-primary btn-sm" href="cart_update.php?emptycart=1&rturn_url=">Wyczyść</a></span>
					</div>
				</div>';
					
				}else{
					echo '<center>Wybierz produkt z listy</center>';
				}
				?>
							</div>
							
							

						</div>

						<div id="contentSklep">
							<table class="table table-responsive">
								<thead>
									<tr>
										<th></th>
										<th>Tytuł</th>
										<th>Cena</th>
										<th>Gatunek</th>
										<th>O filmie</th>
										<th>Akcja</th>
									</tr>
								</thead>

							
							
				<?php

					$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
					$results = $mysqli->query("SELECT * FROM products ORDER BY id ASC");
					if ($results) { 
					

						while($obj = $results->fetch_object())
						{
				echo '
							
							<tbody>
									<tr>
										<td>
											<form method="post" action="opis.php" class="form-inline" role="form"> 
											<button type="submit" class="btn btn-primary" style="border: 0;"><img src="img/movies/'.$obj->product_img_name.'"></button>
											<input type="hidden" name="id_filmu" value="'.$obj->id.'" />
											</form>
										</td>
										
										<td>
											'.$obj->product_name.'
										</td>
										
										<td>
											'.$obj->price.' zł
										</td>
										
										<td>
											'.$obj->gatunek.'
										</td>
										
										<td>
											<form method="post" action="opis.php" class="form-inline" role="form"> 
												<button type="submit" class="btn btn-primary btl-sm">Przejdź</button>
												<input type="hidden" name="id_filmu" value="'.$obj->id.'" />
											</form>
										</td>
										
										<form method="post" action="cart_update.php" class="form-inline" role="form">
										
										<td>
											<button name="product_qty" value="1" type="submit" class="btn btn-info">Wypożycz!</button>
										</td>
										
									</tr>
								</tbody>
							<input type="hidden"" name="product_qty" value="1"/>	
							<input type="hidden" name="product_code" value="'.$obj->product_code.'" />
							<input type="hidden" name="type" value="add" />
							<input type="hidden" name="return_url" value="'.$current_url.'" />
							</form>';

						}
					
					}
				?>

					</table> 	
	
	
	
	
	
	</div>


         <footer id="footer">

            <div class="footer-top">
               <div class="container">
                  <div class="row">
                     <section class="col-lg-3 col-md-3 col-xs-12 col-sm-3 footer-one" align="center">
                        <h3>Projekt przygotowali</h3>
                        <p>
						Szymon Sadzik nr:176839 <br />
						Patryk Sroka nr: 176937 <br />
						Kamil Smęt nr: 176901 <br />
                        </p>
						 </section>
						 <section class="col-lg-3 col-md-3 col-xs-12 col-sm-3 footer-two" align="center">
                        <h3>   Social Media</h3>
							<ul id="social">
								<div>
									
									<img src="http://www.awicons.com/free-icons/download/social-media-icons/round-social-icons-by-lokas-software/png/58/facebook.png" alt="facebook" />
									<img src="http://www.awicons.com/free-icons/download/social-media-icons/round-social-icons-by-lokas-software/png/58/google_plus.png" alt="google+" />
									<img src="http://www.awicons.com/free-icons/download/social-media-icons/round-social-icons-by-lokas-software/png/58/twitter.png" alt="twitter" />

								</div>
							</ul>
							</section>
							<section class="col-lg-3 col-md-3 col-xs-12 col-sm-3 footer-three" align="right">
								<h3>Kontakt z Nami</h3>
								<ul class="contact-us">	  
									  <i class="fa fa-map-marker"></i>
									  <p> 
										 <strong class="contact-pad">Adres:</strong> ul. Lokietka 5/44,<br> 30-233 Krakow <br>
										 Polska
									  </p>
								   
										<i class="fa fa-phone"></i>
									    <p><strong>Telefon:</strong> (12) 111-111-11</p>
								   
								   
									    <i class="fa fa-envelope"></i>
									    <p><strong>Email: </strong>
										<a href="mailto:support@wypozycz.pl">support@wypozycz.pl</a></p>
								   
								</ul>
							</section>
							
					</div>
               </div>
            </div>

            <div class="footer-bottom">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6 "> &copy; Copyright 2014 by Pracownia Programowania 5 Team. All Rights Reserved. </div>
                                       </div>
               </div>
            </div>

         </footer>
		 
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