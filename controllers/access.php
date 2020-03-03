<?php
require("models/users.php");

$options = ["login", "register", "logout"];

if(!isset($url_parts[3])) {
	require("models/footer.php");

	$footer = new SocialMedia();
	$social = $footer->get();

	include("views/e400.php");
}

if(!in_array($url_parts[3],$options)) {
	require("models/footer.php");

	$footer = new SocialMedia();
	$social = $footer->get();

	include("views/e400.php");
}

if(isset($url_parts[4])) {
	require("models/footer.php");

	$footer = new SocialMedia();
	$social = $footer->get();

	include("views/e404.php");
} 

if( in_array($url_parts[3], $options) ) {
	
	$model = new Users();

	$countries = $model->getCountry();

	if( isset($_POST["send"]) ) {
		
		if($url_parts[3] === "register") {

			$status = $model->register($_POST);

			if($status) {

				header("Location: " .ROOT. "access/login");
			}
		}
		else if($url_parts[3] === "login") {
			$status = $model->login($_POST);
			
			if($status) {
				header("Location: " . ROOT);
			}
		}
	}
	
	if($url_parts[3] === "logout") {
		session_destroy();
		header("Location: " . ROOT);
		exit;
	}
	
	require("models/footer.php");

	$footer = new SocialMedia();
	$social = $footer->get();
	
	require("views/" . $url_parts[3] . ".php");
}




