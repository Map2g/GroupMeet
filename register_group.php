<?php

// include("..\config.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GroupMeet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 
// Check connection
//$message = "Connected.";
//echo "<script type='text/javascript'>alert('$message');</script>";              /*This breaks the page footer. IDK why...*/

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();

//$_POST and $_GET are keywords in PHP that are used for html form tags to get and send information from the form to the database 
$group_name = mysql_real_escape_string(htmlspecialchars($_POST['gname']));
$description = mysql_real_escape_string(htmlspecialchars($_POST['details']));

//Verify that the email entered is associated with a registered account
$sql  = "SELECT user_id FROM Users WHERE Users.email = '" . $_SESSION['Email'] . "'"; //SQL statement to locate all records with matching values
$result = mysqli_query($conn, $sql); //SQL statement to run query against all records and see if a record with the matching email exists
$row = mysqli_fetch_assoc($result); //Fetch the query results for User and store the record. $row will be used to add the primary key of the Users record as the foreign key of UserID in Groups
$query = "INSERT INTO Groups (GroupName, GroupDesc, UserID) VALUES ('". $group_name . "', '" . $description . "', ". $row["user_id"] .")"; //Upload the input fields from the form into the Groups Table

//If a result is returned with the email that the user entered, the group will be created
if (mysqli_num_rows($result) > 0) {
    // echo "Record located successfully";
    // echo "<br>" . "<br>";
    
    //Run Insert command on the Groups table
    if (mysqli_query($conn, $query)) {
        $last_id = mysqli_insert_id($conn); //Returns the last identity value inserted into a primary key column in a table. Must be placed IMMEDIATELY after the INSERT query or $last_id will be 0
        // echo "New record created successfully . <br>";
        // echo "Group Name: " . $group_name . "<br>Description: " . $description . " " . "<br>Email " . $row["email"] . "<br>User ID: " . $row["user_id"]. "<br>";
        // echo "Group ID: " . $last_id . "<br>" . "<br>";
        
        //If the group is successfully created, add the admin as a member of the group
        $admin = "INSERT INTO MyGuests (CrowdID, GuestID) VALUES (". $last_id .", ". $row["user_id"] .")"; //Add the admin as a member of the group
        if (mysqli_query($conn, $admin)){
            $message = "Group created successfully.";
            echo '<script type="text/javascript">
            alert("'.$message .'");
            location="mess.php";
            </script>';
        }else {
            $message = 'Query error: '. $admin . ' Connection error: ' . mysqli_error($conn); 
            echo '<script type="text/javascript">
            alert("'.$message .'");
            location="./register_group.html";
            </script>';
        }
        
    } else {
        $message = 'Query error: '. $query . ' Connection error: ' . mysqli_error($conn); 
        echo '<script type="text/javascript">
        alert("'.$message .'");
        location="./register_group.html";
        </script>';
    }
    
} else {
    $message = 'Record not located.'; 
    echo '<script type="text/javascript">
    alert("'.$message .'");
    location="./register_group.html";
    </script>';
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
