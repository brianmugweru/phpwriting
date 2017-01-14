<?php
$page = 'users';
$pagetitle = 'my users';
  require("portal.php");
function dashboard(){
  global $db;
  $sql = mysqli_query($db,"SELECT * FROM Users");
  if(!$sql){
    echo "Can not select data from database";
  }
  if(mysqli_num_rows($sql)>0){
    while($row = mysqli_fetch_assoc($sql)){
      print_r($row);
    }
  }
}
?>
