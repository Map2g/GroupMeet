<?php

include 'config.php';

$GeventID = $_POST['eventid'];

if(isset($_POST[$GeventID])){
  $vote = $_POST[$GeventID];
  if ($vote == "up"){
    $sql = "UPDATE GroupEvent
            SET YesVote = YesVote + 1
            WHERE GrpEventID = '". $GeventID . "'";
  } else if ($vote == "down"){
    $sql = "UPDATE GroupEvent
            SET NoVote = NoVote + 1
            WHERE GrpEventID = '". $GeventID . "'";
  }
} else {
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