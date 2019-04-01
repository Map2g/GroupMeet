<?php

include("config.php");
session_start();

$sqlU  = "SELECT user_id, first_name FROM Users WHERE Users.email = '" . $_SESSION['Email'] . "'";
$resultU = mysqli_query($conn, $sqlU); 
$rowU = mysqli_fetch_assoc($resultU); 
$UN = $rowU[first_name];
//Getting User's first name.

//Create query instance to select all groups associated with an account
$sql = "SELECT 
            Users.email,
            Groups.GroupName,
            Groups.GroupID,
            Groups.GroupDesc
        FROM 
            Users JOIN MyGuests on Users.user_id = MyGuests.GuestID
                JOIN Groups ON MyGuests.CrowdID = Groups.GroupID
        WHERE
            Users.email IN ('" . $_SESSION['Email'] . "')";

$title = 'My Schedule'; include("top.php");

?>

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active"> <?php echo $UN . '\'s' ?> Groups</li>
        </ol>

        <!-- Page Content -->
        <h1><?php echo $UN . '\'s' ?> Groups</h1>
        <hr>
        
        <!--=====Page content=========-->
        
        <div class="events-wrapper">
            <?php
            
            $result = mysqli_query($conn, $sql); //SQL statement to run query against all records and see if a record with the matching username exists

            //If a result is returned with the username entered, the group will be listed
            if (mysqli_num_rows($result) > 0) {
                
                $row = mysqli_fetch_assoc($result); //Fetch the query results and store them into row format for each record found
                
                while($row){
                   echo  '<a href="get_group_event.php?gid=' . $row["GroupID"] . '">';
                    echo    '<ul class="list-group"> 
                                <li class="list-group-item">
                                    
                                    <h4> Group Name: ' . $row["GroupName"] . '</h4>
                                    
                                    
                                    <h6>Admin: ' . $row["email"]. '</h6>
                                    <h4> ' . $row["GroupDesc"]. '</h4>
                                    This stuff is ugly now but i will fix it later
                                </li>
                            </ul>
                           </a>';
                            
                   $row = mysqli_fetch_assoc($result);
                }
            } else {
                echo "You're not a member of any group.";
            }
            
            mysqli_close($conn);
            ?>
            
        </div> 

<?php include ("bottom.php"); ?>