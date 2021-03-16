<main id = "main <?php echo $type?>">

<hr>
  <div class="top-text mt-4 mb-4">
    <p class = "type d-none"><?php echo $type;?></p>
    <div class="h1 text-center">
      <?php if ($type=="search") echo "SEARCH RESULT FOR : ";?>
      <span class="title"><?php echo $title;?></span>
    </div>
  </div>

  <hr>

  <!--Item Count-->
  <div class="row">
    <div class="d-none d-sm-block col-md-2"></div>
  </div>
  <!--Item Count End-->

<!--Sort&Filter - Mobile Screen-->
<div class="container d-block d-sm-none">

  <div class="row">
      <div class="list-group-item radio">
          <label><input type="radio" name="sortby" class="sortby" value="recommend" checked>Recommended</label>
          <label><input type="radio" name="sortby" class="sortby" value="newest">Newest</label>
          <label><input type="radio" name="sortby" class="sortby" value="highPrice">Price High to Low</label>
          <label><input type="radio" name="sortby" class="sortby" value="lowPrice">Price Low to High</label>
        </div>
  </div>

  <div class="row">
    <!--Filter by Category-->
    <div class="col-4">
      <div class="dropdown sortby">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Category
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <?php foreach($slist as $row):?>
          <div class="list-group-item checkbox">
            <label><input type="checkbox" class="filterselector sub" value="<?php echo $row['p_sub']; ?>"><?php echo $row['p_sub']; ?></label>
          </div>
        <?php endforeach;?>
        </div>
    </div>
    <!--Filter by Category End-->

    <!--Filter by Colour-->
    <div class="col-4">
      <div class="dropdown sortby">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Colour
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <?php foreach($clist as $row):?>
          <div class="list-group-item checkbox">
            <label><input type="checkbox" class="filterselector colour" value="<?php echo $row['p_colour']; ?>"><?php echo $row['p_colour']; ?></label>
          </div>
        <?php endforeach;?>
        </div>
      </div>
    </div>
    <!--Filter by Colour End-->
    </div>

  </div>
</div>
<!--Sort&Filter - Mobile Screen End-->

<!--Sort&Filter - Large Screen-->
<div class="row">
  <div class="d-none d-sm-block col-md-2">
    <h2>Filter</h2>
    <hr>
    <div class="list-group">

      <h3>Sort By</h3>
      <div class="list-group-item radio">
        <label><input type="radio" name="sortby" class="sortby" value="recommend" checked>Recommended</label>
        <label><input type="radio" name="sortby" class="sortby" value="newest">Newest</label>
        <label><input type="radio" name="sortby" class="sortby" value="highPrice">Price High to Low</label>
        <label><input type="radio" name="sortby" class="sortby" value="lowPrice">Price Low to High</label>
      </div>
      
      <h3>CATEGORY</h3>
      <?php foreach($slist as $row):?>
        <div class="list-group-item checkbox">
          <label><input type="checkbox" class="filterselector sub" value="<?php echo $row['p_sub']; ?>"><?php echo $row['p_sub']; ?></label>
        </div>
      <?php endforeach;?>
    </div>

    <div class="list-group">
      <h3>COLOUR</h3>
      <?php foreach($clist as $row):?>
        <div class="list-group-item checkbox">
          <label><input type="checkbox" class="filterselector colour" value="<?php echo $row['p_colour']; ?>"><?php echo $row['p_colour']; ?></label>
        </div>
      <?php endforeach;?>
    </div>
  </div>
  <!--Sort&Filter - Large Screen End-->

  <div class="album bg-light col-12 col-md-10  text-center">
    <?php include 'album.php';?>
  </div>  
</div>
</main>