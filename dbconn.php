<?php
    session_start();
    $server = "localhost";
    $uname = "root";
    $pswd = "";
    $database = "everything";
    
    $mysqli = mysqli_connect($server, $uname, $pswd, $database);
    // Check for errors
    if ($mysqli->connect_error) {
    	die("Connection failed: " . $mysqli->connect_error);
    }
    
?>