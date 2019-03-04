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
$group_name = $_POST['gname'];
$admin_email = $_POST['gaemail'];
$description = $_POST['details'];

//Verify that the email entered is associated with a registered account
$query  = "SELECT 
            email 
        FROM
            Users
        WHERE 
            email = '$admin_email'";
//If record does not exist           
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
else{
    $row = mysql_fetch_row($result);
}

//Upload the input fields from the form into the Users database
$sql = "INSERT INTO Groups (GroupName, GroupDesc, UserID) VALUES ('$group_name', '$description', '$row[0]')";

echo $group_name;
echo $admin_email;
echo $description;

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

// https://www.w3schools.com/php/php_mysql_insert.asp
?> 

