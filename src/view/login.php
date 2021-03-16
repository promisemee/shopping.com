<!--https://getbootstrap.com/docs/4.0/examples/sign-in/-->
<main id="main">
  <form class="form-signin col-sm-4 center mt-5 mb-3" action ="checklogin.php" method="POST">
    <h1 class="h3 mb-3 font-weight-normal mb-4 text-center">SIGN IN</h1>
    <label for="email" class="">Email address</label>
    <input type="email" name="email" class="form-control mb-2" placeholder="" required autofocus>
    <label for="inputPassword" class="">Password</label>
    <input type="password" name="password" class="form-control" placeholder="" required>
    <div class="checkbox mb-3">
    </div>
    <button class="btn btn-lg btn-dark btn-block mt-5 mb-3" type="submit">SIGN IN</button>
    <a class="link" href = "/member/join.php">Don't have an account? Register here!</a>
  </form>
</main>
  