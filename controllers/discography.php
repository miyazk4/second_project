<?php

require("models/discography.php");

$model = new Discography();

$detail = $model->getDetail();
$tracks = $model->getTracks();
$albums = $model->getAlbums();

require("models/footer.php");

$footer = new SocialMedia();
$social = $footer->get();

if(isset($url_parts[3])) {
	require_once("models/footer.php");

	$footer = new SocialMedia();
	$social = $footer->get();

	require("views/e500.php");
}

require("views/discography.php");