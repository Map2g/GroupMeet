<?php 

include("config.php");
session_start();

$sqlU  = "SELECT user_id, first_name FROM Users WHERE Users.email = '" . $_SESSION['Email'] . "'";
$resultU = mysqli_query($conn, $sqlU); 
$rowU = mysqli_fetch_assoc($resultU); 
$UID = $rowU['user_id'];
//Getting User's ID.

//Remove Group
if (isset($_POST['deleteGroupButton'])) {
        $gid = $_POST['deleteGroupButton'];
        
        /*Query to remove a group. Since MyGuests references groups and users primary keys,
        records of the groups primary key must be removed before a group can be deleted.
        Otherwise, referential integrity is enforced and MySQL will throw an error. 
        */
        $remove_members = "DELETE 
                           FROM 
                               MyGuests
                           WHERE
                               MyGuests.CrowdID = '" . $gid . "' ";
        
        $remove_group ="DELETE 
                        FROM 
                           Groups
                        WHERE
                           Groups.GroupID = '" . $gid . "' ";
                   
        mysqli_query($conn, $remove_members);
        mysqli_query($conn, $remove_group);
    }
//Remove Members of a group
else if (isset($_POST['deleteMemberButton'])){
     list($squadid, $memberid) = explode("," , $_POST['deleteMemberButton']);
     
     //Remove a specific member from a group
    $remove_single_member = "DELETE 
                         FROM
                            MyGuests
                         WHERE
                            MyGuests.CrowdID = '" . $squadid . "'
                                AND
                            MyGuests.GuestID = '" . $memberid . "' ";

     mysqli_query($conn, $remove_single_member);
}
    
//GroupMeet HTML template
$title = 'Group Administration'; include("top.php");
?>

<!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Groups I Own</li>
    </ol>

    <!-- Page Content -->
    <h1>Groups<button class="add-button" id="addGroup">+ Add Group</button></h1>
    <hr>
    
    <script type="text/javascript">
          document.getElementById("addGroup").onclick = function () {
          window.location.href = "register_group.html";
          };
    </script>
    
     <!--======= Group =======-->
    
    <ul class="list-group">
        <form action="mess.php" method="post">
        <?php
            //Query all groups the admin owns
            $sql = 
            "SELECT 
                Groups.GroupID,
                Groups.GroupName,
                Groups.GroupDesc
            FROM
                Users INNER JOIN Groups ON Users.user_id = Groups.UserID
            WHERE
                Groups.UserID = '" . $UID . "' ";
                            
            $groupProperty = mysqli_query($conn, $sql); 
            $rowGroup = mysqli_fetch_assoc($groupProperty);
     
            echo '<script type="text/javascript">$(document).ready(function(){ $("#myModal").modal("show"); });</script>';
            echo '<script type="text/javascript">$(document).ready(function(){ $("#myModal2").modal("show"); });</script>';
            
            //Print groups respective to the admin
            while($rowGroup){
                
                echo '<div class="dropdown">
                        <div class="group-box">' . $rowGroup["GroupName"] . '
                            <button name= "deleteGroupButton" value= ' . $rowGroup["GroupID"] . ' type="submit" class="delete-group" onclick="modal.style.display = "block"">
                                - Delete Group
                            </button> 
                            <a href="add_member_form.php?id=' . $rowGroup["GroupID"] . '" style="text-decoration:none">
                                <span class="add-button">+ Add Member</span>
                            </a>
                        </div>'; //for group box
                    
                        //Query all members of the group. Do not list admin to prevent accidental deletion of themselves
                        $member_list = 
                        "SELECT 
                            user_id,
                            first_name, 
                            last_name
                        FROM 
                            Users INNER JOIN MyGuests ON Users.user_id = MyGuests.GuestID
                        WHERE 
                            MyGuests.CrowdID = '" . $rowGroup["GroupID"] . "' 
                                AND
                            MyGuests.GuestID != '" . $UID . "' ";
                            
                        $group_members = mysqli_query($conn, $member_list); 
                        $group_members_row = mysqli_fetch_assoc($group_members); 
                    
                    echo '<div class="dropdown-content">';
                    while($group_members_row){
                        echo '<a class="dropdown-item">' . $group_members_row["first_name"] . " " . $group_members_row["last_name"] . '
                                <button name= "deleteMemberButton" value= ' . $rowGroup["GroupID"]  . ',' . $group_members_row["user_id"] . ' type="submit" class="remove-button" onclick="modal2.style.display = "block"">
                                    <b>- Remove Member</b>
                                </button>
                              </a>';
                        
                        //Convert the next record in the query to a row
                        $group_members_row = mysqli_fetch_assoc($group_members);
                    }//end inner while
                    echo '</div>'; //div for dropdown-content
                echo '</div>'; //div for dropdown
                
                echo '<br>';
              
               //Convert the next record in the query to a row
               $rowGroup = mysqli_fetch_assoc($groupProperty); 
            }//end outer while   
                
        ?>
        </form>
    </ul>


        <!-- The Modal Delete Group -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <p>Are you sure you want to delete this group?</p>
                <div>
                <button id="cancelBtn" class="close" onclick=" modal.style.display = 'none';" style="float: right; padding: 5px; margin: 5px;">Cancel</button>
                <button id="yesBtn" class="close" onclick="onDelete();" style="float: right; padding: 5px; margin: 5px;">Yes</button>
                </div>
            </div>
        </div>
        
        <!-- The Modal Remove Member -->
        <div id="myModal2" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <p>Are you sure you want to remove this member?</p>
                <div>
                <button id="cancelBtn" class="close" onclick=" modal2.style.display = 'none';" style="float: right; padding: 5px; margin: 5px;">Cancel</button>
                <button id="yesBtn" class="close" onclick="onDelete()" style="float: right; padding: 5px; margin: 5px;">Yes</button>
                </div>
            </div>
        </div>
        
        <script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        
        // Get the modal
        var modal2 = document.getElementById('myModal2');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal2) {
                modal2.style.display = "none";
            }
        }
        
        // When user presses yes button
        function onDelete() {
            modal.style.display="none";
            modal2.style.display="none";
        }
        </script>

   </div>
                       
<!--Rest of html template-->
<?php include("bottom.php");?>


                
   
                
                
