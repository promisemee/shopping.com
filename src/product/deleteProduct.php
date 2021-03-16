<?php 
	
  include $_SERVER["DOCUMENT_ROOT"].'/controller/Product_cont.php';
  include $_SERVER["DOCUMENT_ROOT"].'/model/Product_model.php';

  $controller = new Product_Controller();
  $controller ->deleteProduct();

  //move to list page after delete
  echo '<script language="javascript">';
  echo 'window.location.replace("/product/product_list.php?cat='.$cat.'")';
  echo '</script>'
  

?>
