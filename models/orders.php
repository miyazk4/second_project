<?php

require_once("base.php");

class Orders extends Base {
	
	public function makeOrder(){
		//1a Parte -> Inserir na table Orders
		$query = $this->db->prepare("
			INSERT INTO orders
			(user_id)
			VALUES(?)
		");

		$query->execute([
			$_SESSION["user_id"]
		]);

		$order_id = $this->db->lastInsertId();

		// 2a Parte -> Por cada linha do carrinho, inserir na order details
		foreach($_SESSION["cart"] as $order) {

			
			$query = $this->db->prepare("
				INSERT INTO order_details
				(order_id,product_id,quantity,price)
				VALUES(?,?,?,?)
			");

			$query->execute([
				$order_id,
				$order["product_id"],
				$order["quantity"],
				$order["price"] * $order["quantity"]
			]);

		}

		// 3a Parte -> Fazer o update do produto
			/* Apenas retira o stock do ultimo produto mesmo havendo múltiplos */

		$query = $this->db->prepare("
			UPDATE stocks s
			INNER JOIN products p USING (product_id)
			SET s.stock = s.stock - ?
			WHERE p.product_id = ?
		");

		$query->execute([
			$order["quantity"],
			$order["product_id"]
		]);

		unset($_SESSION["cart"]);
	}

}
