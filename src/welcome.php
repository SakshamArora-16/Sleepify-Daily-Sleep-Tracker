<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style3.css">

    <title>Welcome to Sleepify</title>
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <img src="logo.png" class="logo">
            <ul>
                <li><a href="previous.php">Previous Records</a></li>
                <li><a href="logout.php">LogOut</a></li>
            </ul>
        </div>
        <?php echo "<h1 class='welcomeline'>Welcome, " . $_SESSION['username'] . ".</h1>"; ?>
        <br><br>
        <form action="connect.php" method="post" class="sleepform">

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>

            <div class="form-group">
                <label for="sleeptime">Sleep Time</label>
                <input type="time" class="form-control" id="sleeptime" name="sleeptime">
            </div>

            <div class="form-group">
                <label for="waketime">Wake Up Time</label>
                <input type="time" class="form-control" id="waketime" name="waketime">
            </div>
            <br>
            <input type="submit" class="btn" value="Enter Record">
            <br><br>
            <input type="reset" class="btn" value="Reset">
        </form>
    </div>
</body>
</html>