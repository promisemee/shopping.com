<?php
	include 'Controller.php';
	
	class Main_Controller extends Controller{

		public function __construct(){
			parent::__construct();
		}

    	public function set_page(){
    		$this->model = new Product_Model();
        	$list = $this->model ->selectNew();
        	$rows = $list->rowCount();

        	$navbar = $this->navbar();
            $sidebar = $this->sidebar();

        	require_once $_SERVER["DOCUMENT_ROOT"]."/mall/view/header.php";
			require_once $_SERVER["DOCUMENT_ROOT"]."/mall/view/main.php";
			require_once $_SERVER["DOCUMENT_ROOT"]."/mall/view/footer.php";
    	}

    	public function loginPage(){
    		$navbar = $this->navbar();
            $sidebar = $this->sidebar();
    		require_once $_SERVER["DOCUMENT_ROOT"]."/mall/view/header.php";
			require_once $_SERVER["DOCUMENT_ROOT"]."/mall/view/login.php";
			require_once $_SERVER["DOCUMENT_ROOT"]."/mall/view/footer.php";
    	}

    	public function joinPage(){
    		$navbar = $this->navbar();
            $sidebar = $this->sidebar();
    		require_once $_SERVER["DOCUMENT_ROOT"]."/mall/view/header.php";
			require_once $_SERVER["DOCUMENT_ROOT"]."/mall/view/join.php";
			require_once $_SERVER["DOCUMENT_ROOT"]."/mall/view/footer.php";
    	}

	}