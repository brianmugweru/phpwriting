<?php
  require("session.php");
  $job_id = $_POST['job_id'];
  $adminsay = $_POST['verify'];
  if($role == "admin"){
    userst($job_id, $adminsay, 'status');
    header("location:../../admin.php");
  }
  else if($role == "normal"){
    userst($job_id, $adminsay, 'user_status');
    header("location:../../personal.php");
  }
  else{
    die("really mate, You look like a non existent user of the system, stop being an idiot");
  }

  function userst($job_id, $adminsay, $tblstatus){
    global $db;
    $sql = mysqli_query($db, "UPDATE jobs SET $tblstatus = '$adminsay' WHERE id = '$job_id'");
    if(!$sql){
      die("could not update status, Please contact system adminsitrator for further research".mysqli_error($db));
    }
  }

?>
