<?php
  require("session.php");
  $job_id = $_POST['job_id'];
  $adminsay = $_POST['verify'];
  $sql = mysqli_query($db, "UPDATE jobs SET status = '$adminsay' WHERE id = '$job_id'");
  header("location:admin.php");
?>
