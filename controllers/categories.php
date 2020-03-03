<?php

require("models/products.php");

$options = ["shopall", "apparel", "music", "accessories"];

if(!isset($url_parts[3])) {
		require("models/footer.php");

		$footer = new SocialMedia();
		$social = $footer->get();

		include("views/e400.php");
}

if(!in_array($url_parts[3], $options)) {
		require("models/footer.php");

		$footer = new SocialMedia();
		$social = $footer->get();

		include("views/e400.php");
	}

if(in_array($url_parts[3], $options)) {	
	if(isset($url_parts[4])) {
		require("models/footer.php");

		$footer = new SocialMedia();
		$social = $footer->get();

		include("views/e500.php");
	}

	$model = new Products();

	$categories = $model->categories();
	$products = $model->home();

	if($url_parts[3] === "apparel") {
		$products = $model->getApparel();
	}
	if($url_parts[3] === "music") {
		$products = $model->getMusic();
	}
	if($url_parts[3] === "accessories") {
		$products = $model->getAccessories();
	}
	if($url_parts[3] === "shopall") {
		$products = $model->shopAll();
	}

	require("views/" . $url_parts[3] . ".php");	
}

