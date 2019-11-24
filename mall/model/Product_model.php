<?php
	include 'Model.php';

	class Product_Model extends Model{

		function selectNew(){
			$sql = 'SELECT * from product order by p_id desc limit 12';
			$stmt = $this->pdo->query($sql);
			return $stmt;
		}

		function selectBy($order, $o){
			$sql = "SELECT * from product order by $order $o";
			$stmt = $this->pdo->prepare($sql);
			$stmt -> execute();

			return $stmt->fetchAll();
		}

		function selectFilter($filter){
			$sql = "SELECT DISTINCT($filter) from product";
			$stmt = $this->pdo->prepare($sql);
			$stmt -> execute();
			return $stmt->fetchAll();
		}

		function selectFilter2($filter, $category){
			$sql = "SELECT DISTINCT($filter) from product where p_category= '$category'";
			$stmt = $this->pdo->prepare($sql);
			$stmt -> execute();
			return $stmt->fetchAll();
		}

		function selectCategory($cat){
			$sql = "SELECT * from product where p_category = '$cat'";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			return $stmt;
		}

		function selectProduct($pid){
			$sql = "SELECT * from product where p_id = '$pid'";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			return $stmt->fetch();
		}

		function searchProduct($name){
			$sql = "SELECT * from product where p_name like '%$name%'";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			return $stmt;
		}

		function uploadProduct($name, $category, $sub, $colour, $price, $q, $des){
			try{
				$sql = 'INSERT INTO product (`p_name`, `p_category`, `p_sub`, `p_colour`, `p_price`, `p_quantity`, `p_description`) VALUES(?,?,?,?,?,?,?)';
				$stmt = $this->pdo->prepare($sql);
            	$stmt->execute([$name, $category, $sub, $colour, $price, $q, $des]);
            	return $this->pdo->lastInsertId();

			}catch(Exception $e){
				var_dump('Error Uploading:', $e->getMessage());
			}
		}

		function updateProduct($name, $category, $sub, $colour, $price, $q, $des, $id){
			try{
				$sql = 'UPDATE product SET `p_name`=?, `p_category`=?, `p_sub`=?, `p_colour`=?, `p_price`=?,`p_quantity`=?, `p_description`=? WHERE `p_id`=?';
				$stmt = $this->pdo->prepare($sql);
            	$stmt->execute([$name, $category, $sub, $colour, $price, $q, $des, $id]);
            	return $stmt;
			}catch(Exception $e){
				var_dump('Error Uploading:', $e->getMessage());
			}
			
		}

		function deleteProduct($cat, $id){
			try{
				$sql = 'DELETE from product where p_id=:id';
				$stmt = $this->pdo->prepare($sql);
				$stmt->bindValue(':id', $id, PDO::PARAM_STR);
				$stmt->execute();
			}catch(Exception $e){
				var_dump('Error Deleting:', $e->getMessage());
			}

		}
	}
