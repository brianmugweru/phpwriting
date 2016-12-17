<?php
  include("session.php");
  $job_id = $_GET["job_id"];
  $sql = mysqli_query($db, "SELECT * FROM jobs WHERE status = 'completed' and id='$job_id'");
  if(!$sql){
    echo "could not pick up any data from the database".mysqli_error($db);
  }
  if(mysqli_num_rows($sql)>0){
    if($row = mysqli_fetch_assoc($sql)){
      $id = $row["id"];
      $topic = $row["topic"];
      $description = $row["description"];
      $ownership = $row["ownership"];
      $type = $row["type"];
      $description = $row["description"];
      $mainfile = $row["job_file"]; 
    }
  }
?>
<html>
<head>
<title>Job assign</title>
<link type="text/css" href="assets/bower_components/foundation/css/foundation.min.css" rel="stylesheet">
<script src = "assets/bower_components/foundation/js/vendor/jquery.js"></script>
<body>
  <h1><?php echo $topic ?></h1>
  <a href="<?php echo $mainfile ?>">Job upload</a>
  <button class="button reveal" value="<?php echo $id ?>"  data-reveal-id="assign">Verify job</button>

<div id="assign" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
<h1><center>Verify job done</center></h1>
  <form action="verify.php" method="post">
  <input type="radio" name="verify" value="admingood" id="good" required><label for="good">Well done</label>
  <input type="radio" name="verify" value="adminpoor" id="bad" required><label for="bad">poorly done</label>
  <input type="hidden" name="job_id" class="jobid">
  <input type="submit" name="submit" value="submit">
  </form>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
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
