  <!-- https://bootsnipp.com/snippets/xrXp9 -->

  <div class="container text-center">

      <div class="row center">
      <?php if($rows<1): ?>
        <p>No Items Available</p>
      <?php else: ?>

        <?php foreach($list as $productList): ?>
          <div class="col-md-6 col-sm-12 col-lg-4">    
            <div class="card mb-3">
                <?php 
                  $image_src = "/public/img/{$productList['p_category']}/{$productList['p_id']}.jpg";
                ?>
                <div class="image"><img src="<?php echo $image_src;?>" onclick="location.href='/product/viewProduct.php?productNo=<?php echo $productList['p_id'];?>'"></div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-8 text-left"><p onclick="location.href='/product/viewProduct.php?productNo=<?php echo $productList['p_id'];?>'"><?php echo $productList['p_name'];?></p></div>
                    <div class="col-md-4">
                      €<?php echo $productList['p_price'];?> 
                    </div>
                  </div>
                </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif;?>
      </div>
  </div>