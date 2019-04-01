<?php 

include("config.php");

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
       
       <!--======= Upcoming Events =======-->
      
       <section>
             <div>
                
                <?php
                
                //$result = mysqli_query($conn, $sqlAll);

                if (mysqli_num_rows($resultAll) > 0) {
                    $row = mysqli_fetch_assoc($resultAll);
                    while($row) {
                        $eDate = $row["EventDate"];
                        $eTime = $row["EventTime"];
                      echo '<div class="event">
                                <h4 class="event__point">' . $row["EventName"] .  '</h4>
                                <span class="event__duration">'. $eDate . ' ' . $eTime . '</span>
                                <p class="event__description">'. $row["EventDesc"] . '</p>
                            </div>';

                      $row = mysqli_fetch_assoc($resultAll);
                    }
                } else {
                    echo "You have no events planned!";
                    }
    
               mysqli_close($conn);
               ?>
               
             </div>
                
          <!--</div>-->
       </section>

<!--Rest of html template-->
<?php include("bottom.php");?>