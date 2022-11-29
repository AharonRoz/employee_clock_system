<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="../style.css"/>
</head>
<body>
<?php
include '../../db/db_connection.php';
// When form submitted, insert values into the database.
if(isset($_REQUEST['username'])){
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con, $username);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);

    $query = "INSERT into `users` (username, password, email)
              VALUES ('$username', '" . md5($password) . "', '$email')";

    $result = mysqli_query($con,$query) or die(mysql_error());

    if( $result ){
        include_once 'signup_sucsses.php';
    }
} else {
    include_once 'signup_form.php';
}


?>
</body>
</html>