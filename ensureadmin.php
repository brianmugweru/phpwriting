<?php
  $role = getField("role");
echo $role;
  if($role != "admin"){
    /*header("location:{$_SERVER['HTTP_REFERER']}");*/
    //header("location:landing.php");
  }
?>

