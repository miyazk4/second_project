<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sabrina Carpenter - <?php echo $detail["s_name"]; ?></title>
		<link rel="icon" type="image/png" href="/segundoprojecto/images/favicon.ico">
		<link rel="stylesheet" href="/segundoprojecto/css/productDetailAdmin.css">
	</head>
	<body>
		<header>
			<div id="headerContainer">
				<div class="logo leftSide">
					<h1>
						<a href="<?php echo ROOT ?>" class="logo">Sabrina Carpenter</a>
					</h1>
				</div>
				<div class="rightSide">
					<nav>
						<div class="hamburger">
							<span></span>
				  			<span></span>
						  	<span></span>
						  	<span></span>
						  	<span></span>
						  	<span></span>
						</div>
						<div class="menuWrapper">
							<div>
								<ul class="menu">
									<div>
										<li>
											<a href="<?php echo ROOT . 'news' ?>">News</a>		
										</li>
										<li>
											<a href="<?php echo ROOT . 'tour' ?>">Tour</a>
										</li>
										<li>
											<a href="<?php echo ROOT . 'discography' ?>">Music</a>
										</li>
										<li>
											<a href="<?php echo ROOT . 'shop' ?>">Shop</a>
										</li>
										<li class="hide">
											<a href="<?php echo ROOT . 'subscribe' ?>">Join</a>
										</li>
<?php
	if(isset($_SESSION["user_id"])) {
		echo '
			<li class="hide">
				<a href="'.ROOT. 'access/logout' . '">Log Out</a>
			</li>
			<li class="hide">
				<a href="'.ROOT. 'edit' .'">Account</a>
			</li>
		';
	}
	else{
		echo '
			<li class="hide">
				<a href="'.ROOT. 'access/login' .'">Sign In</a>
			</li>
		';
	}
?>
									</div>
								</ul>
							</div>
							<div class="socialContainer">
								<ul class="social inactive">
<?php
	foreach($social as $media) {
		echo '
			<li>
				<a href="'.$media["link"].'">
					<span class="'.$media["class"].' fa-3x"></span>
				</a>
			</li>
		';
	}
?>
								</ul>
							</div>
							<div class="socialJoinContainer inactive">
								<div class="buttonContainer">
									<a href="<?php echo ROOT .'subscribe' ?>" class="buttonLink">Join</a>
								</div>
								<div class="buttonContainer">
<?php
	if(isset($_SESSION["user_id"])) {
		echo '
			<div class="signOutContainer">
				<a href="'.ROOT. 'access/logout' .'" class="buttonLink">Log Out <span class="fas fa-sign-out-alt"></span></a>
			</div>
			<div>
				<a href="'.ROOT. 'access/edit' .'" class="buttonLink">Account</a>
			</div>
		';
	}
	else {
		echo '
			<a href="'.ROOT. 'access/login' .'" class="buttonLink">Sign In <span class="fas fa-sign-in-alt" ></span></a>
		';
	}
?>
								</div>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</header>
		<main>
			<div class="mainContainer">
				<h2 class="editProduct">Edit <?php echo $detail["s_name"]; ?></h2>
				<form method="POST" action="<?php echo ROOT . 'admin/productDetailAdmin' . '/' . $detail["product_id"]; ?>" class="formContainer">
					<div>
						<label>
							<input type="text" name="image" placeholder="Image" value="<?php echo $detail["image"]; ?>" required>
						</label>
					</div>
					<div>
						<label>
							<input type="text" name="name" placeholder="Name" value="<?php echo $detail["s_name"]; ?>" required>
						</label>
					</div>
					<div>	
						<label>
							<textarea name="description" placeholder="Description" required><?php echo $detail["description"]; ?></textarea>
						</label>
					</div>
					<div>
						<label>
							<input type="number" name="price" placeholder="Price" value="<?php echo ($detail["price"]);?>" step=.01 required>
							Price $
						</label>
					</div>
					<div>
						<label>
							<input type="number" name="stock" placeholder="Stock" value="<?php echo ($detail["stock"]);?>" required>
							Stock
						</label>
					</div>
					<div>
						<label>
							<input type="number" name="size_id" placeholder="The id of the Size">
							Size
						</label>
					</div>
					<div>
						<label>
							<textarea name="preorder_info" placeholder="Preorder Info"><?php echo $detail["preorder_info"]; ?></textarea>
						</label>
					</div>
					<div class="buttonContainer">
						<button type="submit" name="send" class="editBtn">Edit</button>
					</div>
					<input type="hidden" name="stock_id" value="<?php echo $detail["stock_id"]; ?>">
					<input type="hidden" name="product_id" value="<?php echo $detail["product_id"]; ?>">
				</form>
			</div>
		</main>
		<footer>
			<div class="footerContainer">
				<div class="footerSocial">
					<div>
						<ul>
<?php
	foreach($social as $media) {
	echo '
		<li>
			<a href="'.$media["link"].'">
				<span class="'.$media["class"].' fa-3x"></span>
			</a>
		</li>
	';
	}
?>							
						</ul>
					</div>
					<div class="spotifyWrapper">
						<button type="button" name="spotifyBtn"><span class="fab fa-spotify fa-lg"></span><span class="follow">follow</span></button>
					</div>
				</div>
				<div class="questions">
					<ul>
						<li>
							<a href="">Help</a>
						</li>
						<li>
							<a href="">Terms of Use</a>
						</li>
						<li>
							<a href="">Privacy Policy</a>
						</li>
					</ul>
				</div>
				<div class="copyright">
					<p>Copyright © 2019 Sabrina Carpenter. All Rights Reserved.</p>
				</div>
			</div>
		</footer>
	</body>
</html>