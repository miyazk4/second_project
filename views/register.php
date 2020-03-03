<!DOCTYPE html>
<html lang="PT">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sabrina Carpenter | Subscribe <?php echo $status["email"];?></title>
		<link rel="icon" type="image/png" href="../images/favicon.ico">
		<link rel="stylesheet" href="../css/register.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<script src="../js/home.js"></script>
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
			<a href="'.ROOT. 'access/logout' .'" class="buttonLink">Log Out <span class="fas fa-sign-out-alt"></span></a>
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
				<div class="leftSide">
					<h2 class="createAccount">Create your account</h2>
					<p class="detail">A Sabrina Carpenter Fan Club membership includes exclusive access to Sabrina Carpenter headlining concert ticket presales (8-ticket limit per membeship), a subscription to Sabrina's e-newsletter, a 10% member discount at her online store, and chances to participate in members-only offers and promotions. The Premium Membership Pack also includes an exclusive Sabrina t-shirt! (Gifts will ship approx. 8-10 weeks from purchase.)</p>
					<p class="detail">Please note, when creating your Username, use only letters or numbers. No special characters or punctuation may be used.</p>
				</div>
				<div class="rightSide">
					<div class="facebookContainer">
						<a href="https://www.sabrinacarpenter.com/user/login/facebook" class="facebookBtn">
							<span class="fab fa-facebook-f "></span>Continue with Facebook
						</a>
					</div>
					<div class="formContainer">
						<form method="POST" action="<?php echo ROOT . 'access/register'?>">
							<div>
								<label>
									<input type="email" name="email" required placeholder="Email Address"></label>
								</label>
							</div>
							<div>
								<label>
									<input type="text" name="username" required placeholder="Username"></label>
								</label>
							</div>
							<div>
								<label>
									<input type="password" name="password" required placeholder="Password"></label>
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
									<input type="text" name="address" required placeholder="Address"></label>
								</label>
							</div>
							<div>
								<label>
									<input type="text" name="postal_code" required placeholder="Zip Code/Postal Code"></label>
								</label>
							</div>
							<div>
								<label>
									<input type="text" name="birthday" required placeholder="Your Birthday(DD-MM-YYYY)">
								</label>
							</div>
							<div class="buttonContainer">
								<button type="submit" name="send" class="submitBtn">Next</button>
							</div>
						</form>
					</div>
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