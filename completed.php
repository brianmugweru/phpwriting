<?php
  $menu = "orders";
  $page = "orders";
  $definestatus = 'completed';
  $pagetitle = "completed orders";
  include("resources/templates/dashboard/status.php");
  include("portal.php");
?>
<!--
  NEED TO CONFIGURE THIS TABLE PART TO READ CHECK.PHP FROM STATUS.PHP FILE FOR PROPER PROCESSING OF THE APPLICATION VARIABLES SINCE THERE IS REUSE OF CODE AND TEMPLATES 
  <td><a href="check.php?job_id=<?php echo $row["id"] ?>" class="button">check job</a></td>
   --> 
