<?php
  include("portal.php");
  function dashboard(){
  $id = $_GET['job_id'];
    global $db;
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
      $desc = $row["description"];
      $ownership = $row["ownership"];
      $status = $row["status"];
      $fileuploads = $row["file_uploads"];
      $price = $row["price"];
    }
  }
?>
  <div class="row">
  <div class="medium-6 column">
    <h3><?php echo $topic ?> </h3>
  </div>
  <div class="medium-6 column">
    <button class="button small reveal right" value="<?php echo $id ?>"  data-reveal-id="assign">Assign job</button>
  </div>
  </div>
  <div class="row">
    <div class="small-12 medium-12 columns">
    <table>
      <tr>
        <td width=150>id</td>
        <td width=150 style="border-right:1px solid teal;"><?php echo $id ?></td>
        <td width=150>reference</td>
        <td><?php echo $reference ?></td>
      </tr>
      <tr>
        <td>topic</td>
        <td style="border-right:1px solid teal;"><?php echo $topic ?></td>
        <td>style</td>
        <td><?php echo $style ?></td>
      </tr>
      <tr>
        <td>type</td>
        <td style="border-right:1px solid teal;"><?php echo $type ?></td>
        <td>level</td>
        <td><?php echo $level ?></td>
      </tr>
       <tr>
        <td>language</td>
        <td style="border-right:1px solid teal;"><?php echo $language ?></td>
        <td>pages</td>
        <td><?php echo $pages ?></td>
      </tr>
      <tr>
        <td>price</td>
        <td style="border-right:1px solid teal;"><?php echo $price ?></td>
        <td>Description</td>
        <td><?php echo $desc ?></td>
      </tr>
      <tr>
        <td>status</td>
        <td style="border-right:1px solid teal;"><?php echo $status ?></td>
        <td>file uploads</td>
        <td><?php echo $fileuploads ?></td>
      </tr>
    </table>
  </div>
  </div>
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

<?php
  }
?>
