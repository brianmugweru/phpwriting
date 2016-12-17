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

  function getField($field){
    global $db, $check_session;
    $sql = mysqli_query($db, "SELECT $field FROM Users WHERE username = '".$check_session."'");
    if(mysqli_num_rows($sql)>0){
      if($row = mysqli_fetch_assoc($sql)){
        return $row[$field];
      }
    }else{
      return("user does not exist in the database");
    }
  }

?>
