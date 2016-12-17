<?php
  require("session.php");
  $sql = mysqli_query($db,"SELECT * FROM Users");
  if(!$sql){
    echo "Can not select data from database";
  }
  if(mysqli_num_rows($sql)>0){
    while($row = mysqli_fetch_assoc($sql)){
      $username = $row["username"];
      $fullname = $row["fullname"];
      $email = $row["
    }
?>
