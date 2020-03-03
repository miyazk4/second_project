<?php

require_once("base.php");

class SocialMedia extends Base {
	public function get() {
		$query = $this->db->prepare("
			SELECT class, link
			FROM social_media
		");

		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
}