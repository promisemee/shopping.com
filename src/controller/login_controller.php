<?php
	include('Controller.php');
	class Login_Controller extends Controller{

		public function __construct(){
			parent::__construct();
			$this->model = new Login_Model();
		}

		public function checkLogin(){
			if (!isset($_SESSION))	session_start();

			if (!empty($_POST)){
				if (isset($_POST['password'])){
					$result = $this->model->getUser($_POST['email'], $_POST['password']);
					if ($result>0){
						if ($result['admin']==1){
							$uname='Admin';
						}else{
							$uname = $result['firstname'];
						}
						$_SESSION['user'] = $uname;
						$_SESSION['uid'] = $result['c_id'];
						echo "<script type='text/javascript'>
							window.alert('Welcome, ".$_SESSION['user']."!');
							window.location.href='/index.php'
							</script>";
					} 
					else{
						echo "<script type='text/javascript'>
						window.alert('Wrong Username or Password');
						window.location.href='/member/login.php'
						</script>";
						
					}
				} 

			}
		}

		public function newUser(){
			if (!isset($_SESSION))	session_start();

			$email = $_REQUEST['email'];
			$fname = $_REQUEST['fname'];
			$lname = $_REQUEST['lname'];
			$password=$_REQUEST['password1'];

			if ($this->getEmail($email)){
				echo "<script type='text/javascript'>";
				echo "window.alert('You have already joined in');";
				echo "window.location.href='/index.php'";
				echo "</script>";
			}

			else{
				$this->model-> newUser($fname, $lname, $email, $password);
				echo "<script type='text/javascript'>";
				echo "window.alert('Join Successful');";
				echo "window.location.href='/index.php'";
				echo "</script>";
			}
		}

		private function getEmail($email){
			if ($this->model->getEmail($email)->rowCount()>0)
				return True;
			else return False;
		}

		public function myUser(){
			if (!isset($_SESSION))	session_start();
            $uid = $_SESSION['uid'];

            $user = $this->model->getUserId($uid);
            
            $email = $user['username'];
            $fname = $user['firstname'];
            $lname = $user['lastname'];

            $navbar = $this->navbar();
            $sidebar = $this->sidebar();


            require_once $_SERVER["DOCUMENT_ROOT"]."/view/header.php";
            require_once $_SERVER["DOCUMENT_ROOT"]."/view/userUpload.php";
            require_once $_SERVER["DOCUMENT_ROOT"]."/view/footer.php";
    		

		}

		public function modifyUser(){
            if (!isset($_SESSION))  session_start();

			$fname = $_REQUEST['fname'];
			$lname = $_REQUEST['lname'];
			$password=$_REQUEST['password'];
            
            if (isset($_SESSION['uid'])){
            	$id = $_SESSION['uid'];
                $result = $this->model->updateUser($fname, $lname, $password, $id);
                $_SESSION['user'] = $fname;

                $this->walert("Profile Modified");
                echo '<script language="javascript">';
                echo 'window.location.replace("/index.php")';
                echo '</script>';

            }
            
                
		}


		public function addCart(){
			if (!isset($_SESSION))	session_start();
			if (isset($_POST["action"])){
				$this->model->addCart($_POST['p_id'], $_POST['q']);

			}
		}

		public function memberCart(){
			if (!isset($_SESSION))	session_start();
			
			$cart = $this->model->getCart();
			$t	= $this->model->getTotal()->fetch();
			$total = $t['sum(p_price * c_quantity)'];

			$navbar = $this->navbar();
            $sidebar = $this->sidebar();

			require_once $_SERVER["DOCUMENT_ROOT"]."/view/header.php";
			require_once $_SERVER["DOCUMENT_ROOT"]."/view/cart.php";
			require_once $_SERVER["DOCUMENT_ROOT"]."/view/footer.php";
		}

		public function reloadCart(){
			if (!isset($_SESSION))	session_start();
				if (isset($_POST["action"])){
					if(isset($_POST["ca_id"])){
	    				$this->model->deleteCart($_POST["ca_id"]);
		    			$cart = $this->model->getCart();
						$t	= $this->model->getTotal()->fetch();
						$total = $t['sum(p_price * c_quantity)'];
		    			require_once $_SERVER["DOCUMENT_ROOT"]."/view/cartlist.php";
					}
	    		}

    		}

		}
