<?php
 session_start();

 if (!isset($_SESSION['username'])) {
     header("Location: welcome.php");    
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style3.css">

    <title>Previous Records</title>
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <img src="logo.png" class="logo">
            <ul>
                <li><a href="welcome.php">Insert Records</a></li>
                <li><a href="logout.php">LogOut</a></li>
            </ul>
        </div>
        <?php echo "<h1 class='welcomeline'>Welcome, " . $_SESSION['username'] . ".</h1>"; ?>
        <br>
        <div class="table">    
        <table border="1">  
                <tr>
                    <th>Date</th>
                    <th>Sleep Time</th>
                    <th>Wake Time</th>
                    <th>Duration (hrs)</th>
                </tr>
            <?php 
                $connect=mysqli_connect("localhost","root","","login_register") or die("Connection Failed");
                $query="select usi.date,usi.sleeptime,usi.waketime,(24-(usi.waketime-usi.sleeptime)/3600) as 'duration' from users us,userinfo usi where us.username=usi.username";
                $result=mysqli_query($connect,$query);
                while($row=mysqli_fetch_assoc($result))
                    {
            ?>
                <tr>
                    <td><?php echo $row['date']?></td>
                    <td><?php echo $row['sleeptime']?></td>
                    <td><?php echo $row['waketime']?></td>
                    <td><?php echo $row['duration']?></td>
                </tr>
            <?php
                    }
            ?>
        </div>
        <div class="chart-container">
            <canvas id=mycanvas></canvas>    
        </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/chart.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
</body>
</html>
