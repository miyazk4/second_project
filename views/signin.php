<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sabrina Carpenter | Login</title>
		<link rel="icon" type="image/png" href="favicon.ico">
		<link rel="stylesheet" href="css/login.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<script src="js/home.js"></script>
	</head>
	<body>
		<header>
			<div id="headerContainer">
				<div class="logo leftSide">
					<h1>
						<a href="./" class="logo">Sabrina Carpenter</a>
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
											<a href="<?php echo ROOT .'subscribe'?>">Join</a>
										</li>
										<li class="hide">
											<a href="<?php echo ROOT .'login' ?>">Sign In</a>
										</li>
									</div>
								</ul>
							</div>
							<div class="socialContainer">
								<ul class="social inactive">
									<?php
										foreach($social as $media) {
											echo '
												<li>
													<a href="">
														<span class="'.$media["class"].' fa-3x"></span>
													</a>
												</li>
											';
										}
									?>
								</ul>
							</div>
							<div class="socialJoinContainer inactive">
								<div>
									<button type="button" class="socialJoinBtn">
										<a href="">Join</a>
									</button>
								</div>
								<div>
									<button type="button" class="socialJoinBtn">
										<a href="<?php echo ROOT .'login' ?>">Sign In <span class="fas fa-sign-in-alt"></span></a>
									</button>
								</div>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</header>
		<main>
			<div class="mainContainer">
				<div class="loginContainer">
					<div class="socialSign">
						<h2 class="subTitle">Sign in using a social account</h2>
						<div class="socialBtnContainer">
							<button type="button" class="faceButton">
								<a href="./">
									<span class="fab fa-facebook-f"></span>
									Continue with facebook
								</a>
							</button>
						</div>
					</div>
					<div>
						<h2 class="subTitle">Sign in with your member account</h2>
						<form method="post" action="signin.php" class="registrationForm">
							<div class="formField">
								<label>
									<input type="email" name="email" placeholder="Email" class="formInput">
								</label>
							</div>
							<div class="formField">
								<label>
									<input type="password" name="password" placeholder="Password" class="formInput">
								</label>
							</div>
							<div class="termsBox">
								<label>
									<input type="checkbox" name="terms" class="check">
								</label>
								<p><strong>Keep me signed in for two weeks</strong> unless I log out.</p>
								<p>(Uncheck this box if you are on a shared computer)</p>
							</div>
							<div class="btn">
								<button type="submit" name="login">Login</button>
							</div>
							<div class="registrationInfo">
								<p><a href="<?php echo ROOT . 'resetpassword' ?>">Forgot password?</a></p>
								<p><a href="<?php echo ROOT . 'subscribe' ?>">Not registered? Sign up!</a></p>
							</div>
						</form>
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
			<a href="">
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