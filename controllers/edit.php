<?php

require("models/users.php");

if(!isset($_SESSION["user_id"])) {
	require("models/footer.php");

	$footer = new SocialMedia();
	$social = $footer->get();

	include("views/e401.php");
}

if(isset($url_parts[3])) {
	require("models/footer.php");

	$footer = new SocialMedia();
	$social = $footer->get();

	include("views/e401.php");
}

else{

	$model = new Users();
	$info = $model->getUserInfo($_SESSION["user_id"]);
	
	/*	Servir de auxílio
		print_r($info);
		print_r($_POST);
	*/
	
	$countries = $model->getCountry();

	if(isset($_POST["send"])) {
		$data = $model->edit($_POST);

	}

	require("models/footer.php");

	$footer = new SocialMedia();
	$social = $footer->get();
}

require("views/edit.php");