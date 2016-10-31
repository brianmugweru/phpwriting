<?php
  require("config.php");
  $username = $_POST["username"];
  $job_id = $_POST["job_id"];
  $sql = mysqli_query($db, "INSERT INTO assign(username, job_id) VALUES('$username','$job_id')");
  if(!$sql)
    echo "sorry could not insert data into db table:".mysqli_error($db);
  else{
    $sql2 = mysqli_query($db, "UPDATE jobs SET status = 'assigned' WHERE id = '$job_id' ");
    if(!$sql2){
      echo "Could not update data to the jobs table";
    }
    header('location:admin.php');
  }
?>
