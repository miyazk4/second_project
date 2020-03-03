<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sabrina Carpenter | Discography</title>
		<link rel="icon" type="image/png" href="images/favicon.ico">
		<link rel="stylesheet" href="css/discography.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<script src="js/home.js"></script>
	</head>
	<body>
		<header>
			<div id="headerContainer">
				<div class="logo leftSide">
					<h1>
						<a href="<?php echo ROOT; ?>" class="logo">Sabrina Carpenter</a>
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
											<a href="<?php echo ROOT . 'subscribe'?>">Join</a>
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
			<div class="mainContainer">
				<div class="detailContainer"> 
					<div class="imageContainer">
						<img src="images/albumcovers/<?php echo $detail["image"]; ?>" alt="">
					</div>
					<div class="albumDetail">
						<div>
							<h1><?php echo $detail["name"];?></h1>
						</div>
						<div>
							<p><span class="upper">Album Info</span></p>
						</div>
						<div>
<?php
if(isset($detail["production"])) {
	echo '
		<p><span class="upper">Produced by</span>: '.$detail["production"].'</p>
	';
	
}
	
?>
						</div>
						<div>
<?php
if(isset($detail["engineer"])) {
	echo '
		<p><span class="upper">Engineer</span>: '.$detail["engineer"].'</p>
	';
	
}
	
?>
						</div>
						<div>
							<p><span class="upper">Label</span>: <?php echo $detail["label"]; ?></p>
						</div>
						<div>
<?php
	if(isset($detail["recorded_at"])) {
	echo '
		<p><span class="upper">Recorded at</span>:'.$detail["recorded_at"].'</p>
	';
}

?>
						</div>
					</div>
				</div>
				<div class="trackContainer">
					<h2 class="trackList">Tracklisting:</h2>
					<div class="albumTracks">
						<ul>
<?php
	foreach($tracks as $track) {
		echo '
			<li>
				<span class="track_number">'.$track["track_number"].'</span>
				<span class="track_name">'.$track["name"].'</span>
			</li>
		';
	}
?>
						</ul>
					</div>
				</div>
				<div class="albumListContainer">
					<h2 class="albumList">Album lists</h2>
					<div class="albumCover">
<?php
	foreach($albums as $album) {
		echo '
			<div class="coverContainer">
					<div class="imageContainer">
						<a href="'.ROOT. 'album' . '/' . $album["discography_id"] . '">
							<img src="images/albumcovers/'.$album["image"].'" alt="'.$album["name"].'">
						</a>
					</div>
					<div class="btnContainer">
						<a href="'.ROOT. 'album' . '/' . $album["discography_id"] . '" class="albumName">'.$album["name"].'</a>
					</div>
			</div>
		';
	}
?>
					</div>
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