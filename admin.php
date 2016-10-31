<?php
  include("session.php");
  $sql = mysqli_query($db, "SELECT * FROM jobs WHERE status = 'uploaded'");
  if(!$sql){
    echo "could not pick up any data from the database";
  }
  $sql2 = mysqli_query($db, "SELECT username FROM Users WHERE role = 'normal'");
  if(!$sql2){
    echo "could not retrive select data for users".mysqli_error($db);
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
      <td><button class="button" value="<?php echo $row['ownership']." ".$row['id'] ?>" data-reveal-id="assign">Assign job</button></td>
<tr>
<?php
    }
  }
?>
</tr>
</table>
<div id="assign" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
<h1><center>Assign users</center></h1>
  <form action="assign.php" method="post">
<?php
  if(mysqli_num_rows($sql2) > 0){
    while($row = mysqli_fetch_assoc($sql2)){
?>
  <input type="radio" name="username" value="<?php echo $row["username"] ?>" id="<?php echo $row["username"] ?>" required><label for="<?php echo $row["username"] ?>"><?php echo $row["username"] ?></label><br>
<?php
    }
  }
?>
    <input type="hidden" name="job_id" class="jobid">
    <input type="submit" name="submit" value="assign selected user">
  </form>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('button').click(function() {
      var id = $(this).val(); 
      var split = id.split(" ", 2);
      console.log("button clicked:"+split[1]);
      var owner = split[0];
      $(".jobid").val(split[1]);
      $("#owner").html(split[0]);
    });
  });
</script>

<script src = "assets/bower_components/foundation/js/foundation.js"></script>
<script src = "assets/bower_components/foundation/js/foundation/foundation.reveal.js"></script>
<script>
  Foundation.global.namespace = '';
  $(document).foundation();
</script>
</body>
</html>
