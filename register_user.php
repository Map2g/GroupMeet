<?php

//*****************************************************************************************************

include("../config.php");

//*****************************************************************************************************

//$_POST and $_GET are keywords in PHP that are used for html form tags to get and send information from the form to the database 
$first_name = $_POST['fname'];
$last_name = $_POST['lname'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$password_confirm = $_POST['Confirm'];

//*****************************************************************************************************

//Upload the input fields from the form into the Users database
$sql = "INSERT INTO Users (first_name, last_name, email, password, password_confirm) VALUES ('$first_name', '$last_name', '$email', '$password', '$password_confirm')";

//*****************************************************************************************************

echo $first_name;
echo "\r\n";
echo $last_name;
echo "\r\n";
echo $email;
echo "\r\n";
echo $password;
echo "\r\n";
echo $password_confirm;
echo "\r\n";

//*****************************************************************************************************

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully"; //If data entered is within the constraints and has been stored in the Users table
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);//If data entered is not within constraints and has not been stored in the Users table
}

mysqli_close($conn);

// https://www.w3schools.com/php/php_mysql_insert.asp
?> 
<html>
<head>
<meta http-equiv="Refresh" content="4; url=/index.php" />
</head>
</html>