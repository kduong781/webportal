<?php
if($_SESSION['username'] || isset($_COOKIE["logged"])) {
  include "include/databaseInfo.php";
  include "data.class.php";

  $database = new Database();
  $url = $_POST["url"]; // Gets URL from navbar input
  $database->query('INSERT INTO Images (url) VALUES (:url)');
  $database->bind(':url', $url);
  $database->execute();
  header('Location: paint.php');
} else {
  header('Location: paint.php');
}

?>
