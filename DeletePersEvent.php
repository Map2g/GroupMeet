<?php
include 'config.php';

//*******************************************************************************************************************

$eventID = $_POST['id'];

$sql = "DELETE FROM Event WHERE EventID = '$eventID'";

if(mysqli_query($conn, $sql)){
    header("location: get_personal_event.php");
}else {
    echo "Error" . $sql . "<br>" . mysqli_error($conn);
}