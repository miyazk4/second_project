<?php

require("models/base.php");

class Users extends Base {

	public function getUserInfo($id) {
		$query = $this->db->prepare("
			SELECT * 
			FROM users
			WHERE user_id = ?
		");

		$query->execute([$id]);

		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getCountry() {
		$query = $this->db->prepare("
			SELECT country_code AS code, country as name
			FROM countries
			ORDER BY priority DESC, country
		");

		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);
	} 

	public function register($data) {

		if(isset($data["send"])) {

			$country_meta = $this->getCountry();
			
			foreach($country_meta as $country){
				$country_codes[] = $country["code"];
			}

			foreach($data AS $key => $value) {
				$data[$key] = strip_tags(trim($value));
			} 

			// Birthday é suposto ser DATE, mas como validar para deixar o utilizador colocar os '-' ...
			if(
				!empty($data["email"]) &&
				filter_var($data["email"],FILTER_VALIDATE_EMAIL) &&
				!empty($data["password"]) &&
				mb_strlen($data["password"]) >= 8 &&
				mb_strlen($data["password"]) <= 1000 &&
				$data["password"] === $data["passwordVerify"] &&
				!empty($data["postal_code"]) &&
				mb_strlen($data["postal_code"]) >= 4 &&
				!empty($data["birthday"]) &&
				mb_strlen($data["birthday"]) >= 3 &&
				mb_strlen($data["birthday"]) <= 12 &&
				in_array($data["country_code"], $country_codes) &&
				!empty($data["address"]) &&
				mb_strlen($data["address"]) >= 10 &&
				mb_strlen($data["address"]) <= 45 &&
				!empty($data["username"]) &&
				mb_strlen($data["username"]) >= 3 &&
				mb_strlen($data["username"]) <= 20
			){
				$query = $this->db->prepare("
					INSERT INTO users
					(email,password,postal_code,birthday,active,country_code, address,username,admin)
					VALUES(?,?,?,?,1, ?, ?, ?,0)
				");

				$query->execute([
					mb_strtolower($data["email"]),
					password_hash($data["password"], PASSWORD_DEFAULT),
					$data["postal_code"],
					$data["birthday"],
					$data["country_code"],
					$data["address"],
					$data["username"]

				]);
				
				header("Location:" . ROOT . './');
			}

			else{
				return false;
			}
		}
	}

	public function login($data) {

		if(isset($_SESSION["user_id"])) {
			header("Location:" . ROOT);
			exit;
		}

		if(isset($data["send"])) {
			if(
				!empty($data["email"]) &&
				filter_var($data["email"], FILTER_VALIDATE_EMAIL) &&
				!empty($data["password"]) &&
				mb_strlen($data["password"]) >= 8 &&
				mb_strlen($data["password"]) <= 1000
			){
				$query=$this->db->prepare("
					SELECT user_id,password
					FROM users
					WHERE email = ?
						AND active = 1
				");

				$query->execute([
					mb_strtolower($data["email"])
				]);

				$user = $query->fetchAll(PDO::FETCH_ASSOC);

				if(
					!empty($user) &&
					password_verify($data["password"], $user[0]["password"])
				){
					$_SESSION["user_id"] = $user[0]["user_id"];

					header("Location:" . ROOT );
					exit;
				}
				else{
					return false;
				}
			}
		}
	}

	public function logout() {
		session_destroy();

		header("Location:" . ROOT);
	}

	public function edit($data) {

		$country_meta = $this->getCountry();
			
		foreach($country_meta as $country){
			$country_codes[] = $country["code"];
		}

		foreach($data AS $key => $value) {
				$data[$key] = strip_tags(trim($value));
		} 

		if(isset($data["send"])) {
			if(
				isset($_SESSION["user_id"]) &&
				filter_var($data["email"],FILTER_VALIDATE_EMAIL) &&
				!empty($data["password"]) &&
				mb_strlen($data["password"]) >= 8 &&
				mb_strlen($data["password"]) <= 1000 &&
				$data["password"] === $data["passwordVerify"] &&
				mb_strlen($data["postal_code"]) >= 4 &&
				mb_strlen($data["birthday"]) >= 3 &&
				mb_strlen($data["birthday"]) <= 12 &&
				in_array($data["country_code"], $country_codes) &&
				mb_strlen($data["address"]) >= 10 &&
				mb_strlen($data["address"]) <= 45 &&
				mb_strlen($data["username"]) >= 3 &&
				mb_strlen($data["username"]) <= 20

			) {
				$query = $this->db->prepare("
					UPDATE users
					SET email = ?,
						username = ?,
						password = ?,
						postal_code = ?,
						birthday = ?,
						country_code = ?,
						address = ?,
						registration_date = registration_date
					WHERE user_id = ?
				");

			if(
				$query->execute([
					mb_strtolower($data["email"]),
					$data["username"],
					password_hash($data["password"], PASSWORD_DEFAULT),
					$data["postal_code"],
					$data["birthday"],
					$data["country_code"],
					$data["address"],
					$_SESSION["user_id"]
			]))
				header("Location:" . ROOT . 'edit');
			}
			else{
				return "Something went wrong";
			}

		}
				
	}

}