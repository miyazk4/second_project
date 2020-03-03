<?php

require("models/news.php");

$model = new News();

/* Como nesta página não vai acontecer algo como news/id; nem news/; apenas dou o bad request  */ 
if(isset($url_parts[3])) {
	require("models/footer.php");

	$footer = new SocialMedia();
	$social = $footer->get();

	require("views/e400.php");
}

$news = $model->getAll();

require("models/footer.php");

$footer = new SocialMedia();

$social = $footer->get();

require("views/news.php");
