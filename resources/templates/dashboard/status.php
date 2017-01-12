<?php
   function dashboard($status){
      global $pagetitle;
      global $db;
  $sql = mysqli_query($db, "SELECT * FROM jobs WHERE status = '$status'");
  if(!$sql){
    echo "could not pick up any data from the database";
  }
?>
  <h3><?php echo $pagetitle ?></h3>
<a href="completed.php">Finished</a>
<a href="repeat.php">adminrejected</a>
<table>
<tr>
<td>topic</td>
<td>type</td>
<td>subject</td>
<td>pages</td>
<td>deadline</td>
<td>language</td>
<td>upload date</td>
<td>deadline</td>
<td>client</td>
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
      <td><?php echo $row["ownership"];?></td>
      <td><?php echo $row["language"];?></td>
      <td><?php echo $row["upload_date"];?></td>
      <td><?php echo $row["deadline"]; ?></td>
      <td><?php echo $row["ownership"]; ?></td>
<?php if($status == "uploaded"){ ?>
      <td><a href="viewspecs.php?job_id=<?php echo $row["id"] ?>" class="button tiny">View job</a></td>
<?php }else if($status =="adminpoor"){ ?>
      <td>Repeat job</td>
<?php }else if($status == "completed"){?>
  <td><a href="admcheck.php?job_id=<?php echo $row["id"] ?>" class="button tiny">check job</a></td>
<?php }else{ ?>
<td>getting nothing</td>
<?php } ?>
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
<?php } ?>
