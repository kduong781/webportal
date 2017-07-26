<?php
session_start(); // starts session
$username = $_POST["myuser"]; // retrieves username from login form
$password = $_POST["mypass"]; // retrives pass from login form
$session = "false";
if($_SESSION['username'] || isset($_COOKIE["logged"])) {
  $session = "true";
}
if($session != "true") { //if username && pass does not match go back to login form
  header("Location: index.php");  exit;
} else { // else continue to filter page

    /* Database Info*/
    include "include/databaseInfo.php";
    include "data.class.php";    $loggedIn = "true";
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
<body style="background-color:rgb(231,232,234)">
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
          <label class="control-label col-sm-3" for="email">Requested Ship Date:</label>
          <div class="col-sm-9">
            <input type="text" name="sShip" class="form-control" id="sShip" placeholder="Enter Ship Date">
          </div>
        </div>


        <div class="form-group">
          <label class="control-label col-sm-3" for="email">Requested Install Date:</label>
          <div class="col-sm-9">
            <input type="text" name="sInstall" class="form-control" id="sInstall" placeholder="Enter Install Date">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="email">Requested Ship Date:</label>
          <div class="col-sm-9">
            <input type="text" name="sInstall" class="form-control" id="sInstall" placeholder="Enter Install Date">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="email">Deal Type:</label>
          <div class="col-sm-9">
            <input type="text" name="sType" class="form-control" id="sType" placeholder="Deal Type">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="email">SFDC Updated:</label>
          <div class="col-sm-9.1">
            <label class="radio-inline"><input type="radio" name="sUpdate">Yes</label>
            <label class="radio-inline"><input type="radio" name="sUpdate">No</label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="email">SFDC Oppty Link:</label>
          <div class="col-sm-9">
            <input type="text" name="sLink" class="form-control" id="sLink" placeholder="Enter Oppty Link">
          </div>
        </div>
<div class="container-fluid">
        </div>

        <h2>Systems to be shipped to this site</h2>

        <table>

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
        <!-- this is where we worked around the green background of the h2 in the bill to section-->
        <div class="container-fluid">        </div>

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
    <input type="text" name="myuser" class="form-control" id="email" placeholder="Enter email">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="email">Phone:</label>
  <div class="col-sm-10">
    <input type="text" name="myuser" class="form-control" id="email" placeholder="Enter phone number">
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
<?php if($_SESSION['usBool'] && isset($_COOKIE["usBool"])) {?>
<div class="row">
  <div class="col-md-12">

            <h2 class="title">International Requirements: </h2>



            <div class="form-group">
            <label class="control-label col-sm-3" for="email">Sales Order Amount for Commercial Invoice:</label>
            <div class="col-sm-9">
              <input type="text" name="iAmount" class="form-control" id="iAmount" placeholder="This is the unit cost each amount from the reseller to end user and is needed when shipping to end user.">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Customer or Resellers VAT ID #:</label>
            <div class="col-sm-9">
              <input type="text" name="iCustomerId" class="form-control" id="iCustomerId" placeholder="Necessary for all orders (EU customers incl.)">
            </div>
          </div>

          <div class="form-group">
          <label class="control-label col-sm-3" for="email">European Union Shipments</label>
          <div class="col-sm-9">
            <input type="text" name="iEori" class="form-control" id="iEori" placeholder="For European Union Shipments only">
          </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-3" for="email">Customer or Resellers GST #:</label>
        <div class="col-sm-9">
          <input type="text" name="iCustomerGST" class="form-control" id="iCustomerGST" placeholder="For Canada, Australia, New Zealand, Singapore">
        </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-3" for="email">For India - Need PAN and TAN # AND IEC:</label>
      <div class="col-sm-9">
        <input type="text" name="iIndia" class="form-control" id="iIndia" placeholder="For India Shipments only">
      </div>
    </div>
    <div class="form-group">
    <label class="control-label col-sm-3" for="email">For China - need China registration #</label>
    <div class="col-sm-9">
      <input type="text" name="iChina" class="form-control" id="iChina" placeholder="For China Shipments only">
    </div>  </div>

    <div class="form-group">
    <label class="control-label col-sm-3" for="email">Importer or Record:</label>
    <div class="col-sm-9">
      <input type="text" name="iRecord" class="form-control" id="iRecord" placeholder="Recommended for all countries (non EU)">
    </div>
  </div>

  <div class="form-group">
  <label class="control-label col-sm-3" for="email">Broker:</label>
  <div class="col-sm-9">
    <input type="text" name="iBroker" class="form-control" id="iBroker" placeholder="Enter Broker">
  </div>
  </div>

  <div class="form-group">
  <label class="control-label col-sm-3" for="email">Incoterms for freight, taxes, and duty:</label>
  <div class="col-sm-9">
    <input type="text" name="iTax" class="form-control" id="iTax" placeholder="Enter taxes">
  </div>
</div>
<?php  } ?>  </div></div>



<div class="center">
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="button1" >Submit</button>
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