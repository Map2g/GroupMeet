<?php

include 'config.php';

if(isset($_GET['id'])){
  $eventID = $_GET['id'];
} else {
  echo "Could not get ID";
}

$sql = "SELECT * FROM Event WHERE EventID = '". $eventID ."'";
$eventDetails = mysqli_query($conn, $sql);

if ($eventDetails == false ) {
  printf("Query error: %s\n%s", mysqli_error($conn), $sql);
}

$row = mysqli_fetch_assoc($eventDetails);

$eName = $row["EventName"];
$eDesc = $row["EventDesc"];
$eDate = $row["EventDate"];
$eTime = $row["EventTime"];

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Edit Personal Event</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Edit Personal Event</div>
      <div class="card-body">
        <form action = "UpdatePersEvent.php" method = "post">
        
        <input type="hidden" name="id" value=" <?php echo $_GET['id']; ?> ">
          
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  Event Name: <input type="text" name="pEventName" class="form-control" value="<?php echo $eName; ?>" required="required">
                      <!--first_name: <input type = "text" name = "fname">-->
                      <!--<label for="firstName">First name</label>-->
                </div>
              </div>
            <div class="col-md-4">
                <div class="form-label-group">
                  Event Date: <input type="date" name="pEventDate" class="form-control" value="<?php echo $eDate; ?>" required="required">
              <!--<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">-->
              <!--<label for="inputEmail">Email address</label>-->
                </div>
              </div>
                  <div class="col-md-2">
                <div class="form-label-group">
                  Event Time: <input type="time" name="pEventTime" class="form-control" value="<?php echo $eTime; ?>" required="required">
              <!--<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">-->
              <!--<label for="inputEmail">Email address</label>-->
                </div>
              </div>
            </div>
          </div>
          

          
          <div class="form-group">
                <div class="form-label-group">
                  Event Description: <textarea class="form-control" name="details" required="required"><?php echo $eDesc; ?></textarea>
                  <!--<input type="text" id="lastName" class="form-control" placeholder="Last name" required="required">-->
                  <!--<label for="lastName">Last name</label>-->
                </div>
          </div>
          
          <input type = "submit" value = "Next">
          <!--<a class="btn btn-primary btn-block" href="login.html">Register</a>-->
        </form>
        
        <form action = "DeletePersEvent.php" method = "post">
            <input type="hidden" name="id" value="<?php echo $eventID; ?>">
            <br>
            <center><input type = "submit" value = "Delete"></center>
        </form>
        
        <div class="text-center">
          <!--class="d-block small mt-3"-->
          <!--class="d-block small"-->
          <a href="../index.php">Home Page</a>
          <br>
          <a href="get_personal_event.php">Back</a>
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