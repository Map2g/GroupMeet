<?php

include("config.php");
session_start();

//$_POST and $_GET are keywords in PHP that are used for html form tags to get and send information from the form to the database 
$gEventName = mysql_real_escape_string(htmlspecialchars($_POST['gEventName']));
$gEventDate = date("Y-m-d", strtotime($_POST['gEventDate']));
$gEventTime = date("H:i:s", strtotime($_POST['gEventTime']));
$gEventDesc = mysql_real_escape_string(htmlspecialchars($_POST['gdetails']));

if(!empty($_GET['gid'])){
    $_SESSION['group'] =  $_GET['gid']; //acquire the associated group clicked by user
}
$groupId = $_SESSION['group'];

//Verify that the email entered is associated with a registered account
//$sql  = "SELECT user_id FROM Users WHERE email IN ('$admin_email')"; //SQL statement to locate all records with matching values
//$result = mysqli_query($conn, $sql); //SQL statement to run query against all records and see if a record with the matching email exists
//$row = mysqli_fetch_assoc($result); //Fetch the query results for User and store the record. $row will be used to add the primary key of the Users record as the foreign key of UserID in Groups
$query = "INSERT INTO GroupEvent (GrpEventName, GrpEventDescription, GrpEventDate, GrpEventTime, GroupID) VALUES ('". $gEventName . "', '" . $gEventDesc . "', '". $gEventDate . "', '". $gEventTime . "', ". $groupId .")"; //Upload the input fields from the form into the Groups Table

// //If a result is returned with the email that the user entered, the group will be created
// if (mysqli_num_rows($result) > 0) {
//     echo "Record located successfully";
//     echo "<br>" . "<br>";

    //Run Insert command on the Groups table
    if (mysqli_query($conn, $query)) {
        //$last_id = mysqli_insert_id($conn); //Returns the last identity value inserted into a primary key column in a table. Must be placed IMMEDIATELY after the INSERT query or $last_id will be 0
        echo '<script type="text/javascript">
        alert("New record added successfully");
        location="./get_group_event.php";
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("New user could not be added");
        location="./register_group_event.html";
        </script>';
    }
    
mysqli_close($conn);

?>