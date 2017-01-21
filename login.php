<?php
  session_start();
  include("resources/config.php");
  include('resources/library/passhash.php');
  $message="";

  if(isset($_POST['submit'])){
    login();
  }else{
    display( array(), $message);
  }
  /*function to validate missing fields from the form */
  function validate($fieldname,$missing){
    if(in_array($fieldname, $missing)){
      echo 'class="error"';
    }
  }

  /*processes form by checking empty field values and prevent mysql injections using strip slashes */
  function login(){
    $required = array('username', 'password');
    $missing = array();
    foreach($required as $field){
      if(!isset($_POST[$field]) or !$_POST[$field]){
        $missing[]=$field;
      }
    }
    if($missing){
      display($missing);
    }
    else{
      session();
    }
  }
  
  /*
   * Function for creating user session after checking for username and password from database
   */
  function session(){
    global $db;

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $sql_sess = mysqli_query($db, "SELECT username, password, role FROM Users WHERE username = '$username' "); 
    if(!$sql_sess){
      die("system failure in session creations". mysqli_error($db));
    }
    if($row = mysqli_fetch_array($sql_sess, MYSQLI_ASSOC)){
      $dbpassword = $row["password"];
      $userrole = $row["role"];

      if(password_verify($password, $dbpassword)){
        $_SESSION["username"] = $username;

        if($userrole =="normal"){
          header("location:landing.php");
        }else if($userrole=="admin"){
          header("location:admin.php");
        }
      }
      else{
        display( array(), $message="Wrong username and password combination, keep trying dear");
      }
    }
    else{
      display(array(), $message="Sorry sweatheart, You do not exist in our database");
    }
  }
/*
 * function for displaying login form incase of wrong password or username situation"
 */
  function display( $missing, $message=""){
  include_once("resources/templates/mainpage/masthead.html");
?>
<html>
  <head>
  <title>login form</title>
  </head>
  <body style="background:#80cbc4">
<?php     include("resources/templates/mainpage/header.html"); ?>
<?php     include("resources/templates/mainpage/navbar.html"); ?>
  <br><h1 style="margin-left:7%;">Login credentials</h1><br>
    <form action="<?php $_PHP_SELF ?>" method="post">
    <div class="row">
      <div class="medium-2 columns"></div>
      <div class="medium-8 columns end">
        <div class="row">
          <div class="medium-2 columns"></div>
          <div class="medium-10 columns end">
            <?php if(strlen($message)>0){?>
              <div data-alert class="alert-box radius alert" style="padding:9px; font-size:15px;"><?php echo $message ?><a href="#" class="close">&times;</a></div>
            <?php } ?>
            <?php if(sizeof($missing)>0){ ?>
            <div data-alert class="alert-box radius alert" style="padding:9px; font-size:15px;">
            <?php foreach($missing as $value){ ?>
                <span><?php echo $value."," ?></span>
            <?php }?>field[s] is required <a href="#" class="close">&times;</a></div>
              <?php } ?>
                      </div>
        </div><br>
        <fieldset>
        <legend>Enter username and password</legend>
        <div class="row">
          <div class="small-12 medium-2 columns">
            <label for="username" class="right inline">username:</label>
          </div> 
          <div class="small-12 medium-10 columns">
            <input type="text" id="username" name="username" placeholder="enter username"></label>
          </div>
        </div>
        <div class="row">
          <div class="small-12 medium-2 columns">
            <label for="password" class="right inline">password:</label>
          </div>
          <div class="small-12 medium-10 columns">
            <input type="password" id="password" name="password" placeholder="enter password"></label>
          </div>
        </div>
        <div class="row">
          <input class="button small right radius" style="margin-right:30px;" type="submit" name="submit" value="login">
        </div>
        </fieldset>
      </div>
    </div>
  </form>
<script type="text/javascript" src="public_html/bower_components/foundation/js/vendor/jquery.js"></script>
    <script src="public_html/bower_components/foundation/js/foundation.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="public_html/bower_components/foundation/js/foundation/foundation.alert.js"></script>
  <script>
      $(document).foundation();
  </script>
  </body>
</html>
<?php
  }
?>
