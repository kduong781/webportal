<?php
if($_SESSION['username'] || isset($_COOKIE["logged"])) {
  include "include/databaseInfo.php";

  include "data.class.php";

  $database = new Database();
//  $id = $_GET["id"];
  $id = $_POST["id"];
  $database->query('DELETE FROM Images WHERE imageId=:id');
  $database->bind(':id', $id);
  $database->execute();
  header('Location: images.php');
} else {
  header('Location: images.php');
}

?>
