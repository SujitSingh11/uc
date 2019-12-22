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
</head>
<body>
<header class="bg-dark" data-block-type="headers" data-id="2">
  <div class="container text-center">
      <nav class="navbar">
          <a class="navbar-brand" href=""><img src="imgs/techno_logo.png" width="300" height="70" alt=""></a>
          <div class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="logout.php">Logout</a>
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
        <p class="mt-5">
          <a href="" class="btn btn-light">Create</a>
        </p>
      </div>
    </div>
  </div>
</section>
<section class="fdb-block p-5">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-auto">
        <h2>Quizs List</h2>
        <div class="row">
            <div class="col-auto mt-4 mt-sm-0">
                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Approved</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($query_employee)) {
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $row['first_name'].' '.$row['last_name']?></td>
                                    <td><?= $row['email']?></td>
                                    <td><?php
                                        if ($row['active'] == 1) {
                                            echo "Approved";
                                        }else {
                                            echo "Not Approved";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <form class="form-button-action" action="employee_edit.php" method="POST">
                                            <input type="hidden" name="user_id" value="<?=$row['user_id']?>">
                                            <input type="hidden" name="e_id" value="<?=$row['e_id']?>">
                                            <?php
                                            if ($row['active'] == 0) {
                                            ?>
                                            <button type="submit" data-toggle="tooltip" name="approve" class="btn btn-link btn-primary" data-original-title="Approve">
                                                <i class="fa fa-check-circle"></i>
                                            </button>
                                            <?php
                                            }else { ?>
                                                <button type="submit" data-toggle="tooltip" name="deactivate" class="btn btn-link btn-warning" data-original-title="Deactivate">
                                                    <i class="fa fa-times-circle"></i>
                                                </button> <?php
                                            }
                                            ?>
                                            <button type="submit" data-toggle="tooltip" name="remove" class="btn btn-link btn-danger" data-original-title="Remove Employee">
                                                <i class="fa fa-times"></i>
                                            </button>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/js/froala_editor.pkgd.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
</body>
</html>
