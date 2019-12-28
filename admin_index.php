<?php
    include 'db/db.php';
    session_start();
    if($_SESSION["logged_in"]!=true)
    {
      $_SESSION['message']="Login First";
      header("location: uc_admin_login.php");
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      if(isset($_POST['create_batch']))
      {
        $userid = mysqli_real_escape_string($conn,$_POST['user_id']);
        $sql_check = $conn->query("SELECT * FROM uc_batch WHERE active = 1");
        if($sql_check->num_rows == 0)
        {
          $add_batch = "INSERT INTO uc_batch (user_id) VALUES ($userid)";
          $add_batch_sql = mysqli_query($conn,$add_batch);
          $_SESSION['error'] = "Batch Added!";
        }
        else
        {
          $_SESSION['error'] = "Another Batch is still active!";
        }
      }
      if(isset($_POST['activate']))
      {
        $sql_check = $conn->query("SELECT * FROM uc_batch WHERE active = 1");
        if($sql_check->num_rows == 0)
        {
          $batch_id = mysqli_real_escape_string($conn,$_POST['batch_id']);
          $update_status = "UPDATE `uc_batch` SET `active`= 1 WHERE batch_id = $batch_id";
          $active_batch = mysqli_query($conn,$update_status);
          $_SESSION['error'] = "Batch ".$batch_id." Test Activated";
        }
        else
        {
          $_SESSION['error'] = "Another Batch is still active!";
        }
      }
      if(isset($_POST['deactivate']))
      {
        $batch_id = mysqli_real_escape_string($conn,$_POST['batch_id']);
        $update_status = "UPDATE `uc_batch` SET `active`= 0 WHERE batch_id = $batch_id";
        $deactive_batch = mysqli_query($conn,$update_status);
        $_SESSION['error'] = "Batch ".$batch_id." Test Deactivated";
      }
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="css/froala_blocks.css">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
  <link href="css/all.css" rel="stylesheet">
</head>
<body>
<header class="bg-dark" data-block-type="headers" data-id="2">
  <div class="container text-center">
      <nav class="navbar">
          <a class="navbar-brand" href=""><img src="imgs/techno_logo.png" width="300" height="70" alt=""></a>
          <div class="navbar-nav">
              <li class="nav-item active">
                <a style="color:black;" class="nav-link btn btn-light p-2 px-2" href="logout.php">Logout</a>
              </li>
          </div>
      </nav>
  </div>
</header>
<section class="fdb-block fdb-viewport bg-dark" style="background-image: url(imgs/hero/red.svg);">
  <div class="container align-items-center justify-content-center d-flex">
    <div class="row align-items-center text-left">
      <div class="col-12 col-sm-10 col-md-8 col-lg-8">
        <h1>Welcome <?php echo $_SESSION['f_name']." ".$_SESSION['l_name'] ?></h1>
        <p class="lead">Create a new Quiz for new batch, you can activate or deactivate the test from the table below.</p>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
          <input type="hidden" name="user_id" value="<?=$_SESSION['user_id']?>">
          <button type="submit" name="create_batch" class="btn btn-light">Create Batch</button>
        </form>
      </div>
    </div>
  </div>
</section>
<section class="fdb-block p-5">
  <div class="container">
    <?php
        if( isset($_SESSION['error']) AND !empty($_SESSION['error']) ){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong><?=$_SESSION['error']?></strong> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php 
            unset($_SESSION['error']);
        }
      ?>
    <div class="row align-items-center justify-content-center">
      <div class="card">
        <div class="card-header">
          <div class="card-title"></div>
          <h2>Quizs List</h2>
        </div>
        <div class="row">
            <div class="col-auto mt-4 mt-sm-0">
              <div class="card-body">
                <div class="table-responsive">
                    <table id="add-row" style="width:800px;" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Batch No.</th>
                                <th>Create Time</th>
                                <th>Status</th>
                                <th style="width: 15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $sql_batch = $conn->query("SELECT * FROM uc_batch");
                                while ($row = mysqli_fetch_assoc($sql_batch)) {
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $row['time']?></td>
                                    <td><?php 
                                        if($row['active']==1){
                                            echo "Active";
                                        }else {
                                            echo "Not Active";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <form class="form-button-action" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                                            <input type="hidden" name="user_id" value="<?=$_SESSION['user_id']?>">
                                            <input type="hidden" name="batch_id" value="<?=$row['batch_id']?>">
                                            <?php
                                            if ($row['active'] == 0) {
                                            ?>
                                            <button type="submit" data-toggle="tooltip" data-placement="right" title="Activate" name="activate" class="btn btn-primary">
                                                <i class="fa fa-check-circle"></i>
                                            </button>
                                            <?php
                                            }
                                            else
                                            { ?>
                                                <button type="submit" data-toggle="tooltip" data-placement="right" title="Deactivate" name="deactivate" class="btn btn-warning">
                                                    <i class="fa fa-times-circle"></i>
                                                </button> <?php
                                            }
                                            ?>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                                }
                            ?>
                        </tbody>
                    </table>
            </div>
            <button class="btn btn-success px-5" data-toggle="modal" data-target="#selected_team">Selected Teams</button>
        </div>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="selected_team" tabindex="-1" role="dialog" aria-labelledby="selected_team" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="start_test">Selected Team</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-auto mt-4 mt-sm-0">
            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>Team No.</th>
                            <th>Batch No.</th>
                            <th>Team Name</th>
                            <th>Partcipant 1</th>
                            <th>Partcipant 2</th>
                            <th>Marks</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        $sql_selected = $conn->query("SELECT * FROM uc_quiz_result ORDER BY marks_obtained DESC LIMIT 24");
                        while ($row = mysqli_fetch_assoc($sql_selected)) {
                          $team_id = $row['team_id'];
                          $batch_id = $row['batch_id'];
                          $sql_team = $conn->query("SELECT * FROM uc_team WHERE team_id = $team_id");
                          $row_team = mysqli_fetch_assoc($sql_team);
                    ?>
                        <tr>
                          <td><?= $no ?></td>
                          <td><?= $row['batch_id']?></td>
                          <td><?= $row_team['team_name']?></td>
                          <td><?= $row_team['teammate_1']?></td>
                          <td><?= $row_team['teammate_2']?></td>
                          <td><?= $row['marks_obtained']?></td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
              </div>
            </div>    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
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
