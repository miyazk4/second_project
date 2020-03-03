<?php

class Base {

	public $db;

	function __construct(){
		$this->db = new PDO ("mysql:host=localhost;dbname=sabrinacarpenter;charset=utf8mb4", "root","");

		$this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); // Tirar isto quando publicar num servidor
	}
}