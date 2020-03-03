<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sabrina Carpenter</title>
		<link rel="icon" type="image/png" href="images/favicon.ico">
		<link rel="stylesheet" href="css/home.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<script src="js/home.js"></script>
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
			<div class="carousselContainer">

			<input type="radio" name="images" id="i1" checked>
			<input type="radio" name="images" id="i2">
			<input type="radio" name="images" id="i3">
			<input type="radio" name="images" id="i4">
			<input type="radio" name="images" id="i5">
			<input type="radio" name="images" id="i6">
			
			<div class="img_slide" id="one">
				<img src="images/carousselImages/inmybed.jpg" alt="">
				<label for="i4" class="pre">
					<span class="fas fa-chevron-left fa-4x"></span>
				</label>
				<label for="i2" class="nxt">
					<span class="fas fa-chevron-right fa-4x"></span>
				</label>
			</div>
			<div class="img_slide" id="two">
				<img src="images/carousselImages/singularact2.jpg" alt="">
				<label for="i1" class="pre">
					<span class="fas fa-chevron-left fa-4x"></span>
				</label>
				<label for="i3" class="nxt">
					<span class="fas fa-chevron-right fa-4x"></span>
				</label>
			</div>
			<div class="img_slide" id="three">
				<img src="images/carousselImages/exhale.jpg" alt="">
				<label for="i2" class="pre">
					<span class="fas fa-chevron-left fa-4x"></span>
				</label>
				<label for="i4" class="nxt">
					<span class="fas fa-chevron-right fa-4x"></span>
				</label>
			</div>
			<div class="img_slide" id="four">
				<img src="images/carousselImages/onmyway.jpg" alt="">
				<label for="i3" class="pre">
					<span class="fas fa-chevron-left fa-4x"></span>
				</label>
				<label for="i5" class="nxt">
					<span class="fas fa-chevron-right fa-4x"></span>
				</label>
			</div>
			<div class="img_slide" id="five">
				<img src="images/carousselImages/pushing20.jpg" alt="">
				<label for="i4" class="pre">
					<span class="fas fa-chevron-left fa-4x"></span>
				</label>
				<label for="i6" class="nxt">
					<span class="fas fa-chevron-right fa-4x"></span>
				</label>
			</div>
			<div class="img_slide" id="six">
				<img src="images/carousselImages/sueme.jpg" alt="">
				<label for="i5" class="pre">
					<span class="fas fa-chevron-left fa-4x"></span>
				</label>
				<label for="i1" class="nxt">
					<span class="fas fa-chevron-right fa-4x"></span>
				</label>
			</div>

			<div class="nav">
				<label class="dots" id="dot1" for="i1"></label>
				<label class="dots" id="dot2" for="i2"></label>
				<label class="dots" id="dot3" for="i3"></label>
				<label class="dots" id="dot4" for="i4"></label>
				<label class="dots" id="dot5" for="i5"></label>
				<label class="dots" id="dot6" for="i6"></label>
			</div>
		</div>
			<div class="mainWrapper">
				<div class="newsLink">
					<h1>News</h1>
					<div class="view">
						<a href="<?php echo ROOT . 'news'  ?>">View All News <span class="fas fa-arrow-circle-right"></span></a>
					</div>
				</div>
				<div class="newsWrapper">
<?php
	foreach($data as $news) {
		echo '
			<div class="newsInfo">
					<div class="newsImageContainer">
						<div class="newsImage">
							<a href="'.ROOT. 'title' . '/' . $news["news_id"]. ' ">
								<img src="images/newsImages/'.$news["image"].'" alt="'.$news["title"].'">
							</a>
						</div>
						<div class="buttonContainer">
							<a href=" '.ROOT . 'title'. '/'. $news["news_id"].' " class="buttonLink">Read More</a>
						</div>
					</div>
					<div class="newsDate">
						<a href="'.ROOT . 'title'. '/'. $news["news_id"].'">'.strftime("%b %d, %Y",strtotime($news["news_date"])).'</a>
					</div>
					<h2 class="newsTitle">
						<a href=" '.ROOT . 'title'. '/'. $news["news_id"].' ">'.$news["title"].'</a>
					</h2>
					<p class="newsDescription">
						<a href=" '.ROOT . 'title'. '/'. $news["news_id"].' ">'.$news["description"].'</a>
					</p>
			</div>
		';
	}				
?>

				</div>
				<h1 class="mainTitle">Official Merchandise</h1>
				<div class="productWrapper">
<?php 
	foreach($prod as $p) {
		echo '
			<div class="productInfo">
				<div class="productImage">
					<a href ="'.ROOT. 'productDetail' . '/' . $p["product_id"] .'">
						<img src="images/productImages/'.$p["image"].'" alt="">
					</a>
				</div>
				<p class="productDescription"><a href="">'.$p["name"].'</a></p>
			</div>
		';
	}

?>
				</div>
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