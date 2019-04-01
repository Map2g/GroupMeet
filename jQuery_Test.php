<?php 

include("config.php");
session_start();

$sqlAll = "SELECT 
            EventName, 
            EventDesc,
            EventDate,
            EventTime 
            FROM
                Event 
            WHERE
                UserID= 24
                AND
                EventDate >= CURDATE()"; 
$sqlDaily = "SELECT 
                EventName, 
                EventDesc, 
                EventDate,
                EventTime 
            FROM 
                Event 
            WHERE 
                UserID = 24
                AND 
                DATE(EventDate) = CURDATE()
            ORDER BY 
                TIME(EventTime)"; 
            
$sqlMonthly = "SELECT
                EventName, 
                EventDesc,
                EventDate, 
                EventTime,
                Yearweek(now())     
            FROM 
                Event   
            WHERE 
                UserID=24  
                and  
                YEAR(EventDate)=YEAR(NOW()) 
                and 
                Month(EventDate) = Month(Now())
                and 
                EventDate >= CURDATE()
                ";
            
$sqlWeekly = "SELECT EventName, EventDesc, EventDate, EventTime              FROM Event              WHERE UserID=24  and  YEARWEEK(EventDate)=YEARWEEK(NOW()) 
            ORDER BY DATE(EventDate)";
     
     $currentSql = $sqlAll;
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //something posted
        echo "you posted";

     if (isset($_POST['viewWeeklyButton'])) {
         echo "you pressed weekly";
         $currentSql = $sqlWeekly;
    }
   else if (isset($_POST['viewDailyButton'])) {
         echo "you pressed Daily";
         $currentSql = $sqlDaily;
    }
 
 
 
  else  if (isset($_POST['viewMonthlyButton'])) {
        echo "you pressed Monthly";
         $currentSql = $sqlMonthly;
    }
    
    
    else
    {
        echo "No button detected";
    }
}

    
    
foreach ($_POST as $key => $value) {
    echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
}

   
$resultAll = mysqli_query($conn, $sqlAll);
$resultDay = mysqli_query($conn, $sqlDaily);
$resultMon = mysqli_query($conn, $sqlMon);
$resultWeek = mysqli_query($conn, $sqlWeekly);


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
             <form action="jQuery_Test.php" method="post">
           <input id="viewDailyButton" class="stylishButton" name="viewDailyButton"  type="submit" value="Daily"></input>
           <input id="viewWeeklyButton" class="stylishButton" name="viewWeeklyButton"  type="submit" value="Weekly"></input>
           <input id="viewMonthlyButton" class="stylishButton" name="viewMonthlyButton"  type="submit" value="Monthly"></input>
           </form>
         </div>
       </center>
       
       <!--======= Upcoming Events =======-->
      
       <section class="upcoming-events">
          <div class="upcoming-events-head">
            All Events
          </div>
             <div class="events-wrapper">
                
                <?php
                
                $resultAll = mysqli_query($conn, $currentSql);

                if (mysqli_num_rows($resultAll) > 0) {
                    $rowAll = mysqli_fetch_assoc($resultAll);
                    while($rowAll) {
                        $eDate = $rowAll["EventDate"];
                        $eTime = $rowAll["EventTime"];
                      echo '<div class="event">
                                <h4 class="event__point">' . $rowAll["EventName"] .  '</h4>
                                <span class="event__duration">'. $eDate . ' ' . $eTime . '</span>
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