<?php
    session_start();
    include_once 'db/db.php';
    $team_name = mysqli_real_escape_string($conn,$_POST['team_name']);  
    $techno_id_1 = $_POST['techno_id_1'];
    $techno_id_2 = $_POST['techno_id_2'];
    $teammate_1_name = mysqli_real_escape_string($conn,$_POST['teammate_1_name']);
    $teammate_2_name = mysqli_real_escape_string($conn,$_POST['teammate_2_name']);
    $teammate_1_no = $_POST['teammate_1_no'];
    $teammate_2_no = $_POST['teammate_2_no'];


    if(empty($techno_id_1) OR empty($techno_id_2) OR empty($teammate_1_name) OR empty($teammate_2_name) OR empty($team_name) OR empty($teammate_2_no) OR empty($teammate_1_no))
    {
        $_SESSION['error'] = "Some fields are missing, try again.";
        header('location: index.php');
    }
    else
    {
        if(!empty($_POST['test_status']))
        {
            $test_status = mysqli_real_escape_string($conn,$_POST['test_status']);
            $_SESSION['test_status'] = $test_status;
        }
        else
        {
            $_SESSION['error'] = "Start a new quiz or contact a event head";
            header('location: index.php');
        }
        $result = $conn->query("SELECT * FROM uc_team WHERE team_name='$team_name'");
        if($result->num_rows == 0)
        {
            $add_team = "INSERT INTO `uc_team`( `team_name`, `techno_id_1`, `teammate_1_name`, `teammate_1_no`, `techno_id_2`, `teammate_2_name`, `teammate_2_no`) VALUES ('$team_name',$techno_id_1,'$teammate_1_name',$teammate_1_no,$techno_id_2,'$teammate_2_name',$teammate_2_no)";
            $add_team_sql = mysqli_query($conn,$add_team);
            
            $result = $conn->query("SELECT * FROM uc_team WHERE team_name='$team_name'");

            if($result->num_rows > 0)
            {
                $team = $result->fetch_assoc();
                $team_id = $team['team_id'];
                $batch_id = $_SESSION['batch_id'];
                $add_team = "INSERT INTO uc_batch_team (batch_id,team_id) VALUES ('$batch_id','$team_id')";
                $add_team_sql = mysqli_query($conn,$add_team);

                $_SESSION['team_id'] = $team['team_id'];
                $_SESSION['techno_id'] = $team['techno_id'];
                $_SESSION['team_name'] = $team['team_name'];

                header("location: quiz.php");
            }
            else
            {
                $_SESSION['error'] = "Something went wrong contact event manager.";
                header('location: index.php');
            }
        }
        else
            {
                $_SESSION['error'] = "Team already attempted the quiz.";
                header('location: index.php');
            }
    }
?>