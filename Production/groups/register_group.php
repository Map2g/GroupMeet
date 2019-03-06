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
$group_name = $_POST['gname'];
$description = $_POST['details'];
$admin_email = $_POST['gaemail'];

//Verify that the email entered is associated with a registered account
$sql  = "SELECT * FROM Users WHERE email = '$admin_email' "; //SQL statement to locate all records with matching values
$result = mysqli_query($conn, $sql); //SQL statement to run query against all records and see if a record with the matching email exists
$row = mysqli_fetch_assoc($result); //Fetch the query results and store them into row format for each record found

//If a result is returned with the email that the user entered, the group will be created
if (mysqli_num_rows($result) > 0) {
    echo "Record located successfully";
    echo "<br>" . "<br>";
    
    // //Upload the input fields from the form into the Users database
    $query = "INSERT INTO Groups (GroupName, GroupDesc, UserID) VALUES ('". $group_name . "','" . $description . "'," . $row["user_id"] . ")";
    //echo $query;
    
    //Run Insert command on the Groups table
    if (mysqli_query($conn, $query)) {
        echo "New record created successfully . <br>";
        echo "Group Name: " . $group_name . "<br>Description: " . $description . " " . "<br>Name " . $row["first_name"] . " " . $row["last_name"] . "<br>User ID: " . $row["user_id"]. "<br>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    
} else {
    echo "Record not located";
}

mysqli_close($conn);


//Print all entries in the database
// if (mysqli_num_rows($result) > 0) {
//     // output data of each row
//     while($row = mysqli_fetch_assoc($result)) {
//         echo "id: " . $row["user_id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. "<br>";
//     }
// } else {
//     echo "0 results";
// }

?> 
