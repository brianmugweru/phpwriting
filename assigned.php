<?php
  require("session.php");
  echo "welcome ".$usersession;
  $sql = mysqli_query($db, "SELECT * FROM assign WHERE username = '$usersession' ");
  if(!$sql){
    echo "could not retrieve data". mysqli_error($db);
  }
?>
<html>
<head>
<title>Jobs you get</title>
<link rel="stylesheet" type = "text/css" href = "assets/bower_components/foundation/css/foundation.min.css" >
</head>

<body>
<a href="logout.php">logout</a>
<h3>Jobs you have been assigned by the admin</h3>
<table>
<?php
  if(mysqli_num_rows($sql)>0){
    while($row = mysqli_fetch_assoc($sql)){
      $sql2 = mysqli_query($db, "SELECT * FROM jobs WHERE id = '".$row["job_id"]."'");
        if($row = mysqli_fetch_assoc($sql2)){
?>
<tr>
<td>topic</td>
<td><?php echo $row["topic"];?></td>
</tr>
<tr>
<td>type</td>
<td><?php echo $row["type"];?></td>
</tr>
<tr>
<td>subject</td>
<td><?php echo $row["subject"];?></td>
</tr>
<tr>
<td>pages</td>
<td><?php echo $row["pages"];?></td>
</tr>
<tr>
<td>deadline</td>
<td><?php echo $row["deadline"];?></td>
</tr>
<tr>
<td>language</td>
<td><?php echo $row["language"];?></td>
</tr>
<tr>
<td>upload date</td>
<td><?php echo $row["upload_date"];?></td>
</tr>
<tr>
<td>file upload</td>
<td><table><?php splitstr($row["file_uploads"])?></table></td>
</tr>
<td>upload job</td>
<td><button class="reveal" value="<?php echo $row["id"] ?>" data-reveal-id="upload">Upload job</button></td>
</tr>
<?php
        }
     }
  }
  ?>
</tr>
</table>
<?php
  function splitstr($str){
    $string = explode("|", $str);
    foreach($string as $value){
?>
  <tr><td><a download="<?php echo $value ?>" href="<?php echo $value ?>" target="_blank"><?php echo $value ?></a></td></tr>
<?php
    }
  }
?>
<div id="upload" class="reveal-modal" data-reveal aria-labellebdy="modalTitle" aria-hidden="true" role="dialog">
<h1><center>Upload form</center></h1>
<form action = "uploadwork.php" method = "post" enctype="multipart/form-data">
<label>upload</label>
<input type="file" name="files">
<input type="hidden" name="job_id" class="jobid">
<input type="submit" name="upload" value="submit">
</form>
<p><center>Please submit and wait for reply from admin</center></p>
  <a class="close-reveal-modal" aria-label="Close" href="admin.php">&#215;</a>
</div>
<script src = "assets/bower_components/foundation/js/vendor/jquery.js"></script>
<script>
    $('button').click(function(){
      var text = $(this).val();
      $('.jobid').val(text);
    });
  </script>

<script src = "assets/bower_components/foundation/js/foundation.js"></script>
<script src = "assets/bower_components/foundation/js/foundation/foundation.reveal.js"></script>
<script>
  Foundation.global.namespace = '';
  $(document).foundation();
</script>


