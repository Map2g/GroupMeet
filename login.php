<?php

//*****************************************************************************************************

// include("../config.php");
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "GroupMeet"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 
// Check connection
//echo "connected";
$message = "Connected";
echo "<script type='text/javascript'> alert('$message'); </script>"; 
if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error()); 
}

//*****************************************************************************************************

$email = $_POST['Email']; 
$password = $_POST['Password']; 

//*****************************************************************************************************

$sql = "SELECT * FROM Users WHERE email = '$email' and password = '$password'"; //Searching for a matching record in the database
$result = mysqli_query($conn, $sql);//result stores the boolean value of the query from the variable sql
$row = mysqli_fetch_assoc($result);//row stores the value of result 
$count = mysqli_num_rows($result);//counts the number of rows that match result

//*****************************************************************************************************

if ($count == 1) {
    // if( isset($_POST['remember'])){
        setcookie('Email', $email, time() + 86400); 
        session_start(); 
        $_SESSION['Email'] = $email; 
        $login = $_SESSION['Email']; 
        echo $_SESSION['Email']; 
        header("location: ./index.php"); 
    // }
}
else{ 
    echo "Incorrect email or password"; 
} 

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Refresh" content="0; url=/index.php" />
</head>
</html>