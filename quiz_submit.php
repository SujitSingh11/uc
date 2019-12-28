<?php
    include 'db/db.php';
    session_start();
    if($_SESSION['test_status'] != 1)
    {
        $_SESSION['error'] = "Start a new test or contact the Event Head";
        header('location: index.php');
    }
    else
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $team_id = mysqli_real_escape_string($conn,$_POST['team_id']);
            $batch_id = mysqli_real_escape_string($conn,$_POST['batch_id']);
            $wrong = $right = $attempted = $marks_obtained = $total_marks = 0;
            
            for ($i=0; $i < 90; $i++)
            {
                $question_id = mysqli_real_escape_string($conn,$_POST['question_id'][$i]);
                $answer = mysqli_real_escape_string($conn,$_POST['answer'][$i]);
                $correct_option = mysqli_real_escape_string($conn,$_POST['correct_option'][$i]);
                $marks = mysqli_real_escape_string($conn,$_POST['marks'][$i]);
                
                //check which option is selected
                if ($answer == 'A') {
                    $answer_code = 1;
                    $attempted++;
                }
                elseif ($answer == 'B') {
                    $answer_code = 2;
                    $attempted++;
                }
                elseif ($answer == 'C') {
                    $answer_code = 3;
                    $attempted++;
                }
                elseif ($answer == 'D') {
                    $answer_code = 4;
                    $attempted++;
                }
                else {
                    $answer_code = 0;
                }
                
                //check if right or not
                if ($answer_code == $correct_option) {
                    $right++;
                    $marks_obtained = $marks + $marks_obtained;
                }else {
                    if ($answer_code != 0) {
                        $wrong++;
                        $marks_obtained = $marks_obtained - 1;
                    }
                }
                $total_marks = $total_marks + $marks;
            }
            $not_attempted = 90 - $attempted;
            
            $sql_quiz_result = "INSERT INTO `uc_quiz_result`(`batch_id`, `team_id`, `attempted`, `not_attempted`, `right`, `wrong`, `marks_obtained`, `total_marks`) VALUES('$batch_id','$team_id','$attempted','$not_attempted','$right','$wrong','$marks_obtained','$total_marks')";
            $result_test_result = mysqli_query($conn,$sql_quiz_result);
            $last_result_id = mysqli_insert_id($conn);
            
            for ($i=0; $i < 90; $i++)
            {
                $question_id = mysqli_real_escape_string($conn,$_POST['question_id'][$i]);
                $answer = mysqli_real_escape_string($conn,$_POST['answer'][$i]);
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
                    $sql_test_attempted = "INSERT INTO uc_quiz_attempt (result_id, question_id, answer)
                                        VALUES('$last_result_id','$question_id','$answer_code')";
                    $result_test_attempted = mysqli_query($conn,$sql_test_attempted);
                }
            }
            $_SESSION['test_status'] = 0;
            $_SESSION['error'] = "Round 1 completed please take a break till the results are declared.";
            header('location: index.php');
        }
    }
    
?>
