<?php
/* User login process, checks if user exists and password is correct */
require 'db/db.php';
session_start();

// Escape email to protect against SQL injections
$username = mysqli_real_escape_string($conn,$_POST['username']);
$result = $conn->query("SELECT * FROM uc_user WHERE username='$username'");

if ( $result->num_rows == 0 ){
     // User doesn't exist
    $_SESSION['message'] = "User with that Username doesn't exist!";
    header("location: uc_admin_login.php");
}
else {
    // User exists
    $user = $result->fetch_assoc();

    // Password verify
    if ($_POST['password'] == $user['password']) {

        // Initilize the session variables
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['f_name'] = $user['f_name'];
        $_SESSION['l_name'] = $user['l_name'];

        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        header("location: admin_index.php");

    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: uc_admin_login.php");
    }
}
?>
