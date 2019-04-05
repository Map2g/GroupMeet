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
          <li class="breadcrumb-item active">Groups</li>
        </ol>

        <!-- Page Content -->
        <div></div>
        <h1>Groups<button class="add-button">+ Add Group</button></h1>
        <hr>
        
         <!--======= Group =======-->
        
        <div class="dropdown">
             
            <?php
               echo '<form action="mess.php" method="post">';
                
                //Query all groups the admin owns
                $sql = 
                "SELECT 
                    Groups.GroupID,
                    Groups.GroupName,
                    Groups.GroupDesc
                FROM
                    Users JOIN MyGuests on Users.user_id = MyGuests.GuestID-
                    JOIN Groups ON MyGuests.CrowdID = Groups.GroupID
                WHERE
                    Users.user_id = '" . $UID . "'
                        AND
                    Groups.UserID = '" . $UID . "' ";
                                
                $groupProperty = mysqli_query($conn, $sql); 
                $rowGroup = mysqli_fetch_assoc($groupProperty);
                
                
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
                
                
                //Print groups respective to the admin
                while($rowGroup){
                    
                }//end while
            ?>
           
            <div class="group-box">Group Name<button class="delete-group" onclick="modal.style.display = 'block';">- Delete Group</button><button class="add-button">+ Add Member</button></div>
                <div class="dropdown-content">
                    <a class="group-member">Kyle<button class="remove-button" onclick=" modal2.style.display = 'block';"><b>- Remove Member</b></button></a>
                    <a class="group-member">Mark<button class="remove-button" onclick=" modal2.style.display = 'block';"><b>- Remove Member</b></button></a>
                    <a class="group-member">Nunj<button class="remove-button" onclick=" modal2.style.display = 'block';"><b>- Remove Member</b></button></a>
                    <a class="group-member">Mel<button class="remove-button" onclick=" modal2.style.display = 'block';"><b>- Remove Member</b></button></a>
                    <a class="group-member">Alex<button class="remove-button" onclick=" modal2.style.display = 'block';"><b>- Remove Member</b></button></a>
                </div>
            </div>
        
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
        while($rowGroup){-->
                       
<!--Rest of html template-->
<?php include("bottom.php");?>


                
   
                
                

<!--                
                        //Print all members
                        <!--echo '<div class="dropdown-content">';-->
                        <!--while($group_members_row){-->
                           
                        <!--    echo '<a class="group-member">' . $group_members_row["first_name"] . " " . $group_members_row["last_name"] . '<button name= "deleteMemberButton" value= ' . $rowGroup["GroupID"]  . ',' . $group_members_row["user_id"] . ' type="submit" class="remove-button" onclick="modal2.style.display = "block"">-->
                        <!--          <b>- Remove Member</b></button></a>';-->
                            
                        <!--    $group_members_row = mysqli_fetch_assoc($group_members);-->
                        <!--}-->
<!--                        echo '</div>';-->
                        
<!--                    $rowGroup = mysqli_fetch_assoc($groupProperty); -->
<!--                }-->
<!--                echo '</form>';-->
<!--            ?>-->
            
            <!-- The Modal Delete Group -->
<!--            <div id="myModal" class="modal">-->
    
            <!-- Modal content -->
<!--            <div class="modal-content">-->
<!--                <p>Are you sure you want to delete this group?</p>-->
<!--                <div>-->
<!--                <button id="cancelBtn" class="close" onclick=" modal.style.display = 'none';" style="float: right; padding: 5px; margin: 5px;">Cancel</button>-->
<!--                <button id="yesBtn" class="close" onclick="onDelete();" style="float: right; padding: 5px; margin: 5px;">Yes</button>-->
<!--                </div>-->
<!--            </div>-->
    
<!--            </div>-->
            
            <!-- The Modal Remove Member -->
<!--            <div id="myModal2" class="modal">-->
    
            <!-- Modal content -->
<!--            <div class="modal-content">-->
<!--                <p>Are you sure you want to remove this member?</p>-->
<!--                <div>-->
<!--                <button id="cancelBtn" class="close" onclick=" modal2.style.display = 'none';" style="float: right; padding: 5px; margin: 5px;">Cancel</button>-->
<!--                <button id="yesBtn" class="close" onclick="onDelete()" style="float: right; padding: 5px; margin: 5px;">Yes</button>-->
<!--                </div>-->
<!--            </div>-->
    
<!--            </div>-->
            
<!--            <script>-->
            // Get the modal
<!--            var modal = document.getElementById('myModal');-->
    
            // When the user clicks anywhere outside of the modal, close it
<!--            window.onclick = function(event) {-->
<!--                if (event.target == modal) {-->
<!--                    modal.style.display = "none";-->
<!--                }-->
<!--            }-->
            
            // Get the modal
<!--            var modal2 = document.getElementById('myModal2');-->
    
            // When the user clicks anywhere outside of the modal, close it
<!--            window.onclick = function(event) {-->
<!--                if (event.target == modal2) {-->
<!--                    modal2.style.display = "none";-->
<!--                }-->
<!--            }-->
            
            // When user presses yes button
<!--            function onDelete() {-->
<!--                modal.style.display="none";-->
<!--                modal2.style.display="none";-->
<!--            }-->
<!--            </script>-->

<!--        </div>-->