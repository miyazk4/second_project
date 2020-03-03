<?php

require("base.php");

class Subscription extends Base {
	
	public function get() {
		$query = $this->db->prepare("
			SELECT image, price,perks, membership_id
			FROM membership
		");

		$query->execute();

		return $query->fetchAll( PDO::FETCH_ASSOC );
	}
	
}
