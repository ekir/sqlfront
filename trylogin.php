<?php
  // We can not have error reporting. Because this page is used like ajax
  error_reporting(0); 

  $username=$_GET["username"];
  $password=$_GET["password"];
  $hostname=$_GET["hostname"];

  $trylogin=mysql_connect($hostname,$username,$password);

  if($trylogin) {
    session_start();
    $_SESSION["sqlfront"]["username"]=$username;
    $_SESSION["sqlfront"]["password"]=$password;
    $_SESSION["sqlfront"]["hostname"]=$hostname;
    echo "1";
  } else {
    echo "0";
  }
?>