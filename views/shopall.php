<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sabrina Carpenter - <?php echo $categories[3]["name"]; ?></title>
		<link rel="icon" type="image/png" href="../images/favicon.ico">
		<link rel="stylesheet" href="../css/shop.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	</head>
	<body>
		<header>
			<div id="headerContainer">
				<div class="bannerContainer">
					<div>
						<form method="get" action="shop.php">
							<label>
								<button type="button" class="searchBtn">
									<span class="fas fa-search fa-2x"></span>
								</button>
							</label>
						</form>
					</div>
					<div class="logo">
						<h1>
							<a href="<?php echo ROOT; ?>" class="logo">Sabrina Carpenter</a>
						</h1>
					</div>
					<div class="user">
						<div>
							<a href="<?php echo ROOT . 'access/login' ?>" class="far fa-user fa-2x userSign"></a>
						</div>
						<div>
							<a href="<?php echo ROOT . 'cart' ?>" class="fas fa-shopping-bag fa-2x userCart"></a>
						</div>
					</div>
				</div>
				<nav>
					<ul class="categories">
<?php
	foreach($categories as $category) {
		echo '
			<li>
				<a href="'.ROOT. 'categories/' . mb_strtolower(str_replace(' ', '', $category["name"])) . '" class="categoryName">'.$category["name"].'</a>
			</li>
		';
	}
?>
					</ul>
				</nav>		
			</div>
		</header>
		<main>
			<h2><?php echo $categories[3]["name"]; ?></h2>
			<div class="productsWrapper">
				<div class="products">
<?php
	foreach($products as $product) {
		echo '
			<div class="productOverall">
				<div class="productImage">
					<a href="'. ROOT. 'productDetail' .'/' . $product["product_id"] .'">
						<img src="../images/productImages/'.$product["image"].'" alt="">
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