<?php 

include("config.php");

$username = $_POST['userID'];
//$group = $_GET[''];

$sql = "SELECT first_name, last_name
        FROM Users INNER JOIN Users_Group ON Users.user_id = Users_Group.UserID
        WHERE GroupID=31";             //31 is placeholder for testing 


//GroupMeet HTML template
$title = 'Group Members'; include("top.php");
?>

 <div class="events-wrapper">
                
                <?php
                
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    while($row) {
                      echo '<div class="event">
                                <p class="event__description">'. $row["first_name"] . ' ' . $row["last_name"] . '</p>
                            </div>';

                      $row = mysqli_fetch_assoc($result);
                    }
                } else {
                    echo "You failed!";
                    }
    
               mysqli_close($conn);
               ?>
               
             </div>
             
<!--Rest of html template-->
<?php include("bottom.php");?>
