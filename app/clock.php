<?php 
include './navbar.php';
$isIn = false;
$user_id = stripslashes($_SESSION['user_id']);
$user_id = mysqli_real_escape_string($con, $user_id);

if(isset($_POST['enterBtn'])){
    $query = "INSERT INTO `records_data`(`user_id`, `enter_time`) 
    VALUES ('$user_id',CURRENT_TIMESTAMP)";

$result = mysqli_query($con,$query) or die(mysql_error());

}

if(isset($_POST['exitBtn'])){
    $query = "SELECT MAX(id) FROM `records_data`";
    $result2 = mysqli_query($con, $query) or die(mysql_error());
    
    $arr = $result2 -> fetch_array();
    
    $query = "UPDATE `records_data` SET `exit_time`=CURRENT_TIMESTAMP WHERE `id` = '$arr[0]'";

$result = mysqli_query($con,$query) or die(mysql_error());

}
?>


<div id="container">
    <div id="MyClockDisplay" class="clock" onload="showTime()"></div>

    <div id="timeZone"></div>
 
</div>


<form method="post">
<input id="enterBtn" type="submit" name="enterBtn" style="color:green" class="btn" value="Enter">&nbsp&nbsp&nbsp</input>

  <input id="exitBtn" type="submit" name="exitBtn" style="color:red" class="btn" value="Exit"></input>
</form>
<script>
$(document).ready(function(){
    $('#enterBtn').click(function(e){
        e.preventDefault();
        document.getElementById("enterBtn").style.display = "none";
        document.getElementById("exitBtn").style.display = "";
    });
});

$(document).ready(function(){
    $('#exitBtn').click(function(e){
        e.preventDefault();
        document.getElementById("enterBtn").style.display = "";
        document.getElementById("exitBtn").style.display = "none";
    });
});
</script>
<!-- <script>
    let isIn = false
function showEnter(isIn) {
   if (isIn) {
    document.getElementById("enterBtn").style.display = "none";
    console.log("enterBtn")
   } else showExit(isIn)
}
function showExit(isIn) {
    if (!isIn){document.getElementById("exitBtn").style.display = "none";
       console.log("exitBtn")
 }
}
showEnter()
  </script> -->

<script>
    function showTime() {
        let date = new Date();
        let h = date.getHours(); // 0 - 23
        let m = date.getMinutes(); // 0 - 59
        let s = date.getSeconds(); // 0 - 59



        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;

        let time = h + ":" + m + ":" + s + " ";
        document.getElementById("MyClockDisplay").innerText = time;
        document.getElementById("MyClockDisplay").textContent = time;


        setTimeout(showTime, 1000);

    }
    document.getElementById("timeZone").innerHTML = "Time Zone: " + Intl.DateTimeFormat().resolvedOptions().timeZone;

    showTime();
</script>

<style>
    body {
        background: #222;
    }

    .clock {
        transform: translateX(-50%) translateY(-50%);
        color: white;
        font-size: 120px;
        font-family: Orbitron;
        letter-spacing: 7px;
    }

    .btn {
        font-size: 50px;
        font-family: Orbitron;
        letter-spacing: 7px;
    
    }

    #timeZone {

        color: tomato;
        font-size: 20px;
        font-family:Arial, Helvetica, sans-serif;
        transform: translateX(-50%) translateY(-50%);
        text-align: center;

    }

    #container {
        position: absolute;
        top: 50%;
        left: 50%;
    }
</style>