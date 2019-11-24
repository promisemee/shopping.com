<?php 
	
  include $_SERVER["DOCUMENT_ROOT"].'/mall/controller/Product_cont.php';
  include $_SERVER["DOCUMENT_ROOT"].'/mall/model/Product_model.php';

  $controller = new Product_Controller();
  $controller ->deleteProduct();

  //move to list page after delete
  echo '<script language="javascript">';
  echo 'window.location.replace("/mall/product/product_list.php?cat='.$cat.'")';
  echo '</script>'
  

?>
