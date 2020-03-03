<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sabrina Carpenter Shop</title>
		<link rel="icon" type="image/png" href="images/favicon.ico">
		<link rel="stylesheet" href="css/shop.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<script src="js/shop.js"></script>
	</head>
	<body>
		<header>
			<div id="headerContainer">
					<div class="bannerContainer">
						<div>
							<form method="GET" action="shop.php" role="search">
								<label>
									<input type="text" name="searchEngine" placeholder="Search" class="inactive search">
									<div>
										<button type="submit" class="searchBtn">
											<span class="fas fa-search fa-2x"></span>
										</button>
									</div>
								</label>
							</form>
						</div>
						<div class="logo">
							<h1>
								<a href="<?php echo ROOT; ?>" class="logo">Sabrina Carpenter</a>
							</h1>
						</div>
						<div class="user">
							<ul>
<?php
	if(isset($_SESSION["user_id"])) {
		echo '
			<li class="hide">
				<a href="'. ROOT .'" class="far fa-user fa-2x userSignned"></a>
			</li>
		';
	}
	else{
		echo '
			<li class="hide">
				<a href="'. ROOT . 'access/login' . '" class="far fa-user fa-2x userSign"></a>
			</li>
		';
	}
?>
							</ul>
							<div>
								<a href="<?php echo ROOT . 'cart'; ?>" class="fas fa-shopping-bag fa-2x userCart"></a>
							</div>
						</div>
					</div>

						<ul class="categories">
<?php
	foreach($categories as $category) {
		echo '
			<li>
				<a href="'.ROOT. 'categories' . '/' . mb_strtolower(str_replace(' ', '', $category["name"])) . '" class="categoryName">'.$category["name"].'</a>
			</li>
		';
	}
?>
						</ul>
		</header>
		<main>
			<div class="productsWrapper">
				<div class="products">
<?php
	foreach($products as $product) {
		echo '
			<div class="productOverall">
				<div class="productImage">
					<a href="'. ROOT. 'productDetail' .'/' . $product["product_id"] .'">
						<img src="images/productImages/'.$product["image"].'" alt="">
					</a>
				</div>
				<div class="details">
					<div>
						<p class="productName">
							<a href="'. ROOT. 'productDetail' .'/' . $product["product_id"] .'">'.$product["s_name"].'</a>
						</p>
					</div>
					<div>
						<a href="'. ROOT. 'productDetail' .'/' . $product["product_id"] .'">$'.$product["price"].'</a>
					</div>
				</div>
			</div>
		';
	}
?>
				</div>
			</div>
		</main>
		<footer>
			<ul class="questions">
				<li>
					<a href="">Terms and Conditions</a>
				</li>
				<li>
					<a href="">Privacy Policy</a>
				</li>
				<li>
					<a href="">Support</a>
				</li>
			</ul>
			<div class="copyrightContainer">
				<p>© 2019, <a href="<?php echo ROOT . 'shop' ?>">Sabrina Carpenter</a></p>
				<p>Powered by Live Nation Merchandise</p>
			</div>
		</footer>
	</body>
</html>