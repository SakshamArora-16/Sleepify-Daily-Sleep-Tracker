<?php

	$username = $_POST['username'];
	$date = $_POST['date'];
	$sleeptime = $_POST['sleeptime'];
	$waketime = $_POST['waketime'];

	// Database connection
	$conn = new mysqli('localhost','root','','login_register');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into userinfo(username, date, sleeptime, waketime) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $username, $date, $sleeptime, $waketime);
		$execval = $stmt->execute();
		$stmt->close();
		$conn->close();
	}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style3.css">
    <title>Sleepify</title>
</head>
<body>
    <div class="banner">
            <div class="navbar">
                <img src="logo.png" class="logo">
            </div>
            <h1 style="text-align: center; color: white;">Data Entered Successfully</h1>
            <h1 style="text-align: center color: green;"><a href="welcome.php">Go back</a></h1>
</body>
</html>
