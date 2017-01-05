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
        echo "missing fields:".$field;
      }
    }
    if($missing){
      display($missing);
    }
    else{
      session();
    }
  }
  
  function session(){
    global $db;

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $sql_sess = mysqli_query($db, "SELECT username, password, role FROM Users WHERE username = '$username' "); 
    if(!$sql_sess){
      die("system failure in session creations". mysqli_error($db));
    }
    while($row = mysqli_fetch_array($sql_sess, MYSQLI_ASSOC)){
      $dbpassword = $row["password"];
      $userrole = $row["role"];
    }

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
  function display( $missing, $message=""){
?>
<html>
  <head>
  <title>login form</title>
  </head>
  <body>
  <h1>Enter login credentials</h1>
  <?php if(strlen($message)>0){?>
    <p><?php echo $message ?></p>
  <?php } ?>
  <form action="<?php $_PHP_SELF ?>" method="post">
    username:<input type="text" name="username"><br>
    password:<input type="password" name="password"><br>
    <input type="submit" name="submit" value="login">
  </form>
  </body>
</html>
<?php
  }
?>
