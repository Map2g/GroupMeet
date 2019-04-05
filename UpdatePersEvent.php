<?php
include 'config.php';

//*******************************************************************************************************************

$eventID = $_POST['id'];
$eName = mysql_real_escape_string(htmlspecialchars($_POST['pEventName']));
$eDesc = mysql_real_escape_string(htmlspecialchars($_POST['details']));
$eDate = $_POST['pEventDate'];
$eTime = $_POST['pEventTime'];

$sql = "UPDATE Event
        SET EventName = '$eName', EventDesc = '$eDesc', EventDate = '$eDate', EventTime = '$eTime'
        WHERE EventID = '$eventID'";

if(mysqli_query($conn, $sql)){
    header('location: get_personal_event.php');
}else {
    echo "Error" . $sql . "<br>" . mysqli_error($conn);
}

?>