<?php
  include('config.php');
  session_start();

  if(!isset($_SESSION["username"]) or empty($_SESSION["username"])){
    header("location:login.php");
  }

  $check_session = $_SESSION["username"];

  $sess_sql = mysqli_query($db, "SELECT username FROM Users WHERE username = '" .$check_session."'");

  if($row = mysqli_fetch_assoc($sess_sql)){
    $usersession = $row["username"];
  }

?>
