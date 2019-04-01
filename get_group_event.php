<?php 

include("config.php");
session_start();

/*When the page is reloaded with filters, do not over write the session variable since it is passed from group_lookup.php
    When the page is reloaded, since  $_GET['gid'] came from group_lookup.php, it only is passed once.
    To pass $_GET['gid'] from  group_lookup.php, it must be stored in a session.
    If the $_GET['gid'] is empty, that means that a filter button was selected from get_group_event.php,
    so the $_SESSION['group'] will not be altered. However, if $_GET['gid'] is not empty, that means the user
    selected a group from group_lookup.php and therefore $_SESSION['group'] must be updated to reflect the group
    the user selected.
*/
if(!empty($_GET['gid'])){
    $_SESSION['group'] =  $_GET['gid']; //acquire the associated group clicked by user
}

//Acquire the id of the user in session
$sqlU  = "SELECT user_id, first_name FROM Users WHERE Users.email = '" . $_SESSION['Email'] . "'";
$resultU = mysqli_query($conn, $sqlU); //SQL statement to run query against all records and see if a record with the matching email exists
$row = mysqli_fetch_assoc($resultU); //Fetch the query results for User and store the record. $row will be used to add the primary key of the Users record as the foreign key of UserID in Groups
$U_ID = $row[user_id];

$sqlAll = "SELECT 
            GrpEventName,
            GrpEventDescription,
            GrpEventDate,
            GrpEventTime
         FROM 
            Users JOIN MyGuests ON Users.user_id = MyGuests.GuestID 
                JOIN Groups ON MyGuests.CrowdID = Groups.GroupID 
                    JOIN GroupEvent ON Groups.GroupID = GroupEvent.GroupID 
        WHERE 
            Users.user_id= '" . $U_ID . "'
                AND
            Groups.GroupID = '" . $_SESSION['group'] . "' 
                AND
            GrpEventDate >= CURDATE()
                AND 
            TIME(GrpEventTime) >= CURTIME()
        ORDER BY 
            DATE(GrpEventDate) ASC,
            TIME(GrpEventTime) ASC"; 
        
$sqlDaily = "SELECT 
            GrpEventName,
            GrpEventDescription,
            GrpEventDate,
            GrpEventTime
            FROM 
                Users JOIN MyGuests ON Users.user_id = MyGuests.GuestID 
                    JOIN Groups ON MyGuests.CrowdID = Groups.GroupID 
                        JOIN GroupEvent ON Groups.GroupID = GroupEvent.GroupID 
            WHERE 
                Users.user_id= '" . $U_ID . "'
                    AND
                Groups.GroupID = '" . $_SESSION['group'] . "' 
                    AND
                DATE(GrpEventDate) = CURDATE()
                    AND 
                TIME(GrpEventTime) >= CURTIME()
            ORDER BY 
                TIME(GrpEventTime) ASC";

$sqlWeekly = "SELECT 
            GrpEventName,
            GrpEventDescription,
            GrpEventDate,
            GrpEventTime
            FROM 
                Users JOIN MyGuests ON Users.user_id = MyGuests.GuestID 
                    JOIN Groups ON MyGuests.CrowdID = Groups.GroupID 
                        JOIN GroupEvent ON Groups.GroupID = GroupEvent.GroupID 
            WHERE 
                Users.user_id= '" . $U_ID . "'
                    AND
                Groups.GroupID = '" . $_SESSION['group'] . "' 
                    AND
                YEARWEEK(GrpEventDate) = YEARWEEK(NOW()) 
                    AND 
                GrpEventDate >= CURDATE()
                    AND 
                TIME(GrpEventTime) >= CURTIME()
            ORDER BY 
                DATE(GrpEventDate) ASC,
                TIME(GrpEventTime) ASC";
            
$sqlMonthly = "SELECT 
            GrpEventName,
            GrpEventDescription,
            GrpEventDate,
            GrpEventTime
            FROM 
                Users JOIN MyGuests ON Users.user_id = MyGuests.GuestID 
                    JOIN Groups ON MyGuests.CrowdID = Groups.GroupID 
                        JOIN GroupEvent ON Groups.GroupID = GroupEvent.GroupID 
            WHERE 
                Users.user_id= '" . $U_ID . "'
                    AND
                Groups.GroupID = '" . $_SESSION['group'] . "' 
                    AND
                YEAR(GrpEventDate) = YEAR(NOW()) 
                    AND 
                Month(GrpEventDate) = Month(NOW())
                    AND 
                GrpEventDate >= CURDATE()
                    AND 
                TIME(GrpEventTime) >= CURTIME()
            ORDER BY 
                DATE(GrpEventDate) ASC,
                TIME(GrpEventTime) ASC";

    /*When a button is pressed, the $_POST['<input /> name = buttonName'] is recorded in a form. 
    When the php page is requested from the server, it will return the web page with the desired
    MySQL query based on the fields of the form passed to the php file
    */
    if (isset($_POST['viewDailyButton'])) {
         $currentSql = $sqlDaily;
         $viewTitle = "Daily";
    }
    else if (isset($_POST['viewWeeklyButton'])) {
        $currentSql = $sqlWeekly;
        $viewTitle = "Weekly";
    }
    else  if (isset($_POST['viewMonthlyButton'])) {
         $currentSql = $sqlMonthly;
         $viewTitle = "Monthly";
    }
    else  if (isset($_POST['viewAllButton'])) {
         $currentSql = $sqlAll;
         $viewTitle = "All";
    }
    else {
        $currentSql = $sqlAll; //Load all events by default
        $viewTitle = "All";
    }
//GroupMeet HTML template
$title = 'Group Schedule'; include("top.php");
?>

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item">
            <a href="group_lookup.php">My Groups</a>
          </li>
          <li class="breadcrumb-item active">Group Schedule</li>
        </ol>

        <!-- Page Content -->
        <h1><?php echo $_SESSION['group'] . '\'s' ?> Schedule</h1>
        <hr>
        
         <!--======= Today =======-->
        
       <section class="today-box" id="today-box">
          <span class="breadcrumb2">Today</span>
          <h3 class="date-title"><script>document.write(new Date().toDateString());</script></h3>
          <div class="plus-icon2">
              
             <button id="viewMembers" class="stylishButton">
                Member List
             </button>
              
             <button id="addEvent" class="stylishButton">
                <i class="fa fa-plus"></i>
                Add Event
             </button>
             
            <script type="text/javascript">
              document.getElementById("viewMembers").onclick = function () {
              window.location.href = "view_members.php";
              };
            </script>
             
            <script type="text/javascript">
              document.getElementById("addEvent").onclick = function () {
              window.location.href = "register_group_event.html";
              };
            </script>
             
          </div>
       </section>
        
        
       <!--======== View Option Buttons =======-->

       <center>
        <div class="button_holder">
            <form action= "get_group_event.php" method="post">
                <input id="viewDailyButton" class="stylishButton" name="viewDailyButton"  type="submit" value = "Daily"></input>
                <input id="viewWeeklyButton" class="stylishButton" name="viewWeeklyButton"  type="submit" value = "Weekly"></input>
                <input id="viewMonthlyButton" class="stylishButton" name="viewMonthlyButton"  type="submit" value = "Monthly"></input>
                <input id="viewAllButton" class="stylishButton" name="viewAllButton"  type="submit" value = "All"></input>
            </form>
        </div>
       </center>
       
        
       <!--======= Upcoming Events =======-->
    
       <section class="upcoming-events">
          <div class="upcoming-events-head">
            <h2>
                <?php
                    echo $viewTitle . " Events";
                ?>
            </h2>
          </div>
             <div class="events-wrapper">
               
               <?php
               $radioIdent = 1;
               $result = mysqli_query($conn, $currentSql);
               
               if (mysqli_num_rows($result) > 0) {
                  $row = mysqli_fetch_assoc($result);
                  while($row) {
                        $eDate = $row["GrpEventDate"];
                        $eTime = $row["GrpEventTime"];
                      echo '<div class="event">
                        <div class="i3">
                          <div class="hiddenradio">
                            <label>
                              <input type="radio" name="' . $radioIdent . '" value="up">
                              <i class="far fa-thumbs-up"></i>
                            </label>
                            <label>
                              <input type="radio" name="' . $radioIdent . '" value="down">
                              <i class="far fa-thumbs-down"></i>
                            </label>
                          </div>
                         </div>
                          <h4 class="event__point">' . $row["GrpEventName"] .  '</h4>
                          <span class="event__duration">'. $row["GrpEventDate"] . ' ' . $row["GrpEventTime"] . '</span>
                          <p class="event__description">'. $row["GrpEventDescription"] . '</p>
                      </div>';
                      
                      $row = mysqli_fetch_assoc($result);
                      $radioIdent = $radioIdent + 1;
                    }
                } else {
                    echo "This group has no events planned!";
                    }
    
               mysqli_close($conn);
               ?>
        
             </div>

          <!--</div>-->
       </section>
   
<!--Rest of html template-->
<?php include("bottom.php");?>