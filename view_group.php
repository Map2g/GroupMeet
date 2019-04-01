<?php 

include("config.php");

$sql = "SELECT Group, last_name
        FROM Users INNER JOIN Users_Group ON Users.user_id = Users_Group.UserID
        WHERE GroupID=31";             //31 is placeholder for testing 


//GroupMeet HTML template
$title = 'My Groups'; include("top.php");
?>

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">My Groups</li>
        </ol>
        
        <!-- Page Content -->
        <h1>My Groups</h1>
        <hr>
        <p></p>

<?php include("bottom.php");?>