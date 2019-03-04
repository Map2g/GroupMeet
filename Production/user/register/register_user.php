<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GroupMeet";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// require 'con.php';

//$_POST and $_GET are keywords in PHP that are used for html form tags to get and send information from the form to the database 
$first_name = $_POST['fname'];
$last_name = $_POST['lname'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$password_confirm = $_POST['Confirm'];

//Upload the input fields from the form into the Users database
$sql = "INSERT INTO Users (first_name, last_name, email, password, password_confirm) VALUES ('$first_name', '$last_name', '$email', '$password', '$password_confirm')";

echo $first_name;
echo $last_name;
echo $email;
echo $password;
echo $password_confirm;
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

// https://www.w3schools.com/php/php_mysql_insert.asp
?> 

