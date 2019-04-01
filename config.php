<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GroupMeet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 
// Check connection
//$message = "Connected.";
//echo "<script type='text/javascript'>alert('$message');</script>";              /*This breaks the page footer. IDK why...*/

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>