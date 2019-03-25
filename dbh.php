<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GroupMeet";

//*****************************************************************************************************

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//*****************************************************************************************************

$sql = "SELECT * FROM Event WHERE UserID = 24"; //Searching for a matching record in the database
$result = mysqli_query($conn, $sql);//result stores the boolean value of the query from the variable sql
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    while($row) {
        $eDate = $row["EventDate"];
        $eTime = $row["EventTime"];
        echo '<div class="event">
                  <h4 class="event__point">' . $row["EventName"] .  '</h4>
                  <span class="event__duration">'. $eDate . ' ' . $eTime . '</span>
                  <p class="event__description">'. $row["EventDesc"] . '</p>
              </div>';
      //Event time is displaying 12 am for everyone even though the last event is 10:20.
      $row = mysqli_fetch_assoc($result);
    }
} else {
    echo "You have no events planned!";
    }

mysqli_close($conn);
?>