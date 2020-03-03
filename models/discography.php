<?php

require_once("base.php");

class Discography extends Base {
	public function getDetail() {
		$query = $this->db->prepare("
			SELECT release_date,name,production,label,recorded_at,image, engineer
			FROM discography
		");

		$query->execute();

		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function getTracks() {
		$query = $this->db->prepare("
			SELECT track_number,name
			FROM track_list
			WHERE discography_id = 1
		");

		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getAlbums() {
		$query = $this->db->prepare("
			SELECT image, name, discography_id
			FROM discography
		");

		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getSingular($discography_id) {
		$query = $this->db->prepare("
			SELECT release_date,name,production,label,recorded_at,image, discography_id,engineer
			FROM discography
			WHERE discography_id = ?
		");

		$query->execute([$discography_id]);

		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function getSingularTrack($discography_id) {
		$query = $this->db->prepare("
			SELECT track_number,name
			FROM track_list
			WHERE discography_id = ?
		");

		$query->execute([$discography_id]);

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
}