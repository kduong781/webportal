<?php
   session_start();
   include "include/databaseInfo.php";
   include "data.class.php";

   $username = $_POST["myuser"]; // retrieves username from login form
   $password = $_POST["mypass"]; // retrives pass from login form
   $database = new Database();
   $database->query('SELECT * FROM Users');
//   $database->bind(':user', $username);
   //$database->bind(':pass', $password);
   $urlList = $database->resultset();
   $valid = "invalid";
   foreach($urlList as $url) {
     //echo "username: " . $url['userName']. " ";
  //   echo "usernameInput: " . $username . " ";
     if($url['userName'] == $username && $url['password'] == $password) {
            $_SESSION['username'] = $username; //stores session info so you dont have to relog
            setcookie("logged", $username, time() + (86400 * 30), "/");
            if($url["international"] == "no") {
              $_SESSION['usBool'] = $url["international"];
              setcookie("usBool", $url["international"], time() + (86400 * 30), "/");
              echo $url["international"];
            }
            // header('Location: form.php');
     }
   }

     header('Location: index.php');

 ?>
