<!DOCTYPE html>
<html lang="PT">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $info[0]["username"]; ?>'s Profile | Sabrina Carpenter</title>
		<link rel="icon" type="image/png" href="images/favicon.ico">
		<link rel="stylesheet" href="css/edit.css">
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
			<div id="mainWrapper">
			<div class="mainContainer">
				<h2 class="editProfile">Edit your profile</h2>
				<div class="formContainer">
					<form method="POST" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>">
						<div>
							<label>
								<input type="email" name="email" placeholder="Email Address" value="<?php echo $info[0]["email"]; ?>"></label>
							</label>
						</div>
						<div>
							<label>
								<input type="text" name="username" placeholder="Username" value="<?php echo $info[0]["username"]; ?>"></label>
							</label>
						</div>
						<div>
							<label>
								<input type="password" name="password" required  placeholder="Password"></label>
							</label>
						</div>
						<div>
							<label>
								<input type="password" name="passwordVerify" required placeholder="Password Verify">
							</label>
						</div>
						<div>
							<label>
								<select name="country_code">
<?php
	foreach($countries as $country) {
		echo '
			<option value="'.$country["code"].'">'.$country["name"].'</option>
		';
	}
?>
								</select>
							</label>
						</div>
						<div>
							<label>
								<input type="text" name="address" placeholder="Address" value="<?php echo $info[0]["address"]; ?>"></label>
							</label>
						</div>
						<div>
							<label>
								<input type="text" name="postal_code" placeholder="Zip Code/Postal Code" value="<?php echo $info[0]["postal_code"]; ?>"></label>
							</label>
						</div>
						<div>
							<label>
								<input type="text" name="birthday" placeholder="Your Birthday(DD-MM-YYYY)" value="<?php echo $info[0]["birthday"]; ?>">
							</label>
						</div>
						<div class="buttonContainer">
							<input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"]; ?>">
							<button type="submit" name="send" class="submitBtn">Edit</button>
						</div>
					</form>
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