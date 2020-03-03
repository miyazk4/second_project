<?php

require_once("base.php");

class News extends Base {

	public function get(){
		$query = $this->db->prepare("
			SELECT title,image, news_date, description, news_id
			FROM news
			ORDER BY news_date DESC
			LIMIT 3
		");

		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getAll() {
		$query = $this->db->prepare("
			SELECT title,image, news_date, description, news_id
			FROM news
			ORDER BY news_date DESC
			LIMIT 6
		");

		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getSingular($param) {
	
		$query = $this->db->prepare("
			SELECT title,image, news_date, description, news_id, detail
			FROM news
			WHERE news_id = ?
		");

		$query->execute([$param]);

		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function getInterval($news_id) {
		$query = $this->db->prepare("
			SELECT title,image, news_date, description, news_id
			FROM news
			WHERE news_id BETWEEN ? - 6 AND ? - 1
			ORDER BY news_date DESC
		");

		// O - 6 é porque o BETWEEN apanha o ID da atual também. Como queremos menos 6 notícias temos que fazer. Depois o And ? - 1 é o ID atual - a que falta 

		$query->execute([
			$news_id,
			$news_id
		]);

		$getNew = $query->fetchAll(PDO::FETCH_ASSOC);

		return $getNew;
	}


}