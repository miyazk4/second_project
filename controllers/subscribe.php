<?php

require("models/subscribe.php");

$subscribe = new Subscription();

if(isset($url_parts[3])) {
	require_once("models/footer.php");

	$footer = new SocialMedia();
	$social = $footer->get();

	require("views/e400.php");
}

$details = $subscribe->get();

require("models/footer.php");

$footer = new SocialMedia();

$social = $footer->get();

require("views/subscribe.php");