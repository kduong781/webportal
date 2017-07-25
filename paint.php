<?php
session_start(); // starts session
$username = $_POST["myuser"]; // retrieves username from login form
$password = $_POST["mypass"]; // retrives pass from login form
$session = "false";
if($_SESSION['username'] || isset($_COOKIE["logged"])) {
  $session = "true";
}
if($username != "admin" && $password != "admin" && $session != "true") { //if username && pass does not match go back to login form
  header("Location: index.php");
  exit;
} else { // else continue to filter page
  if($session != "true") {
    $_SESSION['username'] = $username; //stores session info so you dont have to relog
    $_SESSION['mypass'] = $password;
    setcookie("logged", $username, time() + (86400 * 30), "/");
  //  setcookie("", $username, time() + (86400 * 30), "/");
  }
    $loggedIn = "true";

    /* Database Info*/
    include "include/databaseInfo.php";
    include "data.class.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Paint</title>
  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
   <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css">
   <script type="text/javascript" src="https://dme0ih8comzn4.cloudfront.net/imaging/v3/editor.js"></script>
      <link href="css/home.css" rel="stylesheet" type="text/css">
</head>
<body>

    <?php include 'include/navbar.php';?>

  <div class="row">
		<div class="col-md-2">
			<div class="row">
				<div class="col-md-12">
					<button id="edit-image-button" class="btn btn-primary btn-block button-panel">Edit Image</button>
				</div>
				<div class="col-md-12">
					<button id="reset-image-button" class="btn btn-warning btn-block button-panel">Reset Image</button>
				</div>
        <div class="col-md-12">
          <form action="insert.php" method="post">
            <input id="savedImage" name="url" type="hidden"></input>
            <button id="save-image" type="submit" class="btn btn-success btn-block button-panel">Save Image</button>
          </form>
        </div>
			</div>
		</div>
		<div class="col-md-9">
			<img id="editable-image" class="img-responsive" src="/img/corgi.jpg"/>
		</div>
	</div>


</body>
</html>
<?php } ?>
<!-- Footer -->
<?php  include 'include/footer.php'; ?>


<!-- Adobe Creative.js -->
 <script src="https://cdn-creativesdk.adobe.io/v1/csdk.js"></script>
 <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="js/home.js"></script>

</script>
</body>
</html>
