<?php
if($_SESSION['username'] || isset($_COOKIE["logged"])) {

  header('Location: index.php');
} else {
  include "include/databaseInfo.php";
  include "data.class.php";
  $database = new Database();
  $user = $_POST["myuser"]; // Gets URL from navbar input
  $pass = $_POST["mypass"];
  $database->query('INSERT INTO Users (userName, password) VALUES (:user, :pass)');
  $database->bind(':user', $user);
  $database->bind(':pass', $pass);
  $database->execute();
  header('Location: index.php');
}

?>
