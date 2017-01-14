<?php
  $pagetitle = "All orders";
  $page = "orders";
  $menu = "orders";
  include("portal.php");
  function dashboard(){
    global $db;
    $sql = mysqli_query($db, "SELECT * FROM jobs");
    if(!$sql){
      echo "could not pick up any data from the database";
    }
?>
<table>
<tr>
<th>topic</th>
<th>type</th>
<th>subject</th>
<th>pages</th>
<th>deadline</th>
<th>language</th>
<th>upload date</th>
<th>deadline</th>
<th>client</th>
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
</tr>
<?php
    }
  }
  }
?>
</table>
