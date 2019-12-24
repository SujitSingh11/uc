<?php
include_once 'db/db.php';
session_start();
    if (isset($_POST['submit'])) {
        for($i = 0; $i < 4; $i++)
        {
            $question = mysqli_real_escape_string($conn,$_POST['question'][$i]);
            $option_1 = mysqli_real_escape_string($conn,$_POST['option_1'][$i]);
            $option_2 = mysqli_real_escape_string($conn,$_POST['option_2'][$i]);
            $option_3 = mysqli_real_escape_string($conn,$_POST['option_3'][$i]);
            $option_4 = mysqli_real_escape_string($conn,$_POST['option_4'][$i]);
            $correct_option = mysqli_real_escape_string($conn,$_POST['correct_option'][$i]);
            $marks = mysqli_real_escape_string($conn,$_POST['marks'][$i]);
            
            if ($correct_option == 'Option 1') {
                $correct_option_code = 1;
            }
            elseif ($correct_option == 'Option 2') {
                $correct_option_code = 2;
            }
            elseif ($correct_option == 'Option 3') {
                $correct_option_code = 3;
            }
            elseif ($correct_option == 'Option 4') {
                $correct_option_code = 4;
            }
            $question_type = mysqli_real_escape_string($conn,$_POST['type'][$i]);
            $sql = "INSERT INTO uc_question (question_type,question_mark, question, option_1, option_2, option_3, option_4, correct_option)
            VALUES('$question_type','$marks','$question','$option_1','$option_2','$option_3','$option_4','$correct_option_code')";
            $result = mysqli_query($conn,$sql);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Questions</title>
</head>
<body>
    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <?php
        for($i=0;$i<4;$i++)
        {
        ?>
            Question <?php echo ($i+1)?>:<br> <textarea type="text" rows="10" columns="40" name="question[]"><pre style='display:inline;'></pre></textarea><br>
            Option 1:<br> <input type="text" name="option_1[]"> <br>
            Option 2:<br> <input type="text" name="option_2[]"> <br>
            Option 3:<br> <input type="text" name="option_3[]"> <br> 
            Option 4:<br> <input type="text" name="option_4[]"> <br>
            <br>
            <label>Correct Option</label>
            <select name='correct_option[]'>
                <option selected>Choose Option...</option>
                <option>Option 1</option>
                <option>Option 2</option>
                <option>Option 3</option>
                <option>Option 4</option>
            </select>
            <label>Marks</label>
            <input type='number' min='1' max='3' name='marks[]' placeholder='Marks'>
            <input type='number' min='1' max='5' name='type[]' placeholder='Type'>
            <hr>
        <?php
        }
        ?>
        <button type="submit" name="submit">Submit</button>
    </form>
    
</body>
</html>