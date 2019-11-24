<?php
	if (!isset($_SESSION)) session_start();
	require 'controller/Main_controller.php';
	require 'model/Product_model.php';
	
	$model = new Product_Model();
	$controller = new Main_Controller();
	
	$request = $_SERVER['REQUEST_URI'];

	switch ($request) {
    	case '/mall/' :
	        $controller->set_page();
        	break;
        case '/mall/index.php' :
	        $controller->set_page("main");
        	break;
    	default:
        	http_response_code(404);
        	
        	require __DIR__ . '/view/404.php';
        	break;
}