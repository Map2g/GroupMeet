<?php 

include("config.php");
session_start();

$sqlU  = "SELECT user_id, first_name FROM Users WHERE Users.email = '" . $_SESSION['Email'] . "'";
$resultU = mysqli_query($conn, $sqlU); //SQL statement to run query against all records and see if a record with the matching email exists
$row = mysqli_fetch_assoc($resultU); //Fetch the query results for User and store the record. $row will be used to add the primary key of the Users record as the foreign key of UserID in Groups
$U_ID = $row[user_id];
$UN = $row[first_name];

$sqlAll = "SELECT *
        FROM 
            Event 
        WHERE 
            UserID= '" . $U_ID . "'
        ORDER BY 
            EventDate ASC,
            EventTime ASC"; 
        
$sqlDaily = "SELECT *
            FROM 
                Event 
            WHERE 
                UserID= '" . $U_ID . "'
                    AND 
                EventDate = CURDATE()
                    AND
                EventTime >= CURTIME()
            ORDER BY 
                EventTime DESC";

$sqlWeekly = "SELECT *
            FROM 
                Event 
            WHERE
                UserID = '" . $U_ID . "'
                    AND
                YEARWEEK(EventDate) = YEARWEEK(NOW()) 
                    AND 
                (EventDate >= CURDATE()
                    OR
                (EventDate = CURDATE() AND EventTime >= CURTIME()))
            ORDER BY 
                EventDate ASC,
                EventTime ASC";
            
$sqlMonthly = "SELECT * 
            FROM 
                Event 
            WHERE 
                UserID= '" . $U_ID . "'
                    AND
                YEAR(EventDate) = YEAR(NOW()) 
                    AND 
                MONTH(EventDate) = MONTH(NOW())
                    AND 
                (EventDate >= CURDATE()
                    OR
                (EventDate = CURDATE() AND EventTime >= CURTIME()))
            ORDER BY 
                EventDate ASC,
                EventTime ASC";
            
    /*When a button is pressed, the $_POST['<input /> name = buttonName'] is recorded in a form. 
    When the php page is requested from the server, it will return the web page with the desired
    MySQL query based on the fields of the form passed to the php file
    */
    if (isset($_POST['viewDailyButton'])) {
         $currentSql = $sqlDaily;
         $viewTitle = "Daily";
    }
    else if (isset($_POST['viewWeeklyButton'])) {;
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
    else{
        $currentSql = $sqlAll; //Load all events by default
        $viewTitle = "All";
    }
        

//GroupMeet HTML template
$title = 'My Schedule'; include("top.php");

?>

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active"> <?php echo $UN . '\'s' ?> Schedule</li>
        </ol>

        <!-- Page Content -->
        <h1><?php echo $UN . '\'s' ?> Schedule</h1>
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
             
            <script type="text/javascript">
              document.getElementById("addEvent").onclick = function () {
              window.location.href = "register_personal_event.html";
              };
            </script>
             
          </div>
       </section>
       
       <!--======== View Option Buttons =======-->

       <center>
        <div class="button_holder">
            <form action="get_personal_event.php" method="post">
                <input id="viewDailyButton" class="stylishButton" name="viewDailyButton"  type="submit" value="Daily"></input>
                <input id="viewWeeklyButton" class="stylishButton" name="viewWeeklyButton"  type="submit" value="Weekly"></input>
                <input id="viewMonthlyButton" class="stylishButton" name="viewMonthlyButton"  type="submit" value="Monthly"></input>
                <input id="viewAllButton" class="stylishButton" name="viewAllButton"  type="submit" value="All"></input>
            </form>
        </div>
       </center>
       
       <!--======= Upcoming Events =======-->
      
       <section class="upcoming-events">
          <div class="upcoming-events-head">
            <?php
                echo $viewTitle . " Events";
            ?>
          </div>
             <div class="events-wrapper">
                
                <?php
                
                $resultAll = mysqli_query($conn, $currentSql);

                if (mysqli_num_rows($resultAll) > 0) {
                    $rowAll = mysqli_fetch_assoc($resultAll);
                    while($rowAll) {
                        $eDate = date("D, n/j/Y", strtotime($rowAll["EventDate"]));
                        $eTime = date("g:i A", strtotime($rowAll["EventTime"]));
                      echo '<div class="event">
                                <h4 class="event__point">' . $rowAll["EventName"] .  '</h4>
                                <span class="event__duration">'. $eDate . ' ' . $eTime . '</span>
                                <span class="event__edit">
                                    <a href="edit_personal_event.php?id=' . $rowAll["EventID"] . '" style="text-decoration:none">
                                        <span class="glyphicon">&#x270f;</span>
                                    </a>
                                </span>
                                <p class="event__description">'. $rowAll["EventDesc"] . '</p>
                            </div>';

                      $rowAll = mysqli_fetch_assoc($resultAll);
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
<?php include ("bottom.php"); ?>