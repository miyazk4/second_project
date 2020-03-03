<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sabrina Carpenter | News </title>
		<link rel="icon" type="image/png" href="images/favicon.ico">
		<link rel="stylesheet" href="css/news.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<script src="js/home.js"></script>
		<script>
			const requestDirect = "<?php echo ROOT;?>" + "requests/?"; // Criada para usar no ficheiro JS, na parte do fetch
			const myRoot = "<?php echo ROOT . 'title' . '/' ?>";
		</script>
		<script src="js/news.js"></script>
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
											<a href="<?php echo ROOT .'subscribe' ?>">Join</a>
										</li>
<?php
	if(isset($_SESSION["user_id"])) {
		echo '
			<li class="hide">
				<a href="'.ROOT. 'access/logout' . '">Log Out</a>
			</li>
			<li class="hide">
				<a href="'.ROOT. 'access/edit' .'">Account</a>
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
			<div>
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
			<div class="banner">
				<img src="images/newsImages/newsbanner.jpg" alt="">
			</div>
			<div class="mainWrapper">
				<div class="newsLink">
					<h1>News</h1>
				</div>
				<div class="newsWrapper">
<?php
	foreach($news as $new) {
		echo '
			<div class="newsInfo" data-news_id='.$new["news_id"].'>
					<div class="newsImageContainer">
						<div class="newsImage">
							<a href="'.ROOT. 'title' . '/' . $new["news_id"]. ' ">
								<img src="images/newsImages/'.$new["image"].'" alt="'.$new["title"].'">
							</a>
						</div>
						<div class="buttonContainer">
							<a href=" '.ROOT . 'title'. '/'. $new["news_id"].' " class="buttonLink">Read More</a>
						</div>
					</div>
					<div class="newsDate">
						<a href="'.ROOT . 'title'. '/'. $new["news_id"].'">'.strftime("%b %d, %Y",strtotime($new["news_date"])).'</a>
					</div>
					<h2 class="newsTitle">
						<a href=" '.ROOT . 'title'. '/'. $new["news_id"].' ">'.$new["title"].'</a>
					</h2>
					<p class="newsDescription">
						<a href=" '.ROOT . 'title'. '/'. $new["news_id"].' ">'.$new["description"].'</a>
					</p>
			</div>
		';
	}				
?>
					<div class="divEnd"></div>
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