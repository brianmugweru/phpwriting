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
<tr>
<td>topic</td>
<td>type</td>
<td>subject</td>
<td>pages</td>
<td>deadline</td>
<td>language</td>
<td>upload date</td>
<td>file upload</td>
<td>Assign job</td>
</tr>

<?php
  if(mysqli_num_rows($sql)>0){
    while($row = mysqli_fetch_assoc($sql)){
?>
<tr>
      <td><?php echo $row["topic"];?></td>
      <td><?php echo $row["type"];?></td>
      <td><?php echo $row["subject"];?></td>
      <td><?php echo $row["pages"];?></td>
      <td><?php echo $row["deadline"];?></td>
      <td><?php echo $row["language"];?></td>
      <td><?php echo $row["upload_date"];?></td>
      <td><?php echo $row["file_uploads"];?></td>
      <td><button class="button" value="upload" data-reveal-id="upload">Upload job</button></td>
<tr>
<?php
    }
  }
?>
</tr>
</table>
<div id="upload" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
<h1><center>upload job done</center></h1>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

