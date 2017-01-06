<!-- Master head for dashboard -->
<?php include("resources/templates/dashboard/masthead.html"); ?>
<!-- Master head for dashboard ends here -->

  <!-- Header for dashboard with topbar -->
<?php require("resources/templates/dashboard/navbar.html"); ?>
  <!-- Header for dashboard ends here -->
<!-- Dashboard for layout -->
<?php require("resources/templates/dashboard/dash.html"); ?>
<!-- Dashboard ends for layout -->
<!-- Dashboard footer begins -->
<?php require("resources/templates/dashboard/footer_scripts.html"); ?>
<!-- Dashboard footer ends here -->
<?php function dashboard(){
  echo "welcome";
}
?>
