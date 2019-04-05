{"filter":false,"title":"edit_group_event.php","tooltip":"/edit_group_event.php","undoManager":{"mark":36,"position":36,"stack":[[{"start":{"row":0,"column":0},"end":{"row":122,"column":7},"action":"insert","lines":["<?php","","include 'config.php';","","if(isset($_GET['id'])){","  $eventID = $_GET['id'];","} else {","  echo \"Could not get ID\";","}","","$sql = \"SELECT * FROM Event WHERE EventID = '\". $eventID .\"'\";","$eventDetails = mysqli_query($conn, $sql);","","if ($eventDetails == false ) {","  printf(\"Query error: %s\\n%s\", mysqli_error($conn), $sql);","}","","$row = mysqli_fetch_assoc($eventDetails);","","$eName = $row[\"EventName\"];","$eDesc = $row[\"EventDesc\"];","$eDate = $row[\"EventDate\"];","$eTime = $row[\"EventTime\"];","","?>","","<!DOCTYPE html>","<html lang=\"en\">","","<head>","","  <meta charset=\"utf-8\">","  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">","  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">","  <meta name=\"description\" content=\"\">","  <meta name=\"author\" content=\"\">","","  <title>Edit Personal Event</title>","","  <!-- Custom fonts for this template-->","  <link href=\"vendor/fontawesome-free/css/all.min.css\" rel=\"stylesheet\" type=\"text/css\">","","  <!-- Custom styles for this template-->","  <link href=\"../css/sb-admin.css\" rel=\"stylesheet\">","","</head>","","<body class=\"bg-dark\">","  <div class=\"container\">","    <div class=\"card card-register mx-auto mt-5\">","      <div class=\"card-header\">Edit Personal Event</div>","      <div class=\"card-body\">","        <form action = \"UpdatePersEvent.php\" method = \"post\">","        ","        <input type=\"hidden\" name=\"id\" value=\" <?php echo $_GET['id']; ?> \">","          ","          <div class=\"form-group\">","            <div class=\"form-row\">","              <div class=\"col-md-6\">","                <div class=\"form-label-group\">","                  Event Name: <input type=\"text\" name=\"pEventName\" class=\"form-control\" value=\"<?php echo $eName; ?>\" required=\"required\">","                      <!--first_name: <input type = \"text\" name = \"fname\">-->","                      <!--<label for=\"firstName\">First name</label>-->","                </div>","              </div>","            <div class=\"col-md-4\">","                <div class=\"form-label-group\">","                  Event Date: <input type=\"date\" name=\"pEventDate\" class=\"form-control\" value=\"<?php echo $eDate; ?>\" required=\"required\">","              <!--<input type=\"email\" id=\"inputEmail\" class=\"form-control\" placeholder=\"Email address\" required=\"required\">-->","              <!--<label for=\"inputEmail\">Email address</label>-->","                </div>","              </div>","                  <div class=\"col-md-2\">","                <div class=\"form-label-group\">","                  Event Time: <input type=\"time\" name=\"pEventTime\" class=\"form-control\" value=\"<?php echo $eTime; ?>\" required=\"required\">","              <!--<input type=\"email\" id=\"inputEmail\" class=\"form-control\" placeholder=\"Email address\" required=\"required\">-->","              <!--<label for=\"inputEmail\">Email address</label>-->","                </div>","              </div>","            </div>","          </div>","          ","","          ","          <div class=\"form-group\">","                <div class=\"form-label-group\">","                  Event Description: <textarea class=\"form-control\" name=\"details\" required=\"required\"><?php echo $eDesc; ?></textarea>","                  <!--<input type=\"text\" id=\"lastName\" class=\"form-control\" placeholder=\"Last name\" required=\"required\">-->","                  <!--<label for=\"lastName\">Last name</label>-->","                </div>","          </div>","          ","          <input type = \"submit\" value = \"Next\">","          <!--<a class=\"btn btn-primary btn-block\" href=\"login.html\">Register</a>-->","        </form>","        ","        <form action = \"DeletePersEvent.php\" method = \"post\">","            <input type=\"hidden\" name=\"id\" value=\"<?php echo $eventID; ?>\">","            <br>","            <center><input type = \"submit\" value = \"Delete\"></center>","        </form>","        ","        <div class=\"text-center\">","          <!--class=\"d-block small mt-3\"-->","          <!--class=\"d-block small\"-->","          <a href=\"../index.php\">Home Page</a>","          <br>","          <a href=\"get_personal_event.php\">Back</a>","        </div>","      </div>","    </div>","  </div>","","  <!-- Bootstrap core JavaScript-->","  <script src=\"vendor/jquery/jquery.min.js\"></script>","  <script src=\"vendor/bootstrap/js/bootstrap.bundle.min.js\"></script>","","  <!-- Core plugin JavaScript-->","  <script src=\"vendor/jquery-easing/jquery.easing.min.js\"></script>","</form>","</body>","","</html>"],"id":1}],[{"start":{"row":5,"column":3},"end":{"row":5,"column":4},"action":"insert","lines":["G"],"id":2}],[{"start":{"row":10,"column":22},"end":{"row":10,"column":23},"action":"insert","lines":["G"],"id":3},{"start":{"row":10,"column":23},"end":{"row":10,"column":24},"action":"insert","lines":["r"]},{"start":{"row":10,"column":24},"end":{"row":10,"column":25},"action":"insert","lines":["o"]},{"start":{"row":10,"column":25},"end":{"row":10,"column":26},"action":"insert","lines":["u"]},{"start":{"row":10,"column":26},"end":{"row":10,"column":27},"action":"insert","lines":["p"]}],[{"start":{"row":10,"column":39},"end":{"row":10,"column":40},"action":"insert","lines":["F"],"id":4},{"start":{"row":10,"column":40},"end":{"row":10,"column":41},"action":"insert","lines":["r"]},{"start":{"row":10,"column":41},"end":{"row":10,"column":42},"action":"insert","lines":["p"]}],[{"start":{"row":10,"column":41},"end":{"row":10,"column":42},"action":"remove","lines":["p"],"id":5},{"start":{"row":10,"column":40},"end":{"row":10,"column":41},"action":"remove","lines":["r"]},{"start":{"row":10,"column":39},"end":{"row":10,"column":40},"action":"remove","lines":["F"]}],[{"start":{"row":10,"column":39},"end":{"row":10,"column":40},"action":"insert","lines":["G"],"id":6},{"start":{"row":10,"column":40},"end":{"row":10,"column":41},"action":"insert","lines":["r"]},{"start":{"row":10,"column":41},"end":{"row":10,"column":42},"action":"insert","lines":["p"]}],[{"start":{"row":10,"column":57},"end":{"row":10,"column":58},"action":"insert","lines":["G"],"id":7}],[{"start":{"row":11,"column":1},"end":{"row":11,"column":2},"action":"insert","lines":["G"],"id":8}],[{"start":{"row":13,"column":5},"end":{"row":13,"column":6},"action":"insert","lines":["G"],"id":9}],[{"start":{"row":17,"column":27},"end":{"row":17,"column":28},"action":"insert","lines":["G"],"id":10}],[{"start":{"row":19,"column":15},"end":{"row":19,"column":16},"action":"insert","lines":["G"],"id":11},{"start":{"row":19,"column":16},"end":{"row":19,"column":17},"action":"insert","lines":["r"]},{"start":{"row":19,"column":17},"end":{"row":19,"column":18},"action":"insert","lines":["p"]}],[{"start":{"row":20,"column":15},"end":{"row":20,"column":16},"action":"insert","lines":["G"],"id":12},{"start":{"row":20,"column":16},"end":{"row":20,"column":17},"action":"insert","lines":["r"]},{"start":{"row":20,"column":17},"end":{"row":20,"column":18},"action":"insert","lines":["p"]}],[{"start":{"row":20,"column":27},"end":{"row":20,"column":28},"action":"insert","lines":["r"],"id":13},{"start":{"row":20,"column":28},"end":{"row":20,"column":29},"action":"insert","lines":["i"]},{"start":{"row":20,"column":29},"end":{"row":20,"column":30},"action":"insert","lines":["p"]},{"start":{"row":20,"column":30},"end":{"row":20,"column":31},"action":"insert","lines":["t"]},{"start":{"row":20,"column":31},"end":{"row":20,"column":32},"action":"insert","lines":["i"]},{"start":{"row":20,"column":32},"end":{"row":20,"column":33},"action":"insert","lines":["o"]},{"start":{"row":20,"column":33},"end":{"row":20,"column":34},"action":"insert","lines":["n"]}],[{"start":{"row":21,"column":15},"end":{"row":21,"column":16},"action":"insert","lines":["G"],"id":14},{"start":{"row":21,"column":16},"end":{"row":21,"column":17},"action":"insert","lines":["r"]},{"start":{"row":21,"column":17},"end":{"row":21,"column":18},"action":"insert","lines":["p"]}],[{"start":{"row":22,"column":15},"end":{"row":22,"column":16},"action":"insert","lines":["G"],"id":15},{"start":{"row":22,"column":16},"end":{"row":22,"column":17},"action":"insert","lines":["r"]},{"start":{"row":22,"column":17},"end":{"row":22,"column":18},"action":"insert","lines":["p"]}],[{"start":{"row":19,"column":1},"end":{"row":19,"column":2},"action":"insert","lines":["g"],"id":16}],[{"start":{"row":20,"column":1},"end":{"row":20,"column":2},"action":"insert","lines":["g"],"id":17}],[{"start":{"row":21,"column":1},"end":{"row":21,"column":2},"action":"insert","lines":["g"],"id":18}],[{"start":{"row":22,"column":1},"end":{"row":22,"column":2},"action":"insert","lines":["g"],"id":19}],[{"start":{"row":37,"column":14},"end":{"row":37,"column":22},"action":"remove","lines":["Personal"],"id":20},{"start":{"row":37,"column":14},"end":{"row":37,"column":15},"action":"insert","lines":["G"]},{"start":{"row":37,"column":15},"end":{"row":37,"column":16},"action":"insert","lines":["r"]},{"start":{"row":37,"column":16},"end":{"row":37,"column":17},"action":"insert","lines":["o"]},{"start":{"row":37,"column":17},"end":{"row":37,"column":18},"action":"insert","lines":["u"]},{"start":{"row":37,"column":18},"end":{"row":37,"column":19},"action":"insert","lines":["p"]}],[{"start":{"row":50,"column":36},"end":{"row":50,"column":44},"action":"remove","lines":["Personal"],"id":21},{"start":{"row":50,"column":36},"end":{"row":50,"column":37},"action":"insert","lines":["G"]},{"start":{"row":50,"column":37},"end":{"row":50,"column":38},"action":"insert","lines":["r"]},{"start":{"row":50,"column":38},"end":{"row":50,"column":39},"action":"insert","lines":["o"]},{"start":{"row":50,"column":39},"end":{"row":50,"column":40},"action":"insert","lines":["u"]},{"start":{"row":50,"column":40},"end":{"row":50,"column":41},"action":"insert","lines":["p"]}],[{"start":{"row":52,"column":30},"end":{"row":52,"column":34},"action":"remove","lines":["Pers"],"id":22},{"start":{"row":52,"column":30},"end":{"row":52,"column":31},"action":"insert","lines":["G"]},{"start":{"row":52,"column":31},"end":{"row":52,"column":32},"action":"insert","lines":["r"]},{"start":{"row":52,"column":32},"end":{"row":52,"column":33},"action":"insert","lines":["p"]}],[{"start":{"row":60,"column":55},"end":{"row":60,"column":56},"action":"remove","lines":["p"],"id":23}],[{"start":{"row":60,"column":55},"end":{"row":60,"column":56},"action":"insert","lines":["g"],"id":24}],[{"start":{"row":60,"column":107},"end":{"row":60,"column":108},"action":"insert","lines":["g"],"id":25}],[{"start":{"row":67,"column":55},"end":{"row":67,"column":56},"action":"remove","lines":["p"],"id":26}],[{"start":{"row":67,"column":55},"end":{"row":67,"column":56},"action":"insert","lines":["g"],"id":27}],[{"start":{"row":67,"column":107},"end":{"row":67,"column":108},"action":"insert","lines":["g"],"id":28}],[{"start":{"row":74,"column":55},"end":{"row":74,"column":56},"action":"remove","lines":["p"],"id":29}],[{"start":{"row":74,"column":55},"end":{"row":74,"column":56},"action":"insert","lines":["g"],"id":30}],[{"start":{"row":74,"column":107},"end":{"row":74,"column":108},"action":"insert","lines":["g"],"id":31}],[{"start":{"row":86,"column":115},"end":{"row":86,"column":116},"action":"insert","lines":["g"],"id":32}],[{"start":{"row":96,"column":33},"end":{"row":96,"column":34},"action":"remove","lines":["s"],"id":33},{"start":{"row":96,"column":32},"end":{"row":96,"column":33},"action":"remove","lines":["r"]},{"start":{"row":96,"column":31},"end":{"row":96,"column":32},"action":"remove","lines":["e"]},{"start":{"row":96,"column":30},"end":{"row":96,"column":31},"action":"remove","lines":["P"]}],[{"start":{"row":96,"column":30},"end":{"row":96,"column":31},"action":"insert","lines":["G"],"id":34},{"start":{"row":96,"column":31},"end":{"row":96,"column":32},"action":"insert","lines":["r"]},{"start":{"row":96,"column":32},"end":{"row":96,"column":33},"action":"insert","lines":["p"]}],[{"start":{"row":97,"column":62},"end":{"row":97,"column":63},"action":"insert","lines":["G"],"id":35}],[{"start":{"row":107,"column":24},"end":{"row":107,"column":31},"action":"remove","lines":["ersonal"],"id":36},{"start":{"row":107,"column":23},"end":{"row":107,"column":24},"action":"remove","lines":["p"]}],[{"start":{"row":107,"column":23},"end":{"row":107,"column":24},"action":"insert","lines":["g"],"id":37},{"start":{"row":107,"column":24},"end":{"row":107,"column":25},"action":"insert","lines":["r"]},{"start":{"row":107,"column":25},"end":{"row":107,"column":26},"action":"insert","lines":["o"]},{"start":{"row":107,"column":26},"end":{"row":107,"column":27},"action":"insert","lines":["u"]},{"start":{"row":107,"column":27},"end":{"row":107,"column":28},"action":"insert","lines":["p"]}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":22,"column":31},"end":{"row":22,"column":31},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1554490462755,"hash":"94bb1879fbb7c7991ffc7691f13a7dcad323e7e7"}