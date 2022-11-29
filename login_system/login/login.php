<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="../style.css"/>
</head>
<body>
<?php
include "../../db/db_connection.php";
session_start();
// $_SESSION
if(isset($_REQUEST['username'])){
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con, $username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    // Check user is exist in the database

    $query = "SELECT * FROM `users` WHERE username='$username' AND password='" . md5($password) . "'";
    $result = mysqli_query($con, $query) or die(mysql_error());
    $result2 = mysqli_query($con, $query) or die(mysql_error());

   $row = mysqli_num_rows($result);
    $arr = $result2 -> fetch_array();
    
    if($row == 1){
        $_SESSION['username'] = mysqli_fetch_object($result)->username;
        $_SESSION['user_id'] = $arr["id"];
        //Redirect to app index page 
        header("Location: ../../app/clock.php");
    } else {
        include_once "login_failed_alert.php";
    }
} else {
       include_once "login_form.php";
}
?>
</body>
</html>