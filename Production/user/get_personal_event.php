<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GroupMeet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);     //Does this have anything to do with mysql lite?
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//Know which user's events to pull. Will we choose this based on session ID or cookies?
$username = $_POST['userID'];

$sqlAll = "SELECT EventName, EventDesc, EventDate, EventTime 
        FROM Event 
        WHERE UserID=24
        ORDER BY DATE(EventDate), TIME(EventTime)";             //24 is placeholder for testing 
        
$sqlDaily = "SELECT EventName, EventDesc, EventDate, EventTime 
            FROM Event 
            WHERE UserID=24
            AND DATE(EventDate) = CURDATE()
            ORDER BY TIME(EventTime)";
            
$sqlMonthly = "SELECT EventName, EventDesc, EventDate, EventTime 
            FROM Event 
            WHERE UserID=24
            AND DATE(EventDate) = MONTH(CURDATE())
            ORDER BY DATE(EventDate)";
            
$sqlWeekly = "SELECT EventName, EventDesc, EventDate, EventTime 
            FROM Event 
            WHERE UserID=24
            AND DATE(EventDate) BETWEEN CURDATE() AND CURDATE() + 7  //fix
            ORDER BY DATE(EventDate)";
        
$resultAll = mysqli_query($conn, $sqlAll);
$resultDay = mysqli_query($conn, $sqlDaily);
$resultMon = mysqli_query($conn, $sqlMon);
$resultWeek = mysqli_query($conn, $sqlWeekly);

?>

<!DOCTYPE html>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GroupMeet - My Schedule</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="css/mysched.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">GroupMeet</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="login.html">Login</a>
          <a class="dropdown-item" href="register.html">Register</a>
          <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Group Management:</h6>
          <a class="dropdown-item" href="register_group.html">Create a Group</a>
          <a class="dropdown-item" href="get_group_event.php">View Group Schedule</a>
          
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>
    </ul>
  
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">My Schedule</li>
        </ol>

        <!-- Page Content -->
        <h1>My Schedule</h1>
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
           <button id="viewDaily" class="stylishButton">Daily</button>
           <button id="viewWeekly" class="stylishButton">Weekly</button>
           <button id="viewMonthly" class="stylishButton">Monthly</button>
         </div>
       </center>
       
       <!--======= Upcoming Events =======-->
      
       <section class="upcoming-events">
          <div class="upcoming-events-head">
            All Events
          </div>
             <div class="events-wrapper">
                
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

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © GroupMeet 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

</body>
</html>