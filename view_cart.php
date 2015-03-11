<?php
$ciacho = $_COOKIE['ID_my_site'];
if (isset($ciacho)) {
} 
else {
header("Location: brakLog.html");

}
?>


<?php
session_start();
include_once("config.php");
?>
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
	<div id="container">	
	
		<div id="koszyk">
			
				
					<?php
					$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
					if(isset($_SESSION["products"]))
					{
						
						echo'
							<table class="table table-responsive">				
							<thead>
									<tr>
										<th>
											<center><h2>Podumowanie zakupów</h2></center>
										</th>
									</tr>
								</thead>
							</table>
							';
						
						$total = 0;
						echo '<form method="post" action="paypal-express-checkout/process.php">';
						$cart_items = 0;
						foreach ($_SESSION["products"] as $cart_itm)
						{
						   $product_code = $cart_itm["code"];
						   $results = $mysqli->query("SELECT product_name, price FROM products WHERE product_code='$product_code' LIMIT 1");
						   $obj = $results->fetch_object();
						   
							echo'
							<div id="produkty">
							<table class="table table-bordered table-hover table-responsive">				
								<tbody>
									<tr class="info" style="padding:10px">
										<td width="200"><p>'.$obj->product_name.'</p> </td>
										<td><p>PLN '.$obj->price.'</p></td>
										<td align="right">
												<a class="btn btn-danger btn-sm" href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">
												<i class="fa fa-trash-o fa-xs"></i> Usuń!</a>
										</td>
									</tr>
								</tbody>
							</table> 
							
							';
							
							
							$subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
							$total = ($total + $subtotal);

							echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$obj->product_name.'" />';
							echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$obj->product_name.'" />';
							echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["qty"].'" />';
							
							$cart_items ++;
							
						}

						echo '
						<table class="table table-bordered table-hover table-responsive">
								<tbody>
									<tr class="danger" style="padding:10px">
										<td width="200"><p>Do zaplaty : </p> </td>
										<td><p>PLN ' .$total.'</p></td>
									</tr>
								</tbody>
							</table> 
							</form>
							</div>
						';
					}else{
					 echo "<h2><center>Koszyk jest pusty, wróć do sklepu i zrób zakupy</center></h2>";
					}
					
					?>
					<br>
					<br>

			
					
		</div>

		
		<?php include ('listing.php'); ?>
		<br>
	
	

	</div>
</body>
</html>
