<?php

include 'config.php';
session_start();

if(isset($_GET['id'])){
  $GeventID = $_GET['id'];
} else {
  echo "Could not get ID";
}

$sql = "SELECT * FROM GroupEvent WHERE GrpEventID = '". $GeventID ."'";
$GeventDetails = mysqli_query($conn, $sql);

if ($GeventDetails == false ) {
  printf("Query error: %s\n%s", mysqli_error($conn), $sql);
}

$row = mysqli_fetch_assoc($GeventDetails);

$geName = $row["GrpEventName"];
$geDesc = $row["GrpEventDescription"];
$geDate = $row["GrpEventDate"];
$geTime = $row["GrpEventTime"];


$sqlT = "SELECT Users.email 
          FROM Users INNER JOIN Groups ON Users.user_id = Groups.UserID 
                      INNER JOIN GroupEvent ON Groups.GroupID = GroupEvent.GroupID 
        WHERE GroupEvent.GrpEventID = '". $GeventID ."'";
$resultT = mysqli_query($conn, $sqlT);

// if ($resultT == false){
//     $message = "Query error: ".  mysqli_error($conn) . " " . $sqlT;
//     echo '<script type="text/javascript">
//     alert("'.$message.'");
//     location="get_group_event.php";
//     </script>';
// } else{
//   $rowT = mysqli_fetch_assoc($resultT);
//   $message = $rowT["email"];
//     echo '<script type="text/javascript">
//     alert("'.$message.'");
//     location="get_group_event.php";
//     </script>';
// }

  $rowT = mysqli_fetch_assoc($resultT);
  $eventOwner = $rowT["email"];

if ($_SESSION['Email'] != $eventOwner){
    $message = "Only " . $eventOwner. " can edit this event."; 
    //$message = "owner: " . $eventOwner . "session: " . $_SESSION['Email'];
    echo '<script type="text/javascript">
    alert("'.$message.'");
    location="get_group_event.php";
    </script>';
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Edit Group Event</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Edit Group Event</div>
      <div class="card-body">
        <form action = "UpdateGrpEvent.php" method = "post">
        
        <input type="hidden" name="id" value=" <?php echo $_GET['id']; ?> ">
          
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  Event Name: <input type="text" name="gEventName" class="form-control" value="<?php echo $geName; ?>" required="required">
                      <!--first_name: <input type = "text" name = "fname">-->
                      <!--<label for="firstName">First name</label>-->
                </div>
              </div>
            <div class="col-md-4">
                <div class="form-label-group">
                  Event Date: <input type="date" name="gEventDate" class="form-control" value="<?php echo $geDate; ?>" required="required">
              <!--<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">-->
              <!--<label for="inputEmail">Email address</label>-->
                </div>
              </div>
                  <div class="col-md-2">
                <div class="form-label-group">
                  Event Time: <input type="time" name="gEventTime" class="form-control" value="<?php echo $geTime; ?>" required="required">
              <!--<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">-->
              <!--<label for="inputEmail">Email address</label>-->
                </div>
              </div>
            </div>
          </div>
          

          
          <div class="form-group">
                <div class="form-label-group">
                  Event Description: <textarea class="form-control" name="details" required="required"><?php echo $geDesc; ?></textarea>
                  <!--<input type="text" id="lastName" class="form-control" placeholder="Last name" required="required">-->
                  <!--<label for="lastName">Last name</label>-->
                </div>
          </div>
          
          <input type = "submit" value = "Next">
          <!--<a class="btn btn-primary btn-block" href="login.html">Register</a>-->
        </form>
        
        <form action = "DeleteGrpEvent.php" method = "post">
            <input type="hidden" name="id" value="<?php echo $GeventID; ?>">
            <br>
            <center><input type = "submit" value = "Delete"></center>
        </form>
        
        <div class="text-center">
          <!--class="d-block small mt-3"-->
          <!--class="d-block small"-->
          <a href="../index.php">Home Page</a>
          <br>
          <a href="get_group_event.php">Back</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</form>
</body>

</html>