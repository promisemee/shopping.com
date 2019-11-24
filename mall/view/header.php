<?php include $_SERVER["DOCUMENT_ROOT"]."/mall/view/files.php";?>

<header>
  <nav class="navbar navbar-expand navbar-light fixed-top bg-light">
    <a href="javascript:void(0)" class="openbtn" onclick="openNav()"><i class="fas fa-bars"></i></a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <?php echo $navbar;?>
      </li>
    </ul>
  </nav>

  <div class="search-form-wrapper">
   <form class="search-form" id="" action="/mall/product/search.php">
      <div class="input-group">
         <input type="text" name="search" class="search form-control" placeholder="Search">
      </div>
   </form>

  </div>
  <!-------------------------------------Nav Bar End----------------------------------------------->


  <!-------------------------------------Side Bar-------------------------------------------------->

    <div id="Sidebar" class="sidebar mt-3">

    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

    <?php
      echo $sidebar;
    ?>

    <hr>

    <h3>Category</h3>

    <hr>

    <a href= '/mall/product/product_list.php?cat=outerwears'>Jackets & Coats</a>
    <a href= '/mall/product/product_list.php?cat=dresses'>Dresses</a>
    <a href= '/mall/product/product_list.php?cat=tops'>Tops</a>
    <a href= '/mall/product/product_list.php?cat=bottoms'>Bottoms</a>


  </div>


</header>