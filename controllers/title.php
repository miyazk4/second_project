<?php

require("models/news.php");

$model = new News();


if(!isset($url_parts[3])){
	require("models/footer.php");

	$footer = new SocialMedia();
	$social = $footer->get();

	require("views/e400.php");
} 

$news = $model->getSingular($url_parts[3]);

if(empty($news)){
	require("models/footer.php");

	$footer = new SocialMedia();
	$social = $footer->get();

	require("views/e404.php");
}

require("models/footer.php");

$footer = new SocialMedia();

$social = $footer->get();

require("views/newsDetail.php");