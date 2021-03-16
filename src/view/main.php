<main id="main">

  <!--carousel-->
  <div class="row">
  <div id="myCarousel" class="carousel slide col-md-11 col-xs-11 center" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class"img" src="/public/img/main/vintage.jpg">
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>New Arrival! Leather Jacket</h1>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class"img" src="/public/img/main/denim.jpg">
        <div class="container">
          <div class="carousel-caption">
            <h1>New Denim Jacket</h1>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class"img" src="/public/img/main/yellow.jpg">
        <div class="container">
          <div class="carousel-caption">
            <h1>Yellow Coat Just for You</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



  <!--Carousel End--->

<div class="card-detail">
  <div class="col-md-12 col-xs-12 text-center">
    <hr>
    <h2> NEW ARRIVALS</h2>
    <hr>
  </div>

  <!--New Arrival List-->

  <div class="row mt-5">
    <?php echo include 'album.php';?>
  </div>
</div>

  <!--New Arrival List End-->

</main>

