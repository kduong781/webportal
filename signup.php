<?php
  session_start();

  if($_SESSION['username'] || isset($_COOKIE["logged"])) { // if you were logged in go to paint page
    header("Location: paint.php");
    exit;
  } else {
?>

<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css">
  <link href="css/home.css" rel="stylesheet" type="text/css">
</head>
<body>
  <?php include 'include/navbar.php';?>

<!-- Form-->
  <div class="container">
    <form class="form-horizontal" action="registerUser.php" method="post">
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Username:</label>
        <div class="col-sm-10">
          <input type="text" name="myuser" class="form-control" id="email" placeholder="Enter username..">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Password:</label>
        <div class="col-sm-10">
          <input type="password" name="mypass" class="form-control" id="pwd" placeholder="Enter password..">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Confirm Password:</label>
        <div class="col-sm-10">
          <input type="password" name="mypass2" class="form-control" id="pwd2" placeholder="Enter password..">
        </div>
      </div>


      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success">Register</button>
        </div>
      </div>
    </form>
  </div>




  <!-- Footer -->
  <?php  include 'include/footer.php'; ?>


  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

        <?php } ?>
