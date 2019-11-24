<!--https://www.practicalecommerce.com/Create-Responsive-Ecommerce-Product-Pages-with-Bootstrap/-->
<!-- https://bootsnipp.com/snippets/56bAW -->

<main id="main product-main">

	<div class="container">
		<div class="card-detail">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  	<?php 
		            		$image_src = "/mall/public/img/{$product['p_category']}/{$product['p_id']}.jpg";
		        			?>
							<img class="img-detail" src=<?php echo $image_src;?>>
						</div>
						
					</div>
					<div class="details col-md-6">
						<hr style="width: 100%; color: black; height: 1px; background-color:black;" />

						<h3 class="product-title"><?php echo $product['p_name'];?></h3>
						<h5 class="price"><span>€<?php echo $product['p_price'];?></span></h5>

						<div class="rows">
							<span class="info"><?php echo $product['p_category'];?>/<?php echo $product['p_sub'];?></span>
							<span class="info text-right"><?php echo $product['p_colour'];?></span>
						</div>
						
						<hr style="width: 100%; color: black; height: 1px; background-color:black;" />
						
						


						<p class="product-description"><?php echo $product['p_description'];?></p>


						
						<div class="row">
							
				 			<div class="col-md-6 product-qty">
				  				<span class="btn btn-default btn-lg btn-qty minus">
				  					<span class="fas fa-minus-square" aria-hidden="true"></span>
				  				</span>

				  				<input type="number" class="count p-quantity text-center" value="1">
				  				
				  				<span class="btn btn-default btn-lg btn-qty plus">
				   					<span class="fas fa-plus-square" aria-hidden="true"></span>
				  				</span>
				  			</div>
				  			
			 			</div>

						<div class="action">
							<?php if ((isset($_SESSION['user']))&&($_SESSION['user']=='Admin')):?>
							<?php $id = $product['p_id']; $cat = "'".$product['p_category']."'";?>
				  				<div class="row">
				 					<div class="col-md-12 text-center">
				  						<button class="btn btn-dark btn-block cbutton" onclick="location.href='/mall/product/modifyProduct.php?pid='+<?php echo $id?>">
							   				Modify Product
				  						</button>
				 					</div>
				 				</div>

				 				<div class="row">
				 					<div class="col-md-12 text-center">
				  						<button class="btn btn-dark btn-block cbutton mt-auto" onclick="javascript:deleteObject(<?php echo$cat;?>,<?php echo $id;?>)">
				  							Delete Product
				  						</button>
				 					</div>
				 				</div>;
			  				<?php else: ?>
				  				
				  				<div class="row">
				 					<div class="col-md-12 text-center">
				 						<?php $id = $product['p_id'];?>
				 						<p class="d-none" id ="p-id"><?php echo $id;?></p>
				 						<?php if (isset($_SESSION['user'])):?>
				  							<button id = "addcart" class="btn addcart btn-dark btn-block cbutton" value="Add to Cart">Add to Cart
				  						<?php else:?>
				  							<button id = "addcart-notlogin" class="btn addcart-notlogin btn-dark btn-block cbutton">Add to Cart
				  						<?php endif;?>
				  						</button>
				 					</div>
				 				</div>
			  				<?php endif?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</main>