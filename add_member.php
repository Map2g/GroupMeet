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
$member = $_POST['member_email'];
$admin = $_POST['admin_email'];
$group = $_POST['gname']; 

//Verify that the email entered is associated with a registered account
$sql  = "SELECT user_id FROM Users WHERE email IN ('$admin')"; //SQL statement to locate all records with matching values
$result = mysqli_query($conn, $sql); //SQL statement to run query against all records and see if a record with the matching email exists
$row = mysqli_fetch_assoc($result); //Fetch the query results for User and store the record. $row will be used to add the primary key of the Users record as the foreign key of UserID in Groups

//If a result is returned with the email that the user entered, the group will be created
if (mysqli_num_rows($result) > 0) {
    echo "Record located successfully";
    echo "<br>" . "<br>";
    
    //Run Insert command on the Groups table
    if (mysqli_query($conn, $query)) {
        $last_id = mysqli_insert_id($conn); //Returns the last identity value inserted into a primary key column in a table. Must be placed IMMEDIATELY after the INSERT query or $last_id will be 0
        echo "New record created successfully . <br>";
        echo "Group Name: " . $group_name . "<br>Description: " . $description . " " . "<br>Email " . $row["email"] . "<br>User ID: " . $row["user_id"]. "<br>";
        echo "Group ID: " . $last_id . "<br>" . "<br>";
        
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
