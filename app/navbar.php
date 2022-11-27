<?php
include '../db/db_connection.php';
include '../db/auth_session.php';
?>

<ul>
  <li><span class='user-area'>Hello, <?= $_SESSION['username'] ?></span></li>
  <li><a href="./clock.php">Clock</a></li>
  <li><a href="./timer.php">Timer</a></li>
  <li><a href="../login_system/logout.php">Logout</a></li>
</ul>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<style>

    
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a,li span {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, li span:hover {
  background-color: #111;
}

.user-area{
  color: white;
  text-align: center;
  padding: 14px 16px;

}

</style>