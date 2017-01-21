<?php
  $page = 'dashboard';
  $pagetitle = "solo orders";
  require("portal.php");

  function dashboard(){
    global $db, $check_session;
    $job_id = $_GET["job_id"];
    $sql = mysqli_query($db, "SELECT * FROM jobs WHERE ownership='$check_session' and id='$job_id'");
    if(!$sql){
      echo "could not pick any data from db my dear...".mysqli_error($db);
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
    }else{
      die("seriosly you need to reconfigure youre setup coz it ain't gonn work");
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
        <?php if($row["job_file"]){ ?>
        <dt><h3>Order file</h3></dt>
        <dd style="margin-left:30px;"><a href="<?php echo $mainfile ?>"><?php echo $mainfile ?></a></dd>
    <?php } ?>
      </dl>
</div>
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


