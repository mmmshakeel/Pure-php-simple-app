<?php

require_once 'config.php';

class Database {
	public $db;
	
	public function __construct() {
		if (!$this->db) {
			$this->db = $this->setDb();
		}
	}
	
	public function getDb() {
		return $this->db;
	}
	
	public function setDb() {
		global $database;
		
		try {
			$this->db = new PDO("{$database['driver']}:host={$database['host']};dbname={$database['name']}", $database['user'], $database['password']);
			return $this->db;
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
}