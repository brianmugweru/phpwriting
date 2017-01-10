<?php
require("../config.php");
if(isset($_POST["upload"]) && !empty($_FILES["files"])){
  if(!empty($_POST["job_id"])){
    upload();
  }
  else{
    echo "stop messing up with my code dude, chill please";
  }
}
else{
  echo "No file set to the lot to update";
}
    
function upload(){
  $file_path = "../../jobs/";
  $max_file_size = 1024*10000;
  $output = "";
  $name = $_FILES["files"]["name"];
  $allowed = array('doc', 'pdf','jpg','png','gif','zip','bmp');
  $tmp_path = $_FILES["files"]["tmp_name"];
  $upload_path = $file_path.basename($_FILES["files"]["name"]);
  if($_FILES["files"]["error"] == 4){
    return "error in file upload";
  }
  if($_FILES["files"]["error"] ==0){
    if($_FILES["files"]["size"] > $max_file_size){
      return "$name is too large";
    }else if(!in_array(pathinfo($name, PATHINFO_EXTENSION),$allowed)){
      echo "$name is not a valid file format";
    }else{
      if(move_uploaded_file($tmp_path, $upload_path)){
        dataupdate($upload_path);
      }
    }
  }else{
    return "there happens to be an error in the upload";
  }
}


function dataupdate($string){
  global $db;
  $job_id = $_POST['job_id'];
  $sql = mysqli_query($db,"UPDATE jobs SET job_file='$string', status='completed' where id='$job_id'");
  if(!$sql) return("could not update data in database ".mysqli_error($db));
  else
    header('location:landing.php');
}

