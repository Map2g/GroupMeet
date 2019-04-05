<?php 

include("config.php");
session_start();

$sqlU  = "SELECT user_id, first_name FROM Users WHERE Users.email = '" . $_SESSION['Email'] . "'";
$resultU = mysqli_query($conn, $sqlU); 
$rowU = mysqli_fetch_assoc($resultU); 
$UID = $rowU['user_id'];
//Getting User's first name.

//Create query instance to select all groups associated with an account
$sql = "SELECT 
            Groups.GroupName
        FROM 
            Users JOIN MyGuests on Users.user_id = MyGuests.GuestID
                JOIN Groups ON MyGuests.CrowdID = Groups.GroupID
        WHERE
            Users.email = '" . $_SESSION['Email'] . "'
                AND
            Groups.UserID = '" . $UID . "'";

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
<!--Rest of html template-->
<?php include("bottom.php");?>