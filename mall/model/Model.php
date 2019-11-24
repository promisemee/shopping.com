<?php
	class Model{
		public $pdo;
		private $host = 'localhost';
		private $dbuser ='d1234';
		private $dbpwd = '1234';
		private $database = 'mysql';

		public function __construct(){
			
			$this->pdo = new PDO("mysql:host=$this->host;dbname=$this->database", $this->dbuser, $this->dbpwd);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			if (!$this->pdo)
				die('Could not connect: '.mysql_error());
		}

		public function selectSQL($sql){
			$stmt = $sql;
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			return $stmt;
		}
	}