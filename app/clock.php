<div id="clock">
    
</div>
<?php include('navbar.php'); 
        date_default_timezone_set('Asia/Jerusalem');
        $time = date('F j, Y h:i:s');
 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
      var currenttime = '<?= $time;?>'; // Timestamp of the timezone you want to use, in this case, it's server time
                        var servertime = new Date(currenttime);

                        function padlength(l){
                            var output=(l.toString().length==1)? "0"+l : l;
                            return output;
                        }

                        function DigitalClock(){
                            servertime.setSeconds(servertime.getSeconds()+1);
                            var timestring=padlength(servertime.getHours())+":"+padlength(servertime.getMinutes())+":"+padlength(servertime.getSeconds());
                            $('#clock').html(timestring)
                        }

                        //jquery
                        $(document).ready(function(){
                            setInterval("DigitalClock()", 1000);
                        })

</script>