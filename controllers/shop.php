<?php

require("models/products.php");

$model = new Products();

if(isset($url_parts[3])) {
	require("models/footer.php");

	$footer = new SocialMedia();
	$social = $footer->get();

	include("views/e400.php");
}

$categories = $model->categories();
$products = $model->home();

require("views/shop.php");

