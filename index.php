<?php
//GroupMeet HTML template
$title = 'Dashboard'; require ("top.php"); session_start() ;
?>

<!--<!DOCTYPE html>-->
<!--<html>-->
<!--  <body>-->
<!--<link rel = "import" href = "head.html">-->

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">
            <?php
            echo "Welcome " . $_SESSION['Email'];
            ?>
          </li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-users"></i>
                </div>
                <div class="mr-5">Create A Group</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="register_group.html">
                <span class="float-left">Click here to start!</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">View Your Groups</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="group_lookup.php">
                <span class="float-left">Click here to view!</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="mr-5">View Your Calendar</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="get_personal_event.php">
                <span class="float-left">Click here to view!</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-bell"></i>
                </div>
                <div class="mr-5">13 New Notifications!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
<!--</body>-->
<!--</html>-->

<!--Rest of html template-->
<?php include ("bottom.php");?>
