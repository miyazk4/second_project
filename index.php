<?php

session_start();

define("ROOT", dirname($_SERVER["SCRIPT_NAME"]) . "/");

$controllers = [
	"home",
	"admin", // Criar Produto e Alterar produto
	"edit", // Editar Perfis
	"news",
	"title", // Detail da noticia
	"tour",
	"discography",
	"album",
	"shop",
	"categories", // Apparel, shopall,accessories,music
	"productDetail",
	"cart",
	"checkout",
	"subscribe",
	"access", // Login, register, logout
	"resetpassword",
	"requests"
];

$controller = $controllers[0];

$url_parts = explode("/",$_SERVER["REQUEST_URI"]);

$option = $url_parts[2];

if(		// Se existe e se está dentro do array
	isset($option) && 
	in_array($option, $controllers)
) { 
	$controller = $option;
}
else if(
	empty($option)
) {
	$controller = "home";
} 
else{
	require("models/footer.php");

	$footer = new SocialMedia();
	$social = $footer->get();

	include("views/e404.php");
} 
 

require("controllers/" . $controller . ".php");
?>