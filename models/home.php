<?php

require("base.php");

class Products extends Base {
	public function get() {
		$query = $this->db->prepare("
			SELECT image,name
			FROM products
			ORDER BY name
		");

		$query->execute();

		return $products->fetchAll(PDO::FETCH_ASSOC); 
	}
}