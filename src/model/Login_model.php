<?php
	include('Model.php');

	class Login_Model extends Model{

		function getLastID(){
			$sql= "SELECT max(c_id) FROM CustomerAdmin";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			return $stmt->fetch();
		}

		function getUser($usr, $pwd){
			$sql = 'SELECT * from CustomerAdmin where username =:u and password = :p';
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':u', $usr);
			$stmt->bindParam(':p', $pwd);
			$stmt -> execute();

			return $stmt->fetch();
		}

		function getUserId($uid){
			$sql = 'SELECT * from CustomerAdmin where c_id =:u';
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':u', $uid);
			$stmt -> execute();

			return $stmt->fetch();
		}

		function getEmail($email){
			$sql = 'SELECT * from CustomerAdmin where username =:u';
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(':u', $email);
			$stmt -> execute();

			return $stmt;
		}

		function newUser($fname, $lname, $email, $password){
			try{
				$sql = 'INSERT INTO CustomerAdmin (`firstname`, `lastname`, `username`, `password`, `admin`) VALUES(?, ?, ?, ?, ?)';
				$stmt = $this->pdo->prepare($sql);
            	$stmt->execute([$fname, $lname, $email, $password, 0]);
            	return $stmt;

			}catch(Exception $e){
				var_dump('Error Uploading:', $e->getMessage());
			}
		} 

		function updateUser($fname, $lname, $password, $id){
			try{
				$sql = 'UPDATE CustomerAdmin SET `firstname`=?, `lastname`=?, `password`=? WHERE `c_id`=?';
				$stmt = $this->pdo->prepare($sql);
            	$stmt->execute([$fname, $lname, $password, $id]);
            	return $stmt;
			}catch(Exception $e){
				var_dump('Error Uploading:', $e->getMessage());
			}
			
		}

		function getCart(){
			$uid = $_SESSION['uid'];
			$sql = 'SELECT * FROM `Cart` join `Product` using(p_id) where c_id = '.$uid;
			$stmt = $this->pdo->prepare($sql);
			$stmt -> execute();

			return $stmt->fetchAll();
		}

		function addCart($pid, $q){
			$uid = $_SESSION['uid'];	
			try{
				$sql = 'INSERT INTO Cart (`c_id`, `p_id`, `c_quantity`) VALUES(?,?,?)';
				$stmt = $this->pdo->prepare($sql);
            	$stmt->execute([$uid, $pid, $q]);
            	return $stmt;

			}catch(Exception $e){
				var_dump('Error Uploading:', $e->getMessage());
			}
		}

		function getTotal(){
			$sql = 'SELECT sum(p_price * c_quantity) FROM `Cart` join `Product` using(p_id) where c_id ='.$_SESSION['uid'];
			$stmt = $this->pdo->prepare($sql);
			$stmt -> execute();

			return $stmt;
		}

		function deleteCart($id){
			try{
				$sql = 'DELETE from Cart where CA_ID=?';
				$stmt = $this->pdo->prepare($sql);
				$stmt->execute([$id]);
			}catch(Exception $e){
				var_dump('Error Deleting:', $e->getMessage());
			}

		}
		
	}