<?php

require_once("base.php");

class Cart extends Base {
	public function setCart($data) { 
		/* Não consegui fazer com que o carrinho guardasse os produtos com os seus respetivos tamanhos */
		if(
			isset($data["send"]) &&
			isset($data["product_id"]) &&
			isset($data["stock_id"]) &&
			is_numeric($data["stock_id"]) &&
			is_numeric($data["stock_id"]) &&
			is_numeric($data["product_id"])
		) {

			$query = $this->db->prepare("
				SELECT
					p.image, p.shop_name AS name, p.price,
					p.product_id, s.stock, s.stock_id, s.size_id
				FROM products p 
				INNER JOIN stocks s USING(product_id)
				WHERE p.product_id = ?
			      AND s.stock_id = ?
		    ");

			$query->execute([
				$data["product_id"], $data["stock_id"]
			]);

			$product = $query->fetchAll(PDO::FETCH_ASSOC);

			if(!empty($product)) {
				$_SESSION["cart"] [$product[0]["product_id"]] = [
					"product_id" => $product[0]["product_id"],
					"stock_id" => $product[0]["stock_id"],
					"image" => $product[0]["image"],
					"name" => $product[0]["name"],
					"price" => $product[0]["price"],
					"quantity" => 1,
					"stock" => $product[0]["stock"]
				];
			}
		}
	}
}
