<?php 

  include $_SERVER["DOCUMENT_ROOT"].'/controller/Product_cont.php';
  include $_SERVER["DOCUMENT_ROOT"].'/model/Product_model.php';

  $controller = new Product_Controller();
  $controller -> ProductList();

?>
