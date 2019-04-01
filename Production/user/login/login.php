<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GroupMeet";

session_start();
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//*****************************************************************************************************

$email = $_POST['Email'];
$password = $_POST['Password'];

//*****************************************************************************************************

$sql = "SELECT * FROM Users WHERE email = '$email'"; //Searching for a matching record in the database
$result = mysqli_query($conn, $sql);//result stores the boolean value of the query from the variable sql
$row = mysqli_fetch_assoc($result);//row stores teh value of result 
echo $row;

if (mysqli_num_rows($result) > 0) {
    echo "You have been logged in";
    echo "<br>" . "<br>";
    session_register("email");
    $_SESSION['login_user'] = $email;
    //setcookie("loginCredentials", $email, time() * 7200);
}
else{
    echo "Incorrect email or password";
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Refresh" content="0; url=/index.html" />
</head>
</html>