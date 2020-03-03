<?php

require("models/cart.php");

$model = new Cart();

if(isset($url_parts[3])) {
	require("models/footer.php");

	$footer = new SocialMedia();
	$social = $footer->get();

	include("views/e400.php");
}

$item = $model->setCart($_POST);

require("views/cart.php");