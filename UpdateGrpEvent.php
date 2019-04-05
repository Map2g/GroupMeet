<?php
include 'config.php';

//*******************************************************************************************************************

$GeventID = $_POST['id'];
$geName = mysql_real_escape_string(htmlspecialchars($_POST['gEventName']));
$geDesc = mysql_real_escape_string(htmlspecialchars($_POST['details']));
$geDate = $_POST['gEventDate'];
$geTime = $_POST['gEventTime'];

$sql = "UPDATE GroupEvent
        SET GrpEventName = '$geName', GrpEventDescription = '$geDesc', GrpEventDate = '$geDate', GrpEventTime = '$geTime'
        WHERE GrpEventID = '$GeventID'";

if(mysqli_query($conn, $sql)){
    header('location: get_group_event.php');
}else {
    echo "Error" . $sql . "<br>" . mysqli_error($conn);
}

?>