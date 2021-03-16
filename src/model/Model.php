<?php
	class Model{
		public $pdo;
		private $host = 'db';
		private $dbuser ='d1234';
		private $dbpwd = '1234';
		private $database = 'mysql';

		public function __construct(){
			try{
				$this->pdo = new PDO("mysql:host=$this->host;dbname=$this->database", $this->dbuser, $this->dbpwd);
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				echo 'Could not connect: '. $e -> getMessage();
			}
		}

		public function selectSQL($sql){
			$stmt = $sql;
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			return $stmt;
		}
	}