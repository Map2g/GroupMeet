<?php

include("config.php");
session_start();

$sqlU  = "SELECT user_id, first_name FROM Users WHERE Users.email = '" . $_SESSION['Email'] . "'";
$resultU = mysqli_query($conn, $sqlU); //SQL statement to run query against all records and see if a record with the matching email exists
$rowU = mysqli_fetch_assoc($resultU); //Fetch the query results for User and store the record. $row will be used to add the primary key of the Users record as the foreign key of UserID in Groups
$U_ID = $rowU[user_id];

//$_POST and $_GET are keywords in PHP that are used for html form tags to get and send information from the form to the database 
$pEventName = $_POST['pEventName'];
$pEventDate = $_POST['pEventDate'];
$pEventTime = $_POST['pEventTime'];
$pEventDesc = $_POST['details'];

//Verify that the email entered is associated with a registered account
//$sql  = "SELECT user_id FROM Users WHERE email IN ('$admin_email')"; //SQL statement to locate all records with matching values
//$result = mysqli_query($conn, $sql); //SQL statement to run query against all records and see if a record with the matching email exists
//$row = mysqli_fetch_assoc($result); //Fetch the query results for User and store the record. $row will be used to add the primary key of the Users record as the foreign key of UserID in Groups
$query = "INSERT INTO Event (EventName, EventDesc, EventDate, EventTime, UserID) VALUES ('". $pEventName . "', '" . $pEventDesc . "', '". $pEventDate . "', '". $pEventTime . "', ". $U_ID .")"; //Upload the input fields from the form into the Groups Table

// //If a result is returned with the email that the user entered, the group will be created
// if (mysqli_num_rows($result) > 0) {
//     echo "Record located successfully";
//     echo "<br>" . "<br>";
    
    //Run Insert command on the Groups table
    if (mysqli_query($conn, $query)) {
        $last_id = mysqli_insert_id($conn); //Returns the last identity value inserted into a primary key column in a table. Must be placed IMMEDIATELY after the INSERT query or $last_id will be 0
        echo '<script type="text/javascript">
        alert("New record added successfully");
        location="get_personal_event.php";
        </script>';
    } else {
        $message = "New record could not be added";
        echo '<script type="text/javascript">
        alert($message);
        location="get_personal_event.php";
        </script>';
    }
    
// } else {
//     echo "Record not located";
// }

mysqli_close($conn);