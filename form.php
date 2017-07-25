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
	<title>Form</title>
  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
   <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css">
   <script type="text/javascript" src="https://dme0ih8comzn4.cloudfront.net/imaging/v3/editor.js"></script>
      <link href="css/home.css" rel="stylesheet" type="text/css">
</head>
<body>

    <?php include 'include/navbar.php';?>
 <div class="container-fluid">
  <div class="row">
    <form>
    <div class="col-md-6">

        <h2 class="title">Ship to: </h2>
        <div class="form-group">
        <label class="control-label col-sm-2" for="email">Company:</label>
        <div class="col-sm-10">
          <input type="text" name="sCompany" class="form-control" id="sCompany" placeholder="Enter Company">
        </div>
      </div>
        <div class="form-group">
        <label class="control-label col-sm-2" for="email">Contact:</label>
        <div class="col-sm-10">
          <input type="text" name="sContact" class="form-control" id="sContact" placeholder="Enter Contact">
        </div>
      </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Email:</label>
          <div class="col-sm-10">
            <input type="text" name="sEmail" class="form-control" id="sEmail" placeholder="Enter Email">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Address:</label>
          <div class="col-sm-10">
            <input type="text" name="sAddress" class="form-control" id="sAddress" placeholder="Enter Address">
              <input type="text" name="sAddress2" class="form-control" id="sAddress2" placeholder="Enter Apartment #, suite, etc">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">PO:</label>
          <div class="col-sm-10">
            <input type="text" name="sPo" class="form-control" id="sPo" placeholder="Enter PO">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Phone:</label>
          <div class="col-sm-10">
            <input type="text" name="sPhone" class="form-control" id="sPhone" placeholder="Enter Phone">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Requested Ship Date:</label>
          <div class="col-sm-10">
            <input type="text" name="sShip" class="form-control" id="sShip" placeholder="Enter Ship Date">
          </div>
        </div>
        <!--<div class="form-group">
          <label class="control-label col-sm-2" for="email">Requested Install Date:</label>
          <div class="col-sm-10">
            <input type="text" name="sInstall" class="form-control" id="sInstall" placeholder="Enter Install Date">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Requested Ship Date:</label>
          <div class="col-sm-10">
            <input type="text" name="sInstall" class="form-control" id="sInstall" placeholder="Enter Install Date">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Deal Type:</label>
          <div class="col-sm-10">
            <input type="text" name="sType" class="form-control" id="sType" placeholder="Deal Type">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">SFDC Updated:</label>
          <div class="col-sm-10">
            <input type="checkbox" name="sUpdate" class="form-control" id="sUpdate">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">SFDC Oppty Link:</label>
          <div class="col-sm-10">
            <input type="text" name="sLink" class="form-control" id="sLink" placeholder="Enter Oppty Link">
          </div>
        </div> -->
    </div>

    <div class="col-md-6">
        <h2 class="title">Bill to: </h2>

        <div class="form-group">
        <label class="control-label col-sm-2" for="email">Company:</label>
        <div class="col-sm-10">
          <input type="text" name="bCompany" class="form-control" id="bCompany" placeholder="Enter Company">
        </div>
      </div>
        <div class="form-group">
        <label class="control-label col-sm-2" for="email">Contact:</label>
        <div class="col-sm-10">
          <input type="text" name="bContact" class="form-control" id="bContact" placeholder="Enter Contact">
        </div>
      </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Email:</label>
          <div class="col-sm-10">
            <input type="text" name="bEmail" class="form-control" id="bEmail" placeholder="Enter Email">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Address:</label>
          <div class="col-sm-10">
            <input type="text" name="bAddress" class="form-control" id="bAddress" placeholder="Enter Address">
              <input type="text" name="bAddress2" class="form-control" id="bAddress2" placeholder="Enter Apartment #, Suite, etc">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">PO:</label>
          <div class="col-sm-10">
            <input type="text" name="bPo" class="form-control" id="bPo" placeholder="Enter PO">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Phone:</label>
          <div class="col-sm-10">
            <input type="text" name="bPhone" class="form-control" id="bPhone" placeholder="Enter Phone">
          </div>
        </div>
        <div class="container-fluid">


</div>

<h2 class="title">Support Contact at End User</h2>
<div class="form-group">
  <label class="control-label col-sm-2" for="email">Contact:</label>
  <div class="col-sm-10">
    <input type="text" name="myuser" class="form-control" id="email" placeholder="Enter username">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="email">Email:</label>
  <div class="col-sm-10">
    <input type="text" name="myuser" class="form-control" id="email" placeholder="Enter username">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="email">Phone:</label>
  <div class="col-sm-10">
    <input type="text" name="myuser" class="form-control" id="email" placeholder="Enter username">
  </div>
</div>

</div>


<div class="col-md-6">
  <h2>Systems to be shipped to this site</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Model</th>
        <th>Quantity</th>
        <th>10G Base T</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td><input type="text"></td>
        <td><input type="text"></td>
        <td><input type="text"></td>
      </tr>
      <tr>
        <td><input type="text"></td>
        <td><input type="text"></td>
        <td><input type="text"></td>
      </tr>
      <tr>
        <td><input type="text"></td>
        <td><input type="text"></td>
        <td><input type="text"></td>
      </tr>
    </tbody>
  </table>

  <h3>FedEx Ship Options</h3>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Shipping Type:</label>
    <div class="col-sm-10">
      <label class="radio-inline"><input type="radio" name="shippingType">Priority</label>
      <label class="radio-inline"><input type="radio" name="shippingType">2 Day</label>
      <label class="radio-inline"><input type="radio" name="shippingType">3 Day</label>
      <label class="radio-inline"><input type="radio" name="shippingType">Ground</label>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Receiving Hours:</label>
    <div class="col-sm-10">
      <label class="radio-inline"><input type="radio" name="rHours">Yes</label>
      <label class="radio-inline"><input type="radio" name="rHours">No</label>
    </div>
  </div>
</div>

<div class="col-md-6">
  <h2>System Notes</h2>
  <p>NF-400 & above Ships w/ Std 10 gig SFP/CX4 card unless 10G Base T is requested. 2 x 10G SFP+transceiver, and f/o cable are for $750. Input in "Model" section. Please contact Jay Farren for availability.</p>
  <p> No encrypted filers to Russia or China</p>
  <h2>Any Special Instructions</h2>
  <textarea type="text" rows="3" placeholder="i.e Saturday delivery, etc" width="100%"></textarea>
</div>

</div>

<div class="row">
  <div class="col-md-12">

            <h2 class="title">International Requirements: </h2>
            <div class="form-group">
            <label class="control-label col-sm-2" for="email">Sales Order Amount for Commercial Invoice:</label>
            <div class="col-sm-10">
              <input type="text" name="iAmount" class="form-control" id="iAmount" placeholder="Enter Amount">
            </div>
          </div>
          <div class="form-group">
          <label class="control-label col-sm-2" for="email">Sales Order Amount for Commercial Invoice:</label>
          <div class="col-sm-10">
            <input type="text" name="iAmount" class="form-control" id="iAmount" placeholder="Enter Amount">
          </div>
        </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Customer or Resellers VAT ID #:</label>
            <div class="col-sm-10">
              <input type="text" name="iCustomerId" class="form-control" id="iCustomerId" placeholder="VAT ID #">
            </div>
          </div>

          <div class="form-group">
          <label class="control-label col-sm-2" for="email">European Union Shipments</label>
          <div class="col-sm-10">
            <input type="text" name="iEori" class="form-control" id="iEori" placeholder="EORI #">
          </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-2" for="email">Customer or Resellers GST #:</label>
        <div class="col-sm-10">
          <input type="text" name="iCustomerGST" class="form-control" id="iCustomerGST" placeholder="GST #">
        </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-2" for="email">For India - Need PAN and TAN # AND IEC:</label>
      <div class="col-sm-10">
        <input type="text" name="iIndia" class="form-control" id="iIndia" placeholder="Enter Information">
      </div>
    </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="email">For China - need China registration #</label>
    <div class="col-sm-10">
      <input type="text" name="iChina" class="form-control" id="iChina" placeholder="China Registration #">
    </div>

    <div class="form-group">
    <label class="control-label col-sm-2" for="email">Importer or Record:</label>
    <div class="col-sm-10">
      <input type="text" name="iRecord" class="form-control" id="iRecord" placeholder="Enter Information">
    </div>
  </div>

  <div class="form-group">
  <label class="control-label col-sm-2" for="email">Broker:</label>
  <div class="col-sm-10">
    <input type="text" name="iBroker" class="form-control" id="iBroker" placeholder="Enter Broker">
  </div>
  </div>

  <div class="form-group">
  <label class="control-label col-sm-2" for="email">Incoterms for freight, taxes, and duty:</label>
  <div class="col-sm-10">
    <input type="text" name="iTax" class="form-control" id="iTax" placeholder="Enter taxes">
  </div>
</div>
  </div>

  </div>
</div>
<div class="center">
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
  </div>
</form>
</div>



</body>
</html>
<?php } ?>
<!-- Footer -->
<?php  include 'include/footer.php'; ?>

 <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="js/home.js"></script>

</script>
</body>
</html>
