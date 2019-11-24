<body>
  <main id="main mt-5 center">
    <form class="form-horizontal centered" action =<?php echo $action;?> method="POST" enctype="multipart/form-data">

      <div class="form-group">
        <label class="col-md-4 control-label">PRODUCT NAME</label>  
        <div class="col-md-4">
        <input type="text" id="p_name" name="p_name" class="form-control input-md" value="<?php echo $pname;?>" required>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label">PRODUCT CATEGORY</label>  
        <div class="col-md-4">
        <select id="p_category" name="p_category" placeholder="PRODUCT CATEGORY" value="<?php echo $pcat;?>" class="form-control" type="text" onchange="makeSubmenu(this.value)" required>
          <option value="" disabled selected>category</option>
          <option value="outerwears">outerwears</option>
          <option value="dresses">dresses</option>
          <option value="tops">tops</option>
          <option value="bottoms">bottoms</option>
        </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label">PRODUCT SUB CATEGORY</label>
        <div class="col-md-4">
          <select id="p_sub" name="p_sub" value="<?php echo $psub;?>">
          <option></option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label">PRODUCT COLOUR</label>
        <div class="col-md-4">
          <input id="p_colour" name="p_colour" class="form-control" value="<?php echo $pcolour;?>" required></input>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label">PRODUCT PRICE</label>
        <div class="col-md-4">
          <input id="p_price" name="p_price" class="form-control" value="<?php echo $pprice;?>" required></input>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label">QUANTITY</label>  
        <div class="col-md-4">
        <input id="p_quantity" name="p_quantity" class="form-control input-md" type="text" value="<?php echo $pq;?>" required>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label">PRODUCT DESCRIPTION</label>
        <div class="col-md-4">                     
          <textarea class="form-control" id="p_description" name="p_description"><?php echo $pdesc;?></textarea>
        </div>
      </div>


      <?php echo $pimg;?>

      <div class="form-group">
        <div class="col-md-4">
          <button id="singlebutton" name="singlebutton" class="btn btn-primary">Upload</button>
        </div>
      </div>

    </form>
  </main>
  
</body>
</html>