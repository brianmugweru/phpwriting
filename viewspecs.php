<?php
  include("session.php");
  $id = $_GET['job_id'];
  $sql = mysqli_query($db, "SELECT * FROM jobs WHERE id = '$id'");
  if(!$sql){
    echo "could not pick up any data from the database";
  }
  $sql2 = mysqli_query($db, "SELECT username FROM Users WHERE role = 'normal'");
  if(!$sql2){
   echo "could not retrive select data for users".mysqli_error($db);
  }


  if(mysqli_num_rows($sql) > 0){
    if($row = mysqli_fetch_assoc($sql)){
      $id = $row["id"];
      $topic = $row["topic"];
      $type = $row["type"];
      $subject = $row["subject"];
      $level = $row["level"];
      $reference = $row["reference"];
      $style = $row["style"];
      $language = $row["language"];
      $spacing = $row["spacing"];
      $pages = $row["pages"];
      $deadline = $row["deadline"];
      $discount = $row["discount_code"];
      $description = $row["description"];
      $ownership = $row["ownership"];
      $fileuploads = $row["file_uploads"];
    }
  }
?>
<html>
<head>
<title>Job assign</title>
<link type="text/css" href="assets/bower_components/foundation/css/foundation.min.css" rel="stylesheet">
<script src = "assets/bower_components/foundation/js/vendor/jquery.js"></script>
</head>
<body>
  <h1><?php echo $topic ?></h1>
  <button class="button reveal" value="<?php echo $id ?>"  data-reveal-id="assign">Assign job</button>
<div id="assign" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
<h1><center>Assign users</center></h1>
  <form action="assign.php" method="post">
<?php
  if(mysqli_num_rows($sql2) > 0){
    while($row = mysqli_fetch_assoc($sql2)){
      if($row['username'] == $ownership)
        continue;
?>
  <input type="radio" name="username" value="<?php echo $row["username"] ?>" id="<?php echo $row["username"] ?>" required><label for="<?php echo $row["username"] ?>"><?php echo $row["username"] ?></label><br>
<?php
    }
  }
?>
    <input type="hidden" name="job_id" class="jobid">
    <input type="submit" name="submit" value="assign selected user">
  </form>
  <a class="close-reveal-modal" aria-label="Close" href="admin.php">&#215;</a>
</div>
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

</body>
</html>
