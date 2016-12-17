<?php
  require("session.php");
  $sql = mysqli_query($db, "SELECT jobs.*, assign.* FROM `jobs`,`assign` WHERE jobs.status='adminpoor' AND assign.username = '".$check_session."'");
  $data = mysqli_Fetch_assoc($sql);
  
?>
<html>
<head>
<title>Job assign</title>
<link type="text/css" href="assets/bower_components/foundation/css/foundation.min.css" rel="stylesheet">
<script src = "assets/bower_components/foundation/js/vendor/jquery.js"></script>
</head>
<body>
  <h1><?php echo $data['topic']; ?></h1>
  <button class="button reveal" value="<?php echo $data["id"] ?>"  data-reveal-id="assign">update job</button>
<div id="assign" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
<h1><center>Assign users</center></h1>
  <form action="uploadwork.php" method="post" enctype="multipart/form-data">
    <input type="file" name="files" >
    <input type="hidden" name="job_id" class="jobid">
    <input type="submit" name="upload" value="update job you messed up">
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
