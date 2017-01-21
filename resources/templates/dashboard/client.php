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
<th>topic</th>
<th>type</th>
<th>subject</th>
<th>pages</th>
<th>deadline</th>
<th>language</th>
<th>upload date</th>
<th>pages</th>
<th>order file</th>
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
      <?php if($row['status'] == 'admingood'){?>
        <td><a class="button tiny" href="usercheck.php?job_id=<?php echo $row['id'] ?>">Rate Order</a></td>
      <?php }else if($row["status"] == 'uploaded'){ ?>
        <td><a class="button tiny" href="checkupload.php?job_id=<?php echo $row['id'] ?>">Pay for order</a></td>
      <?php }else{ ?>
      <td><?php echo $row["status"]; ?></td>
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
<?php 
}
?>
