<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GroupMeet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 
// Check connection
$message = "Connected.";
echo "<script type='text/javascript'>alert('$message');</script>";              /*This breaks the page footer. IDK why...*/

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();
// $sql = "SELECT * FROM Users WHERE email = 'pass@hash.com'"; //Searching for a matching record in the database
// $result = mysqli_query($conn, $sql);//result stores the boolean value of the query from the variable sql
// $row = mysqli_fetch_assoc($result); //row stores the value of result 
// $pass = test123;
// $hash = password_hash($pass, PASSWORD_DEFAULT);
// $hash_check1 = password_verify($pass, $hash);
// $hash_check = password_verify($pass, $row['password']);

$sql = "SELECT * FROM Users WHERE email = '" . $_SESSION['Email'] . "'"; 
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result); 

if($_SESSION['Email'] = $row['email']){
  echo $row['email'];
}
//else if ({
// header("location: ./login.html");
// }
// echo $row['password'];
// echo "<br>";
// echo $hash_check1;
// echo "<br>";
// echo $hash_check;
// echo "<br>";
echo "Welcome " . $_SESSION['Email'];
?>