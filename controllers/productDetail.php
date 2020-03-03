<?php

require("models/products.php");

$model = new Products();

if(!isset($url_parts[3])) {
	require("models/footer.php");

		$footer = new SocialMedia();
		$social = $footer->get();

		include("views/e400.php");
}

$detail = $model->getDetail($url_parts[3]);
$sizes = $model->getSizes($url_parts[3]);

//var_dump($sizes);

if(empty($detail)) {
	require("models/footer.php");

	$footer = new SocialMedia();
	$social = $footer->get();

	include("views/e404.php");
}

require("views/productDetail.php");