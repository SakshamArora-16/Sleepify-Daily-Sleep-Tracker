<?php

    header('Content-Type: application/json');

    define('DB_HOST', '127.0.0.1');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'login_register');

    $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if(!$mysqli){
    die("Connection failed: " . $mysqli->error);
    }

    $query = sprintf("SELECT date,(24-(waketime-sleeptime)/3600) as 'duration' FROM userinfo ORDER BY date");

    $result = $mysqli->query($query);

    $data = array();
    foreach ($result as $row) {
    $data[] = $row;
    }

    $result->close();

    $mysqli->close();

    print json_encode($data);
?>