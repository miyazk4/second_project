<?php

require("models/news.php");

$model = new News();

$data = $model->get();

require("models/products.php");

$products = new Products(); // Meu Model

$prod = $products->get();

require("models/footer.php");

$footer = new SocialMedia();

$social = $footer->get();

require("views/home.php");

