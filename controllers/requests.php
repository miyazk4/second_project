<?php

header("Content-Type: application/json");

if(isset($_POST["request"])) {
	if(
		$_POST["request"] === "changeQuantity" &&
		is_numeric($_POST["product_id"]) &&
		(int)$_POST["quantity"] > 0 &&
		isset($_SESSION["cart"][(int)$_POST["product_id"]]) &&
		$_SESSION["cart"][(int)$_POST["product_id"]]["stock"] >= $_POST["quantity"]
	) {
		$_SESSION["cart"][(int)$_POST["product_id"]]["quantity"] = $_POST["quantity"];
	}
	else if(
		$_POST["request"] === "deleteProduct" &&
		is_numeric($_POST["product_id"]) &&
		isset($_SESSION["cart"][(int)$_POST["product_id"] ]) 
	) {
			
		unset($_SESSION["cart"][(int)$_POST["product_id"] ]);
		// Verificar se era o ultimo produto
		if(empty($_SESSION["cart"])){
			unset($_SESSION["cart"]);
		} 
	}
}
else if(isset($_GET["request"])) {
	if(
		$_GET["request"] === "getMoreNews" &&
		is_numeric($_GET["news_id"]) // o news_id é o que vem no meu moreNews
	){
		require("models/news.php");

		$model = new News();

		$data = $model->getInterval($_GET["news_id"]);

		echo json_encode($data);
	}
}
