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

//$_POST and $_GET are keywords in PHP that are used for html form tags to get and send information from the form to the database 
$username = $_POST['uname'];

//Create query instance to select all groups associated with an account
$sql = "SELECT 
            Users.email,
            Groups.GroupName,
            Groups.GroupID
        FROM 
            Users JOIN Groups ON Users.user_id = Groups.UserID
        WHERE
            Users.email IN ('$username')";
            
$result = mysqli_query($conn, $sql); //SQL statement to run query against all records and see if a record with the matching username exists

//If a result is returned with the username entered, the group will be listed
if (mysqli_num_rows($result) > 0) {
    echo "Record located successfully";
    echo "<br>" . "<br>";
    
    //Print all records found from $results query
    //Like Reading Files, the loop will continue to find the next record until it has reached the end of the table.
        //The new record is stored in $row as it is searched and reinitialized each time

    $row = mysqli_fetch_assoc($result); //Fetch the query results and store them into row format for each record found
    while($row){
       echo  "Group Name: " . $row["GroupName"] . "<br>Admin: " . $row["email"]. "<br>" . "<br>";
       $row = mysqli_fetch_assoc($result);
    }

} else {
    echo "Record not located";
}

mysqli_close($conn);
?>