<?php
  include("session.php");
  $sql = mysqli_query($db, "SELECT * FROM jobs WHERE status = 'uploaded'");
  if(!$sql){
    echo "could not pick up any data from the database";
  }
?>
<html>
<head>
<title>view jobs</title>
<link type="text/css" href="assets/bower_components/foundation/css/foundation.min.css" rel="stylesheet">
<script src = "assets/bower_components/foundation/js/vendor/jquery.js"></script>
</head>
<body>
<h1>jobs in the database</h1>
<a href="logout.php">logout</a>
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
  if(mysqli_num_rows($sql) > 0){
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
      <td><a href="viewspecs.php?job_id=<?php echo $row["id"] ?>" class="button">Assign job</a></td>
<tr>
<?php
    }
  }
?>
</tr>
</table>
<script src = "assets/bower_components/foundation/js/foundation.js"></script>
<script src = "assets/bower_components/foundation/js/foundation/foundation.reveal.js"></script>
<script>
  Foundation.global.namespace = '';
  $(document).foundation();
</script>
</body>
</html>
