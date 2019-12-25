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
  <title>Ultimate Coder</title>
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
<section class="fdb-block py-0">
  <div class="container py-5 my-5" style="background-image: url(imgs/shapes/2.svg);">
    <div class="row justify-content-center py-5">
      <div class="col-12 col-md-10 col-lg-8 text-center">
        <div class="fdb-box">
          <h1>Ultimate Coder</h1>
          <p class="lead">
            Welcome to you first round of I-Code biggest event, here we will test your knowledge to see if you have what it takes to be the Ultimate Coder
          </p>
          <p>
            <?php
                if( isset($_SESSION['error']) AND !empty($_SESSION['error']) ):
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                endif;
            ?>
          </p>
          <p class="mt-4">
          <?php
            $batch = $conn->query("SELECT * FROM uc_batch WHERE active=1");
            if($batch->num_rows != 0)
            {
              $row = $batch->fetch_assoc();
              $_SESSION['batch_id'] = $row['batch_id'];
              ?>
                <button class="btn btn-primary px-4" data-toggle="modal" data-target="#start_test">Start</button>
              <?php
            }
            else
            {
              ?>
                <button class="btn btn-primary px-4 disabled">Waiting</button>
              <?php
            }
          ?>
            
          </p>
        </div>
      </div>
    </div>
  </div>
<div class="modal fade" id="start_test" tabindex="-1" role="dialog" aria-labelledby="start_test" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="start_test">Enter Team Deatils</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="quiz_start_script.php">
          <div class="px-3">
            <input type="text" class="form-control my-2" placeholder="Team Name" name="team_name"/>
            <input type="text" class="form-control my-2" placeholder="First Teammate Name" name="teammate_1">
            <input type="text" class="form-control my-2" placeholder="Second Teammate Name" name="teammate_2">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/js/froala_editor.pkgd.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
</body>
</html>
