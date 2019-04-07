<?php

//*****************************************************************************************************

include("config.php");

//*****************************************************************************************************

//$_POST and $_GET are keywords in PHP that are used for html form tags to get and send information from the form to the database 
$first_name = mysql_real_escape_string(htmlspecialchars($_POST['fname']));
$last_name = mysql_real_escape_string(htmlspecialchars($_POST['lname']));
$email = $_POST['Email'];
$password = mysql_real_escape_string(htmlspecialchars($_POST['Password']));

//*****************************************************************************************************

// $hashed = password_hash('sha512', $password);
$hashed = password_hash($password, PASSWORD_DEFAULT);

//Upload the input fields from the form into the Users database
$sql = "INSERT INTO Users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";

//*****************************************************************************************************

// echo $first_name;
// echo "\r\n";
// echo $last_name;
// echo "\r\n";
// echo $email;
// echo "\r\n";
// echo $password;
// echo "\r\n";
// echo $password_confirm;
// echo "\r\n";

//*****************************************************************************************************

if (mysqli_query($conn, $sql)) {
    echo '<script type="text/javascript">
        alert("New user added successfully");
        location="./login.html";
        </script>';
} else {
    $message = mysqli_error($conn);     //If data entered is not within constraints and has not been stored in the Users table
    echo '<script type="text/javascript">
        alert("'.$message .'");
        location="./register_user.html";
        </script>';
}

mysqli_close($conn);

?> 

<!--<html>-->
<!--<head>-->
<!--<meta http-equiv="Refresh" content="4; url=/index.php" />-->
<!--</head>-->
<!--</html>-->