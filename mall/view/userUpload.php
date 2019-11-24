

<main id="main" class="form">
  <form class="form-signin bgcolor col-sm-6 center" id="mypage" action ="" method="POST">
    <h1 class="h3 mb-3 font-weight-normal">Hello, <?php echo $fname?></h1>
    
    <label for="inputEmail" class="">Email address</label>
    
    <input type="email" id="1" name="email" class="form-control mb-3" value="<?php echo $email?>" disabled>
    <p id="invalid-1"></p>
    
    <label for="inputPassword" class="b-2">Password</label>
    
    <input type="password" id="password" name="password" class="form-control mb-3"  >
    <p id="invalid-password"></p>

    <label for="inputPassword" class="">Repeat Password</label>
    
    <input type="password" id="3" name="password2" class="form-control mb-3"  >
    <p id="invalid-3"></p>
    
    <label for="inputEmail" class="">First Name</label>
   
    <input type="fname" id="4" name="fname" value="<?php echo $fname?>" class="form-control mb-3"  >
     <p id="invalid-4"></p>

    <label for="inputEmail" class="">Last Name</label>
    
    <input type="lname" id="5" name="lname" value="<?php echo $lname?>" class="form-control mb-3"  >
    <p id="invalid-5"></p>

    <button class="btn btn-lg btn-dark btn-block mt-4" type="submit">UPLOAD</button>
  </form>
</main>
  