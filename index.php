<?php
  include("resources/templates/mainpage/masthead.html");
?>
   <!-- Row section to get auto spaces from left and right of margin -->
    <div class="row">
      <div id="content">
        <!-- Page header lies here for layout -->
<?php     include("resources/templates/mainpage/header.html"); ?>
        <!-- Page header for layout ends here -->

        <!-- top-bar begins here for layout -->
<?php     include("resources/templates/mainpage/navbar.html"); ?>
        <!-- Top bar ends here -->
      </div>
    </div>
        
        <!-- Wrapper collumn large-8 comes after header -->
        <div class="row collapse wrapper">
          <!-- New foundation row inside wrapper for layout -->
            <div class="columns large-9 main-nav">
<?php          include("resources/templates/mainpage/slider.html"); ?>
              <div class="row ">
                <div class="medium-3 columns">
<!-- left bar section -->
<?php             include("resources/templates/mainpage/leftbar.html"); ?>
<!-- left bar section ends -->
                </div>
                <div class="medium-9 columns index">
<?php             include("resources/templates/layout/index.html"); ?>
                </div>
              </div>
            </div>


            <!-- Side nav for layout.Has login and order form for page -->
            <div class="side-nav columns large-3">
<!-- right side bar begins here -->
<?php         include("resources/templates/mainpage/rightbar.html"); ?>
<!-- right side bar ends here -->
            </div>
            <!-- Side nav for layout ends here -->
      <!-- Wrapper form for main page ends here -->
      </div>

    <!-- Footer section for layout begins here -->
<?php         include("resources/templates/mainpage/footer.html"); ?>
          <!-- Footer css ends here -->
<!-- Footer scripts begin here -->
<?php         include("resources/templates/mainpage/footer_scripts.html"); ?>


<!-- Footer scripts end here -->
  </body>
</html>
