<?php
include("config.php");

//$_POST and $_GET are keywords in PHP that are used for html form tags to get and send information from the form to the database 
$member = $_POST['member_email'];
// $admin = $_POST['admin_email'];
$group = $_POST['gname']; 
$result = NULL;
$row = NULL;
$respective_groups_results = NULL;
$respective_groups_row = NULL;
$guest_lookup_results = NULL;
$guest_lookup_row = NULL;
$targetFound = FALSE;

//Verify that the email entered is associated with a registered account
$sql  = "SELECT user_id FROM Users WHERE Users.email = '" . $_SESSION['Email'] . "'";
    $result = mysqli_query($conn, $sql); //SQL statement to run query against all records to see if a record with the matching email exists
    $row = mysqli_fetch_assoc($result); //Fetch the query results for User and convert the matching records into rows . $row will be used to locate the groups that the admin owns with their primary key
   
    echo "Record located successfully";
    echo "<br>" . "<br>";
    
    //Find all groups associated with the admin account
    $respective_groups = "SELECT Groups.GroupID, Groups.GroupName FROM Groups JOIN Users ON Users.user_id = Groups.UserID WHERE Users.user_id IN (". $row["user_id"] .")"; //Query to locate all groups the admin owns
    if(mysqli_query($conn, $respective_groups)){
        $respective_groups_results = mysqli_query($conn, $respective_groups); //SQL statement to run query against all records to see if a record with the matching criteria exists
        $respective_groups_row = mysqli_fetch_assoc($respective_groups_results); //Fetch the query results and convert the matching records into rows 
        
        echo "Record located successfully";
        echo "<br>" . "<br>";
        
        //Verify that the group name entered is a group that the admin owns
        while($respective_groups_row){ 
            if($respective_groups_row["GroupName"] != $group){
                $respective_groups_row = mysqli_fetch_assoc($respective_groups_results); //Fetch the query results and convert the matching records into rows 
            } else{
                $targetFound = TRUE;
                break;      
            }
        }
        
        //If the admin owns the group, add the guest
        if($targetFound){
            //Verify the guest account is accurate
            $guest_lookup  = "SELECT user_id FROM Users WHERE Users.email IN ('$member')"; //SQL statement to locate all records with matching values
            if($guest_lookup_results = mysqli_query($conn, $guest_lookup)){
                $guest_lookup_row = mysqli_fetch_assoc($guest_lookup_results);
                //Remove the member to the admin's group
                $guest_checkin = "DELETE FROM MyGuests WHERE (CrowdID IN (". $respective_groups_row["GroupID"] .")) AND (GuestID IN (". $guest_lookup_row["user_id"] ."))"; 
                if(mysqli_query($conn, $guest_checkin)){
                    echo "Member removed successfully";
                    echo "<br>";
                }
                else{
                    echo "Can not remove member";
                    echo "<br>";
                    echo "Error: " . $guest_checkin . "<br>" . mysqli_error($conn);
                }
            }
            else{
                echo "Guest not located";
                echo "<br>";
                echo "Error: " . $guest_lookup . "<br>" . mysqli_error($conn);
            }
        } else{
            echo "Target not located";
        }
        
    } else{
         echo "Record not located";
         echo "<br>";
         echo "Error: " . $respective_groups . "<br>" . mysqli_error($conn);
    }
    
} else {
    echo "Record not located";
    echo "<br>" . "<br>";
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 
