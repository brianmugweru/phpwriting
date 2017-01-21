<?php
  
function dashboard(){
  global $orderstatus,$stgood,$stbad,$userstatus;
  check($orderstatus,$stgood,$stbad,$userstatus);
}
function check($orderstatus,$stgood,$stbad,$usstatus){
  global $db, $checksession;
  $job_id = $_GET["job_id"];
  $sql = mysqli_query($db, "SELECT * FROM jobs WHERE status = '$orderstatus' and user_status = '$usstatus' and id='".$_GET["job_id"]."'");
  if(!$sql){
    echo "could not pick up any data from the database".mysqli_error($db);
  }
  if(mysqli_num_rows($sql)>0){
    if($row = mysqli_fetch_assoc($sql)){
      $title = $row["topic"];
      $type = $row["type"];
      $subject = $row["subject"];
      $style = $row["style"];
      $pages = $row["pages"];
      $uploaddate = $row["upload_date"];
      $status = $row["status"];
      $deadline = $row["deadline"];
      $desc = $row["description"];
      $mainfile = $row["job_file"];
    }
  }
  else{
    die("seriously cant find any rows that relate to that specific query");
  }
?>
<body>
  <h3><?php echo $title ?></h3>
  <div class = "row">
  <div class="medium-5 columns">
  <table>
    <tr>
      <td width=150>order type</td>
      <td width=250><?php echo $type ?></td> 
    </tr>
    <tr>
      <td>Order subject</td>
      <td><?php echo $subject ?></td>
    </tr>
    <tr>
      <td>Order Style</td>
      <td><?php echo $style ?></td>
    </tr>
    <tr>
      <td>Order pages</td>
      <td><?php echo $pages ?></td>
    </tr>
    <tr>
      <td>upload date</td>
      <td><?php echo $uploaddate ?></td>
    </tr>
    <tr>
      <td>deadline</td>
      <td><?php echo $deadline ?></td>
    </tr>
    <tr>
      <td>Status</td>
      <td><?php echo $status ?></td>
    </tr>
  </table>
  </div>
  <div class="medium-7 columns">
  <dl style="list-style-type:none">
    <?php if($row["description"]){ ?>
    <dt><h3>description</h3></dt>
    <dd style="margin-left:30px;"><?php echo $desc ?></dd>
<?php } ?>
    <?php if($row["file_uploads"]){ ?>
    <dt><h3 style="font-size:20px;">File uploads</h3></dt>
    <?php splitstr($row["file_uploads"]);?>
<?php } ?>
  </dl>
      
<?php if(strlen($stgood)>0 and strlen($stbad)>0){ ?>
<div class="callout clearfix">
  <a class="left button" href="academic/jobs/<?php echo $mainfile ?>">Order upload file</a>
</div>
<div class="callout clearfix">
    <button class="button small left reveal" value="<?php echo $job_id ?>"  data-reveal-id="assign">Verify job</button>
</div>
<?php } else{ ?>
  <p><button class="tiny disabled">Paypal</button></p>
<?php }?>
    </div>
  </div>

<div id="assign" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
<h1><center>Verify job done</center></h1>
  <form action="resources/library/verify.php" method="post">
  <input type="radio" name="verify" value="<?php echo $stgood ?>" id="good" required><label for="good">Well done</label>
  <input type="radio" name="verify" value="<?php echo $stbad ?>" id="bad" required><label for="bad">poorly done</label>
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

<?php } ?>
<?php
  function splitstr($str){
    $string = explode("|", $str);
    foreach($string as $value){
?>
  <dd style='margin-left:30px;'><a download="<?php echo $value ?>" href="<?php echo $value ?>" target="_blank"><?php echo $value ?></a></dd>
<?php
    }
  }
?>



