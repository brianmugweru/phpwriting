<?php
   function dashboard($status){
      global $db;
  $sql = mysqli_query($db, "SELECT * FROM jobs WHERE status = '".$status."'");
  if(!$sql){
    echo "could not pick up any data from the database";
  }
?>
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
<td>properties</td>
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
<?php }else if($status =="assigned"){ ?>
<td><a href="properties.php?job_id=<?php echo $row["id"] ?>">check ppts</a></td>
<?php }else{ ?>
<td>nothing bro</td>
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
