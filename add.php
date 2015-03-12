<?php 
 include("config.php");
 
 if (isset($_POST['submit'])) { 

 if (!$_POST['username'] | !$_POST['pass'] | !$_POST['pass2'] ) {
 		die('You did not complete all of the required fields');
 	}

 	if (!get_magic_quotes_gpc()) {
 		$_POST['username'] = addslashes($_POST['username']);
 	}
 $usercheck = $_POST['username'];
 $check = mysql_query("SELECT username FROM users WHERE username = '$usercheck'") 
or die(mysql_error());
 $check2 = mysql_num_rows($check);

 if ($check2 != 0) {
 		die('Sorry, the username '.$_POST['username'].' is already in use.');
 				}

 	if ($_POST['pass'] != $_POST['pass2']) {
 		

		header("Location: passNotMatch.html");

 	}

 	$_POST['pass'] = md5($_POST['pass']);
 	if (!get_magic_quotes_gpc()) {
 		$_POST['pass'] = addslashes($_POST['pass']);
 		$_POST['username'] = addslashes($_POST['username']);
 			}

 	$insert = "INSERT INTO users (username, password)
 			VALUES ('".$_POST['username']."', '".$_POST['pass']."')";
 	$add_member = mysql_query($insert);
 	
 header("Location: LogOk.html");


 
 } 
 else 
 {	
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

<body style="background-image: url(img/background.jpg); ">

	<div id="container">
	
		<div id="logo">
		
			<img src="img/logo.png" />
	
		</div>
		
		<div id="nav">
			
<div align=center>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

 <table border="0">

 <tr><td></td><td>
 
 <input type="text" name="username" class="form-control" align="right" placeholder="Podaj login" maxlength="60">

 </td></tr>

 <tr><td ></td><td>
 <br>
 <input type="password" name="pass" class="form-control" placeholder="Twoje tajne haslo" maxlength="10">

 </td></tr>

 <tr><td></td><td>
 <br>
 <input type="password" name="pass2" class="form-control" placeholder="Powtorz tajne haslo" maxlength="10">

 </td></tr>

  <tr><td colspan="2" align="right"> 
 <br>
 <input type="submit" name="submit" class="btn btn-default" value="Rejestruj"> 

 </td></tr> 

</table>

 </form>

</div>

<?php 
 } 
 
 ?> 		
			<div id="przyciski" class ="btn-group-vertical">
			<br>
			<a class="btn btn-primary btn-lg" href="index.php">Strona glowna</a>
			<a class="btn btn-info btn-lg" href="sklep.php">Sklep</a>
			<a class="btn btn-info btn-lg" href="view_cart.php">Koszyk</a>			
			
			</div>
		</div>
	
		<div id="carousel" class="carousel slide" data-ride="carousel">
			<center>
			<marquee>
			<font size="6" color="white" face="High Tower Text">Aktualne hity do wypozyczenia w naszym sklapie</font>
			</center>
			</marquee>
			<ol class="carousel-indicators">
				<li data-target="#carousel" data-slide-to="0" class="active"></li>
				<li data-target="#carousel" data-slide-to="1"></li>
				<li data-target="#carousel" data-slide-to="2"></li>
				<li data-target="#carousel" data-slide-to="3"></li>
				<li data-target="#carousel" data-slide-to="4"></li>
				<li data-target="#carousel" data-slide-to="5"></li>
				<li data-target="#carousel" data-slide-to="6"></li>


			</ol>
		 
	
			<div class="carousel-inner">
			
				<div class="item active">
					<img src="http://www.daswallpaper.de/wallpaper/original/300-rise-of-an-empire-movie-2014.jpg" alt="">
					<div class="carousel-caption">
						<h3></h3>
						<p></p>					
					</div>
						
				</div>
		 
				<div class="item">
					<img src="http://www.daswallpaper.de/wallpaper/original/Avatar.jpg" alt="">
					<div class="carousel-caption">
						<h3></h3>
						<p></p>
					</div>
				</div>
		 
				<div class="item">
					<img src="http://www.daswallpaper.de/wallpaper/original/324028_tachki_multfilm_multik_mashinki_radiator-springs_1920x1080_www.GdeFon.ru_.jpg" alt="">
					<div class="carousel-caption">
						<h3></h3>
						<p></p>
					</div>
					</div>


				<div class="item">
					<img src="http://www.daswallpaper.de/wallpaper/original/artleo.com-4529.jpg" alt="">
					<div class="carousel-caption">
						<h3></h3>
						<p></p>
					</div>
					</div>



				<div class="item">
					<img src="http://www.daswallpaper.de/wallpaper/original/Noah-Movie-2014-Wallpapers.jpg" alt="">
					<div class="carousel-caption">
						<h3></h3>
						<p></p>
					</div>
					</div>


				<div class="item">
					<img src="http://www.daswallpaper.de/wallpaper/original/The-Witcher-3-Cover-Movies-Wallpaper-HD.jpg" alt="">
					<div class="carousel-caption">
						<h3></h3>
						<p></p>
					</div>
					</div>


				<div class="item">
					<img src="http://www.daswallpaper.de/wallpaper/original/iron-man-3-movie-hd-wallpaper.jpg" alt="">
					<div class="carousel-caption">
						<h3></h3>
						<p></p>
					</div>
					</div>


			</div>
 

			<a class="left carousel-control" href="#carousel" data-slide="prev">
				<span class="icon-prev"></span>
			</a>
			<a class="right carousel-control" href="#carousel" data-slide="next">
				<span class="icon-next"></span>
			</a>
			
		</div> 
		
	<!-- Footer Start -->
         <footer id="footer">
            <!-- Footer Top Start -->
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
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>

  <!-- Optionally enable responsive features in IE8 -->
  <script src="js/respond.js"></script>
		
	
</body>


 




