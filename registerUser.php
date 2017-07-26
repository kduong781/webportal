<?php
if($_SESSION['username'] || isset($_COOKIE["logged"])) {

  header('Location: index.php');
} else {
  include "include/databaseInfo.php";
  include "data.class.php";
  $database = new Database();
  $user = $_POST["myuser"]; // Gets URL from navbar input
  $pass = $_POST["mypass"];  $usBool = $_POST["usBool"];  if($usBool)
  $database->query('INSERT INTO Users (userName, password, international) VALUES (:user, :pass, :bool)');
  $database->bind(':user', $user);
  $database->bind(':pass', $pass);
  $database->bind(':bool', $usBool);

  $database->execute();
  header('Location: index.php');
}

?>