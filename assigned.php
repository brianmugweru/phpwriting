<?php
  include("portal.php");
function dashboard(){
  global $db, $usersession;
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
<h3>order assigned</h3>
<div class="row">
<div class="medium-6 columns">
<table>
<?php
  if(mysqli_num_rows($sql)>0){
    while($row = mysqli_fetch_assoc($sql)){
      $sql2 = mysqli_query($db, "SELECT * FROM jobs WHERE id = '".$row["job_id"]."' AND status='assigned'");
        if($row = mysqli_fetch_assoc($sql2)){
?>
<tr>
<td width=190>topic</td>
<td width=190><?php echo $row["topic"];?></td>
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
<td>upload job</td>
<td><button class="reveal" value="<?php echo $row["id"] ?>" data-reveal-id="upload">Upload job</button></td>
</tr>
</tr>
</table>
</div>
<div class="medium-6 columns">
<dl>
  <dt class="left">Description</dt><br>
  <dd class="left"><?php echo $row["description"] ?></dd>
  <dt class="left">File Uploads</dt><br>
  <br><?php splitstr($row["file_uploads"]) ?>
</dl>
</div>
</div>
<?php
        }
     }
  }
  ?>

<div id="upload" class="reveal-modal small" data-reveal aria-labellebdy="modalTitle" aria-hidden="true" role="dialog">
<h1><center>Upload Order</center></h1>
<form action = "resources/library/uploadwork.php" method = "post" enctype="multipart/form-data">
<input type="file" name="files">
<input type="hidden" name="job_id" class="jobid">
<input type="submit" name="upload" class="button small radius" value="submit">
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
<?php } ?>
<?php
  function splitstr($str){
    $string = explode("|", $str);
    foreach($string as $value){
?>
  <br><dd class="left"><a download="<?php echo $value ?>" href="<?php echo $value ?>" target="_blank"><?php echo $value ?></a></dd>
<?php
    }
  }
?>


