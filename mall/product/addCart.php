<?php 

	include $_SERVER["DOCUMENT_ROOT"].'/mall/controller/login_controller.php';
 	include $_SERVER["DOCUMENT_ROOT"].'/mall/model/Login_model.php';

  	$controller = new Login_Controller();
  	$controller -> addCart();
	