<table id="cart" class="table table-hover table-condensed">
    	<thead>
			<tr>
				<th style="width:50%">Product</th>
				<th style="width:10%">Price</th>
				<th style="width:8%">Quantity</th>
				<th style="width:22%" class="text-center">Subtotal</th>
				<th style="width:10%"></th>
				</tr>
		</thead>
		<tbody>
				
		<?php if($total==NULL):?>
			<tr>
				<td data-th="Product">
					<div class="row">				
						<div class="col-sm-10">
							<h4 class="nomargin">No item in your Cart!</h4>
						</div>
					</div>
				</td>		
			</tr>
							
		<?php else:?>


			<?php foreach($cart as $list):?>
				<tr>
					<td data-th="Product">
						<div class="row">
							<div class="cart_id d-none"><?php echo $list['CA_ID']?></div>
							<?php $img= "/public/img/{$list['p_category']}/{$list['p_id']}.jpg"?>
							<div class="col-sm-2 hidden-xs"><img src=<?php echo $img;?> width=100px; height=100px;></div>
							<div class="col-sm-10">
								<h4 class="nomargin"><?php echo $list['p_name']?></h4>
							</div>
						</div>
					</td>
					<td data-th="Price"><?php echo $list['p_price']?></td>
					<td data-th="Quantity">
						<?php echo $list['c_quantity']?>
					</td>
					<td data-th="Subtotal" class="text-center"><?php echo $list['p_price'] * $list['c_quantity'];?></td>
					<td class="actions" data-th="">
						<button class="btn btn-danger deletecart btn-sm" value=<?php echo $list['CA_ID']?>><i class="fa fa-trash"></i></button>				
					</td>
				</tr>
			<?php endforeach;?>

		<?php endif;?>

		</tbody>

		<tfoot>
			<tr>
				<td></td>
				<td colspan="2" class="hidden-xs"></td>
				<td class="hidden-xs text-center"><strong>Total <?php echo $total;?></strong></td>
				<td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
			</tr>
		</tfoot>
	</table>