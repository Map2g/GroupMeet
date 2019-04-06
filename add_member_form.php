<!DOCTYPE html>
<html lang="en">
  
<?php

include 'config.php';

if(isset($_GET['id'])){
  $groupID = $_GET['id'];
} else {
  echo "Could not get ID";
}

?>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Add a Member</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Add a Member</div>
      <div class="card-body">
        <form action = "add_member.php" method = "post">
          
          <input type="hidden" name="id" value=" <?php echo $groupID; ?> ">
          
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  Member Email: <input type="text" name="member_email" class="form-control" placeholder="Email" required="required">
                  <!--<input type="text" id="lastName" class="form-control" placeholder="Last name" required="required">-->
                  <!--<label for="lastName">Last name</label>-->
                </div>
              </div>
            </div>
          </div>
          
          <input type = "submit" value = "Next">
          <!--<a class="btn btn-primary btn-block" href="login.html">Register</a>-->
        </form>
        
        <div class="text-center">
          <!--class="d-block small mt-3"-->
          <!--class="d-block small"-->
          <a href="../index.php">Home Page</a>
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
