<?php
function dashboard($userstatus){
  global $check_session, $db;
  $sql = mysqli_query($db, "SELECT * FROM jobs WHERE ownership = '$check_session' and status='$userstatus'");
  if(!$sql){
    echo "could not pick up any data from the database";
  }
  echo $userstatus;
?>
<body>
<table>
<tr>
<td>topic</td>
<td>type</td>
<td>subject</td>
<td>pages</td>
<td>deadline</td>
<td>language</td>
<td>upload date</td>
<td>pages</td>
<td>order file</td>
</tr>
<?php
  if(mysqli_num_rows($sql) > 0){
    while($row = mysqli_fetch_assoc($sql)){
      $status = $row["status"];
?>
<tr>
      <td><?php echo $row["topic"];?></td>
      <td><?php echo $row["type"];?></td>
      <td><?php echo $row["subject"];?></td>
      <td><?php echo $row["pages"];?></td>
      <td><?php echo $row["deadline"];?></td>
      <td><?php echo $row["language"];?></td>
      <td><?php echo $row["upload_date"];?></td>
      <td><?php echo $row["pages"];?></td>
      <td><a href="usercheck.php?job_id=<?php echo $row['id'] ?>">check job</a></td>

      <!--<td><?php echo $row["status"]; ?></td>-->
</tr>
<?php
    }
  }
?>
</table>
<script src = "assets/bower_components/foundation/js/foundation.js"></script>
<script src = "assets/bower_components/foundation/js/foundation/foundation.reveal.js"></script> <script> Foundation.global.namespace = '';
  $(document).foundation();
</script>
<?php 
}
?>
