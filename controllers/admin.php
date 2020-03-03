<?php

require("models/users.php");
require("models/products.php");

$options = ["products", "productDetailAdmin", "productCreate"];

if(!isset($_SESSION["user_id"])) {
	require("models/footer.php");

	$footer = new SocialMedia();
	$social = $footer->get();

	include("views/e401.php"); 
}

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

if(in_array($url_parts[3], $options)) {

	$userModel = new Users();
	$productModel = new Products();

	$user = $userModel->getUserInfo($_SESSION["user_id"]);

	if($url_parts[3] === "products" && $user[0]["admin"] === "1") {
		if(isset($url_parts[4])) {
			require("models/footer.php");

			$footer = new SocialMedia();
			$social = $footer->get();

			include("views/e400.php"); 
		}

		$products = $productModel->getAllProducts();
	}
	else if($url_parts[3] === "productDetailAdmin" && $user[0]["admin"] === "1") {
		
		$detail = $productModel->getDetail($url_parts[4]);
		$sizes = $productModel->getSizes($url_parts[4]);

		if(isset($_POST["send"])) {
			$detail = $productModel->edit($_POST);
		}

		if(empty($detail)) {
			require("models/footer.php");

			$footer = new SocialMedia();
			$social = $footer->get();

			include("views/e404.php"); 
		}	
	}
	else if($url_parts[3] === "productCreate" && $user[0]["admin"] === "1") {

		if(isset($url_parts[4])) {
			require("models/footer.php");

			$footer = new SocialMedia();
			$social = $footer->get();

			include("views/e400.php"); 
		}

		$products = $productModel->getAllProducts();

		if(isset($_POST["send"])) {

			$product = $productModel->create($_POST);

		}	
	}

	else {
		require("models/footer.php");

		$footer = new SocialMedia();
		$social = $footer->get();

		include("views/e401.php"); 
	}
	
	require("models/footer.php");

	$footer = new SocialMedia();
	$social = $footer->get();

	require("views/" . $url_parts[3] . ".php");

}

