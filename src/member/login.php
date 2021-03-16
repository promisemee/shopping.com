<?php 

  include $_SERVER["DOCUMENT_ROOT"].'/controller/Main_controller.php';

  $controller = new Main_Controller();
  $controller -> loginPage();

?>
