<?php
  session_start();

  if($_SESSION['username'] || isset($_COOKIE["logged"])) { // if you were logged in go to paint page
    include "include/databaseInfo.php";
    include "data.class.php";

    $database = new Database();
    $loggedIn = "true";
    /*Query to get retrive URL list from database*/
    $database->query('SELECT url, imageId FROM Images');
    $urlList = $database->resultset();
?>

<!doctype html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css">
  <script type="text/javascript" src="https://dme0ih8comzn4.cloudfront.net/imaging/v3/editor.js"></script>
  <link href="css/home.css" rel="stylesheet" type="text/css">
</head>
<body>
  <?php include 'include/navbar.php';



  ?>
<div class="container">
  <button id="edit" class="btn-warning">Edit</button>
</div>
<!-- Form-->
  <div class="container">
    <div class="row">
        <?php foreach($urlList as $url) { ?>
      <div class="col-md-3">
        <img id="gallery" src="<?php echo $url['url']?>">
        <form id="deleteForm" action="delete.php" method="post">
            <input type="hidden" name="id" value="<?php echo $url['imageId']?>"></input>
            <button type="submit" class="delete btn-xs btn-danger right remove" style="display: inline-block;">Remove</button>
          </form>
        </img>
      </div>
      <? } ?>
    </div>
</div>



  <!-- Footer -->
  <?php  include 'include/footer.php'; ?>


  <!-- Adobe Creative.js -->
   <script src="https://cdn-creativesdk.adobe.io/v1/csdk.js"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/home.js"></script>
</body>
</html>

        <?php } else {
          header("Location: paint.php");
          exit;
        }?>
