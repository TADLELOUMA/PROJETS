<!doctype html>
  <head>
  <?php include_once '../views/includes/head.php'?>
    <title>StopGaspillage</title>

  </head>
  <body>
    <!-- php include_once '../views/includes/header.php'?> -->
    <!-- <img src="assets/images/im1.jpg" alt=""/> -->
  <div class="container">
    <div class="row">
      <div class="col-md-5">

        <form class="form-signin">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
              <label for="inputEmail">Email address</label>
            </div>

            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
              <label for="inputPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
            <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2019</p>
        </form>
      </div>
      <div class="col-md-2"></div>
      <div class="col-md-5">

        <form  method="POST" class="form-signin" action="../controllers/connexionInscription_controller.php">
        <h1 class="h3 mb-3 font-weight-normal">Please check in</h1>
            <div class="form-label-group">
              <input type="text" class="form-control" name ="username" id="login" placeholder="username" required>
              <label for="inputEmail">Username</label>
            </div>

            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" name ="email" placeholder="Email address" required autofocus>
              <label for="inputEmail">Email address</label>
            </div>

            <div class="form-label-group">
              <input type="password" id="inputPassword" name ="password" class="form-control" placeholder="Password" required>
              <label for="inputPassword">Password</label>
            </div>

            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" name ="confirmedpassword" placeholder="Password" required>
              <label for="inputPassword">ConfirmedPassword</label>
            </div>



            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
            <input class="btn btn-lg btn-primary btn-block" name ="submit" type="submit" value="Inscription">
            <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2019</p>
        </form>
      </div>
    </div>
  </div>

  <!--<div class="text-center mb-4">
    <img class="mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Floating labels</h1>
    <p>Build form controls with floating labels via the <code>:placeholder-shown</code> pseudo-element. <a href="https://caniuse.com/#feat=css-placeholder-shown">Works in latest Chrome, Safari, and Firefox.</a></p>
  </div> -->


</body>
</html>