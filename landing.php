<?php
include("portal.php");

function dashboard(){
  if(isset($_POST["submit"])){
    process();
  }else{
    display(array());
  }
}
?>

<?php
  function display($message){
?>
<body>
<a href="failed.php">Repeat job</a><br>
<a href="assigned.php">see assigned jobs</a><br>
<a href="personal.php">view personal jobs</a><br>
<form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
<div class="row">
<div class="medium-6 columns">
<div class="row">
<div class="medium-3 columns">
<label class="right inline" for="topic">Document Topic</label>
</div>
<div class="medium-9 columns">
<input type="text" id="topic" name="topic">
</div>
</div>
<div class="row">
<div class="medium-3 columns">
<label class="right inline"for="type">Document Type</label>
</div>
<div class="medium-9 columns">
<select name="type" id="type"><?php include("resources/templates/orderform/doctype.html") ?></select>
</div>
</div>
<div class="row">
<div class="medium-3 columns">
<label class="right inline"for="subject">Subject Area</label>
</div>
<div class="medium-9 columns">
<select name="subject" id="subject"><?php include("resources/templates/orderform/subject.html") ?></select>
</div>
</div>
<div class="row">
<div class="medium-3 columns">
<label class="right inline"for="level">Academic level</label>
</div>
<div class="medium-9 columns">
<select name="academic" id="level"><?php include("resources/templates/orderform/edulevel.html") ?></select>
</div>
</div>
<div class="row">
<div class="medium-3 columns">
<label class="right inline" for="style">Style</label>
</div>
<div class="medium-9 columns">
<select name="style" id="style"><?php include("resources/templates/orderform/style.html") ?></select>
</div>
</div>
<div class="row">
<div class="medium-3 columns">
<label class="right inline"for="lan">Preferred language</label>
</div>
<div class="medium-9 columns">
<select name="language" id="lan"><?php include("resources/templates/orderform/language.html") ?></select>
</div>
</div>
<div class="row">
<div class="medium-3 columns">
<label for="spacing" class="right inline">Spacing</label>
</div>
<div class="medium-9 columns">
<select name="spacing" id="spacing"><?php include("resources/templates/orderform/spacing.html") ?></select>
</div>
</div>
</div>
<div class="medium-6 columns">
<div class="row">
<div class="medium-3 columns">
<label class="right inline"for="ref">No. of references</label>
</div>
<div class="medium-9 columns">
<input type="number" id="ref" name="ref">
</div>
</div>
<div class="row">
<div class="medium-3 columns">
<label for="pages"class="right inline">No. of pages*</label>
</div>
<div class="medium-9 columns">
<input type="number" id="pages" name="pages" placeholder="value between 1 and 100">
</div>
</div>
<div class="row">
<div class="medium-3 columns">
<label class="right inline" for="deadline">deadline</label>
</div>
<div class="medium-9 columns">
<select name="deadline"><?php include("resources/templates/orderform/deadline.html") ?></select>
</div>
</div>
<div class="row">
<div class="medium-3 columns">
<label class="right inline"for="dis">Enter Special Discount code</label>
</div>
<div class="medium-9 columns">
<input type="text" id="dis" name="discount">
</div>
</div>
<div class="row">
<div class="medium-3 columns">
<label class="right inline"for="desc">Description</label>
</div>
<div class="medium-9 columns">
<textarea name="desc" id="desc" style="resize:none"></textarea>
</div>
</div><br>
<div class="row">
<div class="medium-3 columns">
<label class="right inline"for="upload">upload files</label>
</div>
<div class="medium-9 columns">
<input class="right inline" type="file" id="upload" name="upload[]" multiple >
</div>
</div>
<div class="row">
<input type="hidden" name="username" value="<?php echo $usersession ?>" />
<input type="submit" class="button small right radius" name="submit" value="Submit">
</div>
</div>
</div>
</div>
</form>
<?php
  }
?>
<?php
function process(){
    $required = array('topic','ref','pages');
    $missing = array();
    foreach($required as $field){
      if(!isset($_POST[$field]) or !$_POST[$field]){
        $missing[] = $field;
        echo "missing fields:". $field;
      }
    }
    if($missing){
      display($missing);
    }else{
      insert();
    }
  }
?>
<?php
function upload(){
    $file_path = "files/";
    $max_file_size = 1024*1000;
    $count = 0;
    $output = "";
    $allowed = array('doc', 'pdf','jpg','png','gif','zip','bmp');
      foreach($_FILES["upload"]["name"] as $f => $name){
        $tmp_path = $_FILES["upload"]["tmp_name"][$f];
        $upload_path = $file_path.$_FILES["upload"]["name"][$f];
        if($_FILES["upload"]["error"][$f] == 4){
          return "error in file upload";
          continue;
        }
        if($_FILES["upload"]["error"][$f] ==0){
          if($_FILES["upload"]["size"][$f] > $max_file_size){
            return "$name is too large";
            continue;
          }else if(!in_array(pathinfo($name, PATHINFO_EXTENSION),$allowed)){
            return "$name is not a valid file format";
            continue;
          }else{
            if(move_uploaded_file($_FILES["upload"]["tmp_name"][$f], $upload_path)){
              $output.= $upload_path."|";
            }
          }
        }else{
          return "there happens to be an error in the upload";
        }
      }
    return $output;
  }
?>
<?php
  function validate($fieldname, $missing){
    if(in_array($fieldname, $missing)){
      echo 'class="error"';
    }
  }

  function calculateprice($pages){
    return $pages*10;
  }

  function setvalue($fieldname){
    if(isset($_POST[$fieldname])){
      echo $_POST[$fieldname];
    }
  }
?>

<?php
function insert(){
    global $usersession;
    global $db;
    $topic = trim($_POST["topic"]);
    $type = trim($_POST["type"]);
    $subject = trim($_POST["subject"]);
    $academic = trim($_POST["academic"]);
    $ref = trim($_POST["ref"]);
    $style = trim($_POST["style"]);
    $lan = trim($_POST["language"]);
    $space = trim($_POST["spacing"]);
    $pages = trim($_POST["pages"]);
    $deadline = date("Y-m-d h:i:sa", strtotime(trim($_POST["deadline"])));
    $discount = trim($_POST["discount"]);
    $desc = trim($_POST["desc"]);
    $owner = $usersession;
    $price = calculateprice($pages);

    $uploads = upload();

    echo $uploads;
    $sql = mysqli_query($db, "INSERT INTO jobs(topic, type, subject, level, reference, style, language, spacing, pages, deadline, discount_code, description, ownership,file_uploads, price) VALUES ('$topic', '$type', '$subject', '$academic', '$ref', '$style', '$lan', '$space', '$pages', '$deadline', '$discount', '$desc', '$owner', '$uploads','$price' )");
    if(!$sql){
      echo "Could not insert data ".mysqli_error($db);
    }
    header("location:personal.php");
}
?>
