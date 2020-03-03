<?php

require("models/footer.php");

$footer = new SocialMedia();

$social = $footer->get();

if(isset($url_parts[3])) {
	require_once("models/footer.php");

	$footer = new SocialMedia();
	$social = $footer->get();

	require("views/e400.php");
}

require("views/tour.php");
