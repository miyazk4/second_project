<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Your Shopping Cart - Sabrina Carpenter</title>
		<link rel="icon" type="image/png" href="images/favicon.ico">
		<link rel="stylesheet" href="css/cart.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<script>
			const requestDirect = "<?php echo ROOT;?>" + "requests/?";
		</script>
		<script src="js/cart.js"></script>
	</head>
	<body>
<?php
	if(isset($_SESSION["cart"])) {	
?>		<main id="mainContainer">
			<h2 class="myCart">Your cart</h2>
			<form method="post" action="<?php echo ROOT . 'checkout' ?>">	
				<table id="productContainer">
					<tr class="tableRow inactive">
						<th>Product</th>
						<th></th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total</th>
						<th></th>
					</tr>
<?php
	$subtotal = 0;
	foreach($_SESSION["cart"] as $product) {
		$productPrice = $product["price"] * $product["quantity"];
		$subtotal = $subtotal + $productPrice;
		echo '
					<tr data-product_id = '.$product["product_id"].' class="tableRow productRow">
						<td class="imageContainer">
							<a href="'.ROOT . 'productDetail' . '/' . $product["product_id"] . '">
								<img src="images/productImages/'.$product["image"].'" alt="'.$product["name"].'">
							</a>
						</td>
						<td class="productName">'.$product["name"].'</td>
						<td class="productPrice">
							$'.$product["price"].'
						</td>
						<td>
							<input type="number" class="quantity" value="'.$product["quantity"].'" min="1" max="'.$product["stock"].'">
						</td>
						<td>$'.$productPrice.'</td>
						<td>
							<button type="button" class="deleteProduct" data-product_id='.$product["product_id"].'>Remove</button>
						</td>
					</tr>
		';
	}
?>
					<tr class="tableRow totalRow">
						<td colspan="4"></td>
						<td>Subtotal</td>
						<td>$<?php echo number_format($subtotal,2);?></td>
					</tr>
				</table>
				<div class="buttonContainer">
					<a href="<?php echo ROOT . 'shop' ?>" class="formBtnLink">Continue shopping</a>
				</div>
				<div class="buttonContainer">
					<input type="hidden" name="size_id" value="<?php echo $product["size_id"] ?>">
					<input type="hidden" name="stock" value="<?php echo $product["stock_id"]; ?>">
					<button type="submit" name="checkout" class="formBtn">Checkout</button>
				</div>
			</form>
<?php
	}
	else{
		echo '
				<p>Your cart is currently empty.</p>
				<div>
					<a href="'. ROOT . 'shop'.'">Go back shopping</a>
				</div>
		';
	}
?>
		</main>
	</body>
</html>