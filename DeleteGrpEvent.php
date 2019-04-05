<?php
include 'config.php';

//*******************************************************************************************************************

$GeventID = $_POST['id'];

$sql = "DELETE FROM GroupEvent WHERE GrpEventID = '$GeventID'";

if(mysqli_query($conn, $sql)){
    header("location: get_group_event.php");
}else {
    echo "Error" . $sql . "<br>" . mysqli_error($conn);
}