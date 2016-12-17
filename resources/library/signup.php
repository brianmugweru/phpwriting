<?php
  ob_start();
  session_start();
  require('config.php');
  
  include('passhash.php');
  if(isset($_POST['submit'])){
    process();
  }else{
    display( array() );
  }
  
  /*function to validate missing fields from the form */
  function validate($fieldname,$missing){
    if(in_array($fieldname, $missing)){
      echo 'class="error"';
    }
  }

  /*function to set the and store the field values in their respective field */
  function setvalue( $fieldname ){
    if(isset($_POST[$fieldname])){
      echo $_POST[$fieldname];
    }
  }

  /*function to set withhold selected field value to a form field*/
  function setselected($fieldname, $fieldvalue){
    if(isset($_POST[$fieldname]) and $_POST[$fieldname]==$fieldvalue){
      echo 'selected="selected"';
    }
  }

  /*processes form by checking empty field values and prevent mysql injections using strip slashes */
  function process(){
    $required = array('username', 'fullname', 'email', 'password');
    $missing = array();
    foreach($required as $field){
      if(!isset($_POST[$field]) or !$_POST[$field]){
        $missing[]=$field;
        echo "missing fields:".$field;
      }
    }
    if($missing){
      display($missing);
    }
    else{
      insert();
    }
  }
  function insert(){
    $username = trim($_POST['username']);
    $username = htmlspecialchars($username);

    $fullname = trim($_POST['fullname']);
    $fullname = htmlspecialchars($fullname);

    $email = trim($_POST['email']);
    $email = htmlspecialchars($email);

    $country = $_POST['country'];

    $password = trim($_POST['password']);
    $passhash = hashpass($password);
    global $db;

    $sql_select = mysqli_query($db, "SELECT username FROM Users WHERE username='".$username."'");
    if(!$sql_select){
      echo "could not complete find data query, please contact whoever you want and cry over this little problem";
    }
    if(mysqli_num_rows($sql_select)<1){
      $sql_insert = mysqli_query($db, "INSERT INTO Users(username, fullname, email, country, password) VALUES('$username', '$fullname', '$email', '$country', '$passhash')"); 
      if(!$sql_insert){
        die("There was a problem with signing up your details,call administrator:". mysqli_error($db)); 
      }
      $_SESSION["username"] = $username;

      header("location:landing.php");
    }
    mysqli_close($db);
  }
  function display($missing){
?>
<html>
<head>
<title>sign up</title>
</head>
<body>
<?php if($missing){ ?>
  <p class='error'>Please fill in the form completely</p>
<?php }else{ ?>
  <p>Thanks for accessing this form, fill in all your details</p>
<?php } ?>
<form action="<?php $_SERVER['PHP_SELF'] ?>"  method="post">
  <label <?php validate("username", $missing) ?>>Username:</label><input type="text" name="username" value="<?php setvalue("username") ?>"><br>
  <label <?php validate("fullname", $missing) ?>>Fullname:</label><input type="text" name="fullname" value="<?php setvalue("fullname") ?>"><br>
  <label>Select your Country</label>
  <select name="country"><?php include_once('states.html') ?></select><br>
  <label <?php validate("email", $missing) ?>>email:</label><input type="email" name="email" value="<?php setvalue("email") ?>"><br>
  <label <?php validate("password", $missing) ?>>password:</label><input type="password" name="password" value="<?php setvalue("password") ?>"><br>
  <input type="submit" name="submit" value="sign up">
</form>
</body>
</html>
<?php
  }
?>
