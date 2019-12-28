<?php
    include 'db/db.php';
    session_start();
    $round = $conn->query("SELECT * FROM uc_rounds");
    $row = $round->fetch_assoc();
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
              <h3>Ultimate Coder Round 1</h3>
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
          <h1>Ultimate Coder <?php  if($row['round_1']==1) { echo 'Round 1'; } elseif($row['round_2']==1) { echo 'Round 2'; } elseif($row['round_3']==1) { echo 'Round 3'; } elseif($row['round_4']==1) { echo 'Round 4'; } ?> </h1>
          <p class="lead">
          <?php
            if($row['round_1']==1)
            {
                echo "Welcome to the first round of I-Code's biggest event, here we will test your knowledge to see if you have what it takes to be the Ultimate Code This round is going to be an MCQ based one where you need to solve 90 questions in 10 minutes. Since we want suitable candidates, we have incorporated negative marking for the wrong answers.";

            }
            elseif($row['round_2']==1)
            {
                echo "Now that we decided that you’re a suitable candidate, we need to begin testing your worth. This round is going to be based on the Soul and Power stones. If you know what those Infinity stones are capable of, you should get a clue about what kind of testing would happen. You will be given questions that you need to solve with us snapping away at your complete potential.";
            }
            elseif($row['round_3']==1)
            {
               echo "By now you’ve probably gotten a taste of what we expect from our candidates. But wait, it gets even tougher. This round is going to be based on the Mind stone. Altering the human memory and bending it to your will has been a secret desire that we’ve all had. We are going to give you some problems to solve, however, you won’t have a few of your memories in the round.";
            }
            elseif($row['round_4']==1)
            {
                echo "This is the final round, we want to remain true to our task of finding a suitable wielder. We are going to have a list of tough questions for you to solve. However, someone snapped away the explanations of the questions. All you get is the Input and the Output fields to work with. Do you have it in you to find out the solution? Are you worthy of wielding the power of the Infinity stones?";
            }
          ?>
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
              $row_batch = $batch->fetch_assoc();
              $_SESSION['batch_id'] = $row_batch['batch_id'];
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
<?php if($row['round_1']==1){ ?>
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
            <input type="number" class="form-control my-2" placeholder="First Teammate Techno ID" name="techno_id_1"/>
            <input type="text" class="form-control my-2" placeholder="First Teammate Name" name="teammate_1_name">
            <input type="number" class="form-control my-2" placeholder="First Teammate Number" name="teammate_1_no"/>
            <input type="number" class="form-control my-2" placeholder="Second Teammate Techno ID" name="techno_id_2"/>
            <input type="text" class="form-control my-2" placeholder="Second Teammate Name" name="teammate_2_name">
            <input type="number" class="form-control my-2" placeholder="Second Teammate Number" name="teammate_2_no"/>
            <input type="hidden" value="1" name="test_status">
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
<?php } ?>
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
