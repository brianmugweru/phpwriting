<?php
  include('resources/config.php');

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
