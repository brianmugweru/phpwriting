<?php
  $role = getField("role");
  if($role != "admin"){
    header("location:{$_SERVER['HTTP_REFERER']}");
  }
?>

