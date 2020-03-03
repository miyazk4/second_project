<?php

require_once("base.php");

class Products extends Base {

	public function getAllProducts() {
		$query = $this->db->prepare("
			SELECT p.*, s.stock, siz.size, siz.size_id
			FROM products p
			INNER JOIN stocks s USING (product_id)
			INNER JOIN sizes siz USING (size_id)
			ORDER BY p.shop_name
		");
		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC); 
	}

	public function categories() {
		$query = $this->db->prepare("
			SELECT name, category_id
			FROM categories
		");

		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function get() {
		$query = $this->db->prepare("
			SELECT image,name, product_id
			FROM products
			LIMIT 4
		");
		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC); 
	}
	// alteracao coloquei stock id
	public function home() {
		$query = $this->db->prepare("
			SELECT image, shop_name AS s_name, price, product_id
			FROM products
			ORDER BY date_added
			LIMIT 12
		");

		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getDetail($product_id) {

		$query = $this->db->prepare("
			SELECT p.shop_name AS s_name, p.product_id, p.description, p.price, p.preorder_info, p.image, s.stock_id AS stock_id_default, s.stock
			FROM products p
			INNER JOIN stocks s USING(product_id)
			WHERE p.product_id = ?
			  AND s.stock_id IN(
			  	SELECT MIN(stock_id) FROM stocks  WHERE product_id = ?
			  )
		");

		$query->execute([$product_id, $product_id]);

		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function getSizes($product_id) {
		$query = $this->db->prepare("
			SELECT siz.size, siz.size_id, stc.stock_id
			FROM sizes siz
			INNER JOIN stocks stc USING (size_id)
			WHERE stc.product_id = ?
		");

		$query->execute([$product_id]);

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getApparel() {
		$query = $this->db->prepare("
			SELECT image, shop_name AS s_name, price, product_id
			FROM products
			WHERE category_id = 1
			ORDER BY date_added
		");

		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getAccessories() {
		$query = $this->db->prepare("
			SELECT image,shop_name AS s_name, price, product_id
			FROM products
			WHERE category_id = 2
			ORDER BY date_added
		");

		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getMusic() {
		$query = $this->db->prepare("
			SELECT image,shop_name AS s_name, price, product_id
			FROM products
			WHERE category_id = 3
			ORDER BY date_added
		");

		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function shopAll() {
		$query = $this->db->prepare("
			SELECT image,shop_name AS s_name, price, product_id
			FROM products
			ORDER BY date_added
		");

		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function edit($data) {
		
		if(isset($data["send"])) {

			/* 
				Ele guarda a informação na base de dados mas redirecciona a dizer que não consegue encontrar o produto

				O stock é editado através da página admin/products (quando redirecionado através do product_id)
			*/

			/*
				Comentado porque a description e preorder info leva tags de html

			foreach($data AS $key => $value) {
				$data[$key] = strip_tags(trim($value));
			} 

			*/

			if(
				isset($_SESSION["user_id"]) &&
				mb_strlen($data["image"]) >= 10 && 
				mb_strlen($data["image"]) <= 200 &&
				mb_strlen($data["name"]) >= 10 &&
				mb_strlen($data["name"]) <= 200 &&
				mb_strlen($data["description"]) >= 20 &&
				mb_strlen($data["description"]) <= 65535 &&
				mb_strlen($data["preorder_info"]) <= 250 &&
				is_numeric($data["price"]) &&
				$data["price"] > 0 &&
				isset($data["product_id"]) &&
				is_numeric($data["product_id"])
			) {

				$query = $this->db->prepare("
					UPDATE products
					SET image = ?,
						shop_name = ?,
						description = ?,
						price = ?,
						preorder_info = ?
					WHERE product_id = ?
				");

				$query->execute([
					$data["image"],
					$data["name"],
					$data["description"],
					$data["price"],
					$data["preorder_info"],
					$data["product_id"]
				]);

				$product_id = $this->db->lastInsertId();

				header("Location:" . ROOT . 'admin/productDetailAdmin' . '/' . $product_id);

				$query = $this->db->prepare("
					UPDATE stocks
					SET stock = ?,
						size_id = ?
					WHERE product_id = ?
				");

				$query->execute([
					$data["stock"],
					$data["size_id"],
					$data["product_id"]
				]);

			}
		}
	}
	public function create($data) {
		
		if(isset($data["send"])) {

			/*	Comentado pelos mesmos motivos do edit

			foreach($data AS $key => $value) {
				$data[$key] = strip_tags(trim($value));
			} */

			if(
				isset($_SESSION["user_id"]) &&
				!empty($data["category_id"]) &&
				!empty($data["image"]) &&
				mb_strlen($data["image"]) >= 10 && 
				!empty($data["name"]) &&
				!empty($data["description"]) &&
				!empty($data["price"]) &&
				mb_strlen($data["image"]) <= 200 &&
				mb_strlen($data["name"]) >= 10 &&
				mb_strlen($data["name"]) <= 200 &&
				mb_strlen($data["description"]) >= 20 &&
				mb_strlen($data["description"]) <= 65535 &&
				mb_strlen($data["preorder_info"]) <= 250 &&
				is_numeric($data["price"]) &&
				$data["price"] > 0 
			) {

				$query = $this->db->prepare("
					INSERT INTO products
					(category_id,image,shop_name,description,preorder_info,price)
					VALUES(?,?,?,?,?,?)
				");

				$query->execute([
					$data["category_id"],
					$data["image"],
					$data["name"],
					$data["description"],
					$data["preorder_info"],
					$data["price"]
				]);

				$product_id = $this->db->lastInsertId();

				header("Location:" . ROOT . 'productDetail' . '/' . $product_id);

				if(
					!empty($data["product_id"]) &&
					!empty($data["stock"]) &&
					!empty($data["stock_id"])
				) {
					$query = $this->db->prepare("
						INSERT INTO stocks
						(product_id,stock,size_id)
						VALUES(?,?,?)
					");

					$query->execute([
						$data["product_id"],
						$data["stock"],
						$data["size_id"]
					]);

				}		
			}
		}
	}		
}