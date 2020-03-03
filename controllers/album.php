<?php

require("models/discography.php");

$model = new Discography();

if(!isset($url_parts[3])) {
	require("models/footer.php");

	$footer = new SocialMedia();
	$social = $footer->get();

	require("views/e400.php");
}

$detail = $model->getSingular($url_parts[3]);
$tracks = $model->getSingularTrack($url_parts[3]);
$albums = $model->getAlbums();

if(empty($detail)) {
	require("models/footer.php");

	$footer = new SocialMedia();
	$social = $footer->get();

	require("views/e404.php");
}

require("models/footer.php");

$footer = new SocialMedia();

$social = $footer->get();

require("views/album.php");