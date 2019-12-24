<?php
    include 'db.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $team_id = mysqli_real_escape_string($conn,$_POST['team_id']);
        $batch_id = mysqli_real_escape_string($conn,$_POST['batch_id']);
        
        for ($i=0; $i < 89; $i++)
        {
            $question_id = mysqli_real_escape_string($conn,$_POST['question_id'][$i]);
            $answer = mysqli_real_escape_string($conn,$_POST['answer'][$i]);
            $correct_option = mysqli_real_escape_string($conn,$_POST['correct_option'][$i]);
            $marks = mysqli_real_escape_string($conn,$_POST['marks'][$i]);
            //check which option is selected
            if ($answer == 'A') {
                $answer_code = 1;
            }
            elseif ($answer == 'B') {
                $answer_code = 2;
            }
            elseif ($answer == 'C') {
                $answer_code = 3;
            }
            elseif ($answer == 'D') {
                $answer_code = 4;
            }
            else {
                $answer_code = 0;
            }
            
            if($answer_code!=0)
            {

            }
            
        }
        
    }
?>
