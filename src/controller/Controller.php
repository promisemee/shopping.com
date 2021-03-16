<?php

	class Controller{
		private $setAjax;
		public $login;
		public $model;

		public function __construct(){
			$this->setAjax = false;
			if (!isset($_SESSION)) session_start();
			
		}

		public function start_page(){
			include $_SERVER["DOCUMENT_ROOT"]."/htdocs/view/header.php";
			include $_SERVER["DOCUMENT_ROOT"]."/htdocs/view/main.php";
			include $_SERVER["DOCUMENT_ROOT"]."/htdocs/view/footer.php";
		}

		public function walert($msg){
            echo '<script language="javascript">';
            echo 'alert("'.$msg.'")';
            echo '</script>';
		}

		public function navbar(){
        	if(isset($_SESSION['user'])) {
            	$msg = '<a class="nav_link" href="/member/myPage.php"><i class="fas fa-user fa-lg"></i></a>';
          	} else {
	            $msg = '<a class="nav_link" href="/member/login.php"><i class="fas fa-user fa-lg"></i></a>';
          	} 
        	$msg .= '</li>';
        	$msg .='</ul>';

		    $msg .='<a class="navbar-brand mx-auto" id="title" href="/index.php">SHOPPING.COM</a>';

    		$msg .='<ul class="navbar-nav ml-auto">';
      		$msg .='<li>';
        	$msg .='<a class="search-form-tigger nav-link" data-toggle="search-form"><i class="fa fa-search fa-lg" aria-hidden="true"></i></a>';
      		$msg .='</li>';
      		$msg .='<li class="nav-item">';
        	if (isset($_SESSION['user']))
          		$msg .= '<a class="nav-link" href="/member/cart.php"><i class="fas fa-shopping-cart fa-lg"></i></a>';
        	else
          		$msg .= '<a class="nav-link" onclick="plsLogin()"><i class="fas fa-shopping-cart fa-lg"></i></a>';

          	return $msg;
	        
		}

		public function sidebar(){
			
			$msg = "";

			if(isset($_SESSION['user'])) {
      			if ($_SESSION['user']=='Admin'){
        		//sidebar for admin
        			$msg .= '<h4 class="sideh">Welcome, '.$_SESSION['user'].'!</h4>';
        			$msg .= '<a class="nav_link" href="/member/myPage.php">My Page</a>';
        			$msg .= '<a class="nav_link" href="/view/logout.php">Log Out</a>';
        			$msg .= '<a class="nav_link" href="/product/addProduct.php">Add Product</a>';

    			}else{
		        //sidebar for customer
        			$msg .= '<h4 class="sideh">Welcome, '.$_SESSION['user'].'!</h4>';
        			$msg .= '<a class="nav_link" href="/member/myPage.php">My Page</a>';
        			$msg .= '<a class="nav_link" href="/view/logout.php">Log Out</a>';
        			$msg .= '<a class="nav_link" href="/member/cart.php">Cart</a>';
      			}
    		}else {
        	//sidebar for non-login user
        		$msg .=  '<a class="nav_link" href="/member/login.php">Log In</a>';
        		$msg .= '<a class="nav_link" href="/member/join.php">Join</a>';
        		$msg .= '<a class="nav_link" onclick="plsLogin()" href="">Cart</a>';
        		$msg .= '<a class="nav_link" onclick="plsLogin()" href="">My Page</a>';
	    	} 
	    	return $msg;

		}


	}

	