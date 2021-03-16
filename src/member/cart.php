<?php 

  include $_SERVER["DOCUMENT_ROOT"].'/controller/login_controller.php';
  include $_SERVER["DOCUMENT_ROOT"].'/model/Login_model.php';

  $controller = new Login_Controller();
  $controller ->memberCart();

?>
