<?php
    session_start();
    include_once 'db/db.php';
    
    $team_name = mysqli_real_escape_string($conn,$_POST['team_name']);  
    $teammate_1 = mysqli_real_escape_string($conn,$_POST['teammate_1']);
    $teammate_2 = mysqli_real_escape_string($conn,$_POST['teammate_2']);

    if(!isset($team_name) OR !isset($teammate_1) OR !isset($teammate_2))
    {
        $_SESSION['error'] = "Some fields are missing, try again.";
        header('location: index.php');
    }
    else
    {
        $result = $conn->query("SELECT * FROM uc_team WHERE team_name='$team_name'");
        if($result->num_rows == 0)
        {
            $add_team = "INSERT INTO uc_team (team_name,teammate_1,teammate_2) VALUES ('$team_name','$teammate_1','$teammate_2')";
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
                $_SESSION['team_name'] = $team['team_name'];
                $_SESSION['teammate_1'] = $team['teammate_1'];
                $_SESSION['teammate_2'] = $team['teammate_2'];
                header("location: quiz.php");
            }
            else
            {
                $_SESSION['error'] = "Something went wrong contact event head.";
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