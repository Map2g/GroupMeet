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

$sqlU  = "SELECT user_id, first_name FROM Users WHERE Users.email = '" . $_SESSION['Email'] . "'";
$resultU = mysqli_query($conn, $sqlU); //SQL statement to run query against all records and see if a record with the matching email exists
$rowU = mysqli_fetch_assoc($resultU); //Fetch the query results for User and store the record. $row will be used to add the primary key of the Users record as the foreign key of UserID in Groups
$U_ID = $rowU[user_id];

$sqlG = "SELECT GroupName FROM Groups WHERE Groups.GroupID = '" . $_SESSION['group'] . "'";
$resultG = mysqli_query($conn, $sqlG);
$rowG = mysqli_fetch_assoc($resultG);
$G_Name = $rowG[GroupName];


/*--------------Get list of members in group----------------------------------------*/
$member_list = 
            "SELECT 
                user_id,
                first_name, 
                last_name
            FROM 
                Users INNER JOIN MyGuests ON Users.user_id = MyGuests.GuestID
            WHERE 
                MyGuests.CrowdID = '" . $_SESSION['group'] . "' 
                    AND
                MyGuests.GuestID != '" . $U_ID . "' ";

$group_members = mysqli_query($conn, $member_list);     
$group_members_row = mysqli_fetch_assoc($group_members); 

/*--------------Get list of events in group. Different filters ---------------------------*/
$sqlAll = "SELECT *
         FROM 
            Users JOIN MyGuests ON Users.user_id = MyGuests.GuestID 
                JOIN Groups ON MyGuests.CrowdID = Groups.GroupID 
                    JOIN GroupEvent ON Groups.GroupID = GroupEvent.GroupID 
        WHERE 
            Users.user_id= '" . $U_ID . "'
                AND
            Groups.GroupID = '" . $_SESSION['group'] . "' 
        ORDER BY 
            GrpEventDate ASC,
            GrpEventTime ASC";
        
$sqlDaily = "SELECT *
            FROM 
                Users JOIN MyGuests ON Users.user_id = MyGuests.GuestID 
                    JOIN Groups ON MyGuests.CrowdID = Groups.GroupID 
                        JOIN GroupEvent ON Groups.GroupID = GroupEvent.GroupID 
            WHERE 
                Users.user_id= '" . $U_ID . "'
                    AND
                Groups.GroupID = '" . $_SESSION['group'] . "' 
                    AND
                GrpEventDate = CURDATE()
                    AND
                GrpEventTime >= CURTIME()
            ORDER BY 
                GrpEventTime ASC";

$sqlWeekly = "SELECT *
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
                (GrpEventDate >= CURDATE()
                    OR
                (GrpEventDate = CURDATE() AND GrpEventTime >= CURTIME()))
            ORDER BY 
                GrpEventDate ASC,
                GrpEventTime ASC";
            
$sqlMonthly = "SELECT *
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
                MONTH(GrpEventDate) = Month(NOW())
                    AND 
                (GrpEventDate >= CURDATE()
                    OR
                (GrpEventDate = CURDATE() AND GrpEventTime >= CURTIME()))
            ORDER BY 
                GrpEventDate ASC,
                GrpEventTime ASC";
/*----------------------------------------------------------------------------------*/

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
        $currentSql = $sqlAll; //Default view is weekly.
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
        <h1><?php echo  $G_Name . '\'s'?> Schedule</h1>
        <hr>
        
         <!--======= Today =======-->
        
       <section class="today-box" id="today-box">
          <span class="breadcrumb2">Today</span>
          <h3 class="date-title"><script>document.write(new Date().toDateString());</script></h3>
            
            <div class="plus-icon2">
                 <button id="addEvent" class="stylishButton">
                    <i class="fa fa-plus"></i>
                    Add Event
                 </button>
                 
                 <br><br>
                
                <div class="dropdown">
                 <button class="btn stylishButton dropdown-toggle" type="button" id="viewMembers" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Member List
                 </button>
                    <div class="dropdown-menu" aria-labelledby="viewMembers">
                     
                     <?php
                     while($group_members_row){
                            echo '<a class="dropdown-item">' . $group_members_row["first_name"] . " " . $group_members_row["last_name"] . ' </a>';
                            $group_members_row = mysqli_fetch_assoc($group_members);
                     }
                     ?>
                     
                    </div>
                </div>
            </div>
             
           </section>
       
        <script type="text/javascript">
          document.getElementById("addEvent").onclick = function () {
          window.location.href = "register_group_event.html";
          };
        </script>
        
        
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
       
        
       <!--======= Events Container =======-->
       
    
       <section class="upcoming-events">
          <div class="upcoming-events-head">
            <!--<h2>-->
                <?php
                    echo $viewTitle . " Events";
                ?>
            <!--</h2>-->
          </div>
             <div class="events-wrapper">
               
               <?php
               //retrieve list of events for the group and store them in $result
               $result = mysqli_query($conn, $currentSql);
               
               if (mysqli_num_rows($result) > 0) {
                  //Convert the qeury results from $result to rows to echo them
                  $row = mysqli_fetch_assoc($result);
                  
                  //echo all groups and their information
                  while($row) {
                    $eDate = date("D, n/j/Y", strtotime($row["GrpEventDate"]));
                    $eTime = date("g:i A", strtotime($row["GrpEventTime"]));
                        
                    //Determine if a user already voted
                    $vote = "SELECT * FROM GroupEvent_User_Vote WHERE (User_ID = '" . $U_ID . "') AND (GroupEventID = '" . $row["GrpEventID"] . "')";
                    $result2 = mysqli_query($conn, $vote);
                    if((mysqli_num_rows($result2) > 0)){
                        //Store the results of query in canVote, if one record, true, else false
                        $canVote = false;
                    }
                    else{
                      $canVote = true;
                    }
                    
                   // $canVote = true;
                    
                    //Tally number of 'Y' votes
                    $up_vote = 
                        "SELECT 
                            COUNT(Decision),
                            GroupEventID 
                        FROM 
                            GroupEvent_User_Vote
                        WHERE 
                            (Decision = 'Y')
                                AND 
                            (GroupEventID = '" . $row["GrpEventID"] . "') 
                        GROUP BY (GroupEventID)";
                    
                    //Tally number of 'Y' votes
                    $down_vote = 
                        "SELECT 
                            COUNT(Decision),
                            GroupEventID 
                        FROM 
                            GroupEvent_User_Vote
                        WHERE 
                            (Decision = 'N')
                                AND 
                            (GroupEventID = '" . $row["GrpEventID"] . "') 
                        GROUP BY (GroupEventID)";

                  //Convert the query results for $up_vote and $down_vote to rows
                  $up_vote_results = mysqli_query($conn, $up_vote);
                  $row_up_vote = mysqli_fetch_assoc($up_vote_results);
                  $up_vote_tally = NULL;
                  if($row_up_vote > 0){
                      $up_vote_tally = $row_up_vote["COUNT(Decision)"];
                  }
                  else{
                      $up_vote_tally = 0;
                  }
                  
                  $down_vote_results = mysqli_query($conn, $down_vote);
                  $row_down_vote = mysqli_fetch_assoc($down_vote_results);
                  $down_vote_tally = NULL;
                  if($row_down_vote > 0){
                      $down_vote_tally = $row_down_vote["COUNT(Decision)"];
                  }
                  else{
                      $down_vote_tally = 0;
                  }
                        
                echo '<div class="event">
                        
                        <form action="vote.php" method="post">
                        <input type="hidden" name="eventid" value="'.$row["GrpEventID"].'">
                        
                        <div class="i3">
                          <div class="hiddenradio">
                            <label>
                              <input type="radio" name="' . $row["GrpEventID"] . '" value="up">
                              <i class="far fa-thumbs-up"></i>
                            </label>
                            <label>
                              <input type="radio" name="' . $row["GrpEventID"] . '" value="down">
                              <i class="far fa-thumbs-down"></i>
                            </label>
                          </div>
                          <small><input type = "submit" value = "Vote " ' . ($canVote==true?"enabled":"disabled") . '></small>
                        </div>
                        
                        
                        </form>
                        
                          <h4 class="event__point">' . $row["GrpEventName"] .  '</h4>
                          <span class="event__duration">'. $eDate . ' ' . $eTime . '</span>
                          <span class="event__edit">
                                    <a href="edit_group_event.php?id=' . $row["GrpEventID"] . '" style="text-decoration:none">
                                        <span class="glyphicon">&#x270f;</span>
                                    </a>
                          </span>
                          <span class="event__vote">
                                Yes: '. $up_vote_tally .' No: '. $down_vote_tally .'
                          </span>
                          <p class="event__description">'. $row["GrpEventDescription"] . '</p>
                      </div>';
                      
                      $row = mysqli_fetch_assoc($result);
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