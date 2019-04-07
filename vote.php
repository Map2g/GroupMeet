<?php

include 'config.php';
session_start();

//Gather the group event id
$GeventID = $_POST['eventid'];

//gather the user id
$sqlU  = "SELECT user_id, first_name FROM Users WHERE Users.email = '" . $_SESSION['Email'] . "'";
$resultU = mysqli_query($conn, $sqlU); //SQL statement to run query against all records and see if a record with the matching email exists
$rowU = mysqli_fetch_assoc($resultU); //Fetch the query results for User and store the record. $row will be used to add the primary key of the Users record as the foreign key of UserID in Groups
$U_ID = $rowU[user_id];

if(isset($_POST[$GeventID])){
    $vote = $_POST[$GeventID];
    if ($vote == "up"){
      $sql = "INSERT INTO GroupEvent_User_Vote
              (GroupEventID, User_ID, Decision) 
              VALUES ('". $GeventID . "', '". $U_ID . "', 'Y')";
      
      
    } 
    else if ($vote == "down"){
      $sql = "INSERT INTO GroupEvent_User_Vote
              (GroupEventID, User_ID, Decision) 
              VALUES ('". $GeventID . "', '". $U_ID . "', 'N')";
    }
} 
else {
  $message = "No value was selected.";
  echo '<script type="text/javascript">
        alert("'.$message .'");
        location="group_lookup.php";
        </script>';
}

if(mysqli_query($conn, $sql)){
    header('location: get_group_event.php');
}else {
    echo "Error" . $sql . "<br>" . mysqli_error($conn);
}

?>