<?php
  include("session.php");
  echo "welcome ".$usersession;
  if(isset($_POST["submit"])){
    process();
  }else{
    display(array());
  }
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
    $deadline = trim($_POST["deadline"]);
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
    echo $topic . "<br> " . $type."<br> ".$subject."<br> ".$academic."<br> ".$ref."<br> ".$style."<br> ".$lan."<br> ".$space."<br> ".$pages."<br> ".$deadline."<br> ".$discount."<br> ".$desc."<br> ". " <br>". "THE END DUDE<br>";
  }
  function display($message){
?>
<html>
<head>
<title>job details</title>
</head>
<body>
<br><a href="logout.php">sign out</a><br>
<a href="failed.php">Repeat job</a><br>
<a href="assigned.php">see assigned jobs</a><br>
<a href="personal.php">view personal jobs</a><br>
<h1>Fill the form fields completely</h1>
<form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
<label>Document Topic</label><br>
<input type="text" name="topic"><br>
<label>Document Type</label><br>
<select name="type"><?php include("doctype.html") ?></select><br>
<label>Subject Area</label><br>
<select name="subject"><?php include("subject.html") ?></select><br>
<label>Academic level</label><br>
<select name="academic"><?php include("edulevel.html") ?></select><br>
<label>Number of references</label><br>
<input type="number" name="ref"><br>
<label>Style</label><br>
<select name="style"><?php include("style.html") ?></select><br>
<label>Preferred language</label><br>
<select name="language"><?php include("language.html") ?></select><br>
<label>Spacing</label><br>
<select name="spacing"><?php include("spacing.html") ?></select><br>
<label>Number of pages(1 page(s)/275 Words)*</label><br>
<input type="number" name="pages"><br>
<p>please enter a value of between 1 and 100</p>
<label>deadline</label><br>
<select name="deadline"><?php include("deadline.html") ?></select><br>
<label>Enter Special Discount code</label><br>
<input type="text" name="discount"><br>
<label>Description</label><br>
<textarea name="desc" style="resize:none"></textarea><br>
<label>upload files</label>
<input type="file" name="upload[]" multiple ><br>
<input type="hidden" name="username" value="<?php echo $usersession ?>" />
<input type="submit" name="submit" value="Submit">
<?php
  }
?>
