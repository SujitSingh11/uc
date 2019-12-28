<?php
    include 'db/db.php';
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="css/froala_blocks.css">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
  <title>Admin Login</title>
</head>
<body>
<header class="bg-dark" data-block-type="headers" data-id="2">
  <div class="container text-center">
    <nav class="navbar">
        <a class="navbar-brand" href=""><img src="imgs/techno_logo.png" width="300" height="70" alt=""></a>
        <div class="navbar-nav">
            <li class="nav-item active">
              <h3>Ultimate Coder</h3>
            </li>
        </div>
    </nav>
  </div>
</header>
<section class="fdb-block py-0 fp-active" data-block-type="forms" data-id="6" draggable="true">
  <div class="container py-5 my-5" style="background-image: url(imgs/shapes/4.svg);">
    <div class=" row justify-content-end">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5 text-left">
        <form class="fdb-box" action="script_login.php" method="POST">
          <div class="row">
            <div class="col">
              <h1>Log In</h1>
              <p class="lead">Ultimate Coder Admin <br>
                  <?php
                  if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ){
                      echo $_SESSION['message'];
                      unset($_SESSION['message']);
                  }
                  ?>
             </p>
            </div>
          </div>
          <div class="row">
            <div class="col mt-4">
              <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
          </div>
          <div class="row mt-4">
            <div class="col">
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
          </div>
          <div class="row mt-4">
            <div class="col">
              <button class="btn btn-secondary" type="submit">Login</button>
            </div>
          </div>
      </form>
      </div>
    </div>
  </div>
</section>
<footer class="fdb-block footer-small bg-dark" data-block-type="footers" data-id="5">
  <div class="container">
      <div class="col-12 col-md-4 mt-4 mt-md-0 text-center text-md-right" style="z-index: 10000;"><p>© 2019 Ultimate-Coder Technovanza</p></div>
  </div>
</footer>
  <script src="js/jq.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/all.min.js"></script>
</body>
</html>
