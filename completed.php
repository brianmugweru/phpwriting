<?php
  require("session.php");
  $sql = mysqli_query($db, "SELECT * FROM jobs WHERE status = 'completed'");
  if(!$sql) die("Could not retrieve data from database". mysqli_query($db));
?>
<html>
<head>
<title>completed</title>
<link rel="stylesheet" type="text/css" href="assets/bower_components/foundation/css/foundation.min.css" >
</head>
<body>
<a href="logout.php">logout</a>
<h3>Jobs completed by users</h3>
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
<td>check job</td>
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
  <td><?php echo $row["ownership"];?></td>
  <td><?php echo $row["language"];?></td>
  <td><?php echo $row["upload_date"];?></td>
  <td><?php echo $row["file_uploads"];?></td>
  <td><a href="check.php?job_id=<?php echo $row["id"] ?>" class="button">check job</a></td>
<tr>
<?php
    }
  }
?>
</table>

<script src = "assets/bower_components/foundation/js/foundation.js"></script>
<script src = "assets/bower_components/foundation/js/foundation/foundation.reveal.js"></script>
<script>
  Foundation.global.namespace = '';
  $(document).foundation();
</script>
</body>
</html>
