<?php 

  include $_SERVER["DOCUMENT_ROOT"].'/mall/controller/Product_cont.php';
  include $_SERVER["DOCUMENT_ROOT"].'/mall/model/Product_model.php';

  $controller = new Product_Controller();
  $controller -> productView();

?>
 