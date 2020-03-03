<?php

require("models/products.php");

$model = new Products();
$categories = $model->categories();

require("models/orders.php");

$orderModel = new Orders();

if(!isset($_SESSION["user_id"])) { 
	header("Location:" . ROOT . 'access/login');
	exit;
}
else if(!isset($_SESSION["cart"])) {
	header("Location:" . ROOT);
	exit;
}

$makeOrder = $orderModel->makeOrder(); 

require("views/checkout.php");