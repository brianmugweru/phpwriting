<html>
  <head>
    <title>academic</title>
    <link href="public_html/bower_components/foundation/css/foundation.min.css" type="text/css" rel="stylesheet" />
    <link href="public_html/bower_components/foundation/css/normalize.min.css" type="text/css" rel="stylesheet" />
    <link href="public_html/css/mainpage.css" type="text/css" rel="stylesheet" />
    <script src="public_html/bower_components/modernizr/modernizr.js"></script>
  </head>
  <body>
    <!-- Row section to get auto spaces from left and right of margin -->
    <div class="row">
      <div id="content">
        <!-- Page header lies here for layout -->
        <div id="header">
          <h4>Welcome to our site</h4>
        </div>
        <!-- Page header for layout ends here -->

        <!-- top-bar begins here for layout -->
        <nav role="navigation" class="top-bar" data-topbar>
          <ul class="title-area">
            <li class="toggle-topbar menu-icon">
              <a href="#">
                <span>menu</span>
              </a>
            </li>
          </ul>
          <section class="top-bar-section">
            <ul class="left">
              <li class="active item-1">
                <a href="index.php">HOME</a>
              </li>
              <li class="active item-2">
                <a href="#">ABOUT US</a>
              </li>
              <li class="active item-3">
                <a href="#">OUR SERVICES</a>
              </li>
              <li class="active item-4">
                <a href="#">ORDER NOW</a>
              </li>
              <li class="active item-5">
                <a href="#">WHY US</a>
              </li>
              <li class="active item-6">
                <a href="#">CONTACT US</a>
              </li>
            </ul>
          </section>
        </nav>
        <!-- Top bar ends here -->
        
        <!-- Wrapper collumn large-8 comes after header -->
        <div class="wrapper">
          <!-- New foundation row inside wrapper for layout -->
          <div class="row collapse">
            <div class="columns large-9 main-nav">
            <h1>Welcome to academia</h1>
              <ul data-orbit class="images">
                <li>
                  <img src="" alt="slide1" />
                  <div class="orbit-caption">caption-1</div>
                </li>
                <li>
                  <img src="" alt="slide2" />
                  <div class="orbit-caption">caption-2</div>
                </li>
                <li>
                  <img src="" alt="slide3" />
                  <div class="orbit-caption">caption-3</div>
                </li>
              </ul>
            </div>


            <!-- Side nav for layout.Has login and order form for page -->
            <div class="side-nav columns large-3">
              <!-- Login form as part of layout -->
              <div class="login">
                <fieldset>
                  <legend>Enter Login credentials</legend>
                  <form action="login.php" method="post">
                    <div class="row">
                      <div class="row">
                        <div class="medium-3 columns">username:</div>
                        <div class="medium-9 columns"><input type="text" name="username"></div>
                      </div>
                      <div class="row">
                        <div class="medium-3 columns">password:</div>
                        <div class="medium-9 columns"><input type="password" name="password"></div>
                      </div>
                      <div class="row">
                        <div class="medium-12 left"><input type="submit" name="submit" value="login"></div>
                      </div>
                    </div>
                  </form>
                </fieldset>
              </div>
              <!-- Login form ends here -->
          
              <!-- Order form for users -->
                <div class="order-form">
                  <fieldset>
                    <legend>Order form</legend>
                    <form action="" method="post" enctype="multipart/form-data">
                      <label>Document Topic</label>
                      <input type="text" name="topic">
                      <label>Document Type</label>
                      <select name="type"><?php include("doctype.html") ?></select>
                      <label>Subject Area</label>
                      <select name="subject"><?php include("subject.html") ?></select>
                      <label>Academic level</label>
                      <select name="academic"><?php include("edulevel.html") ?></select>
                      <label>Number of references</label>
                      <input type="number" name="ref">
                      <label>Style</label>
                      <select name="style"><?php include("style.html") ?></select>
                      <label>Preferred language</label>
                      <select name="language"><?php include("language.html") ?></select>
                      <label>Spacing</label>
                      <select name="spacing"><?php include("spacing.html") ?></select>
                      <label>Number of pages(1 page(s)/275 Words)*</label>
                      <input type="number" name="pages">
                      <span style="font-size:13px;">please enter a value of between 1 and 100</span>
                      <label>deadline</label>
                      <select name="deadline"><?php include("deadline.html") ?></select>
                      <label>Enter Special Discount code</label>
                      <input type="text" name="discount">
                      <label>Description</label>
                      <textarea name="desc" style="resize:none"></textarea>
                      <label>upload files</label>
                      <input type="file" name="upload[]" multiple >
                      <input type="hidden" name="username" value="<?php echo $usersession ?>" />
                      <input type="submit" name="submit" value="Submit">
                    </form>
                </fieldset>
              </div>
            <!-- Order form ends hers -->

            </div>
            <!-- Side nav for layout ends here -->


        </div>
      </div>
      <!-- Wrapper form for main page ends here -->


    </div>
  </div>


    <script src="public_html/bower_components/foundation/js/vendor/jquery.js" type="text/javascript"></script>
    <script src="public_html/bower_components/foundation/js/foundation.min.js" type="text/javascript"></script>
    <script src="public_html/bower_components/foundation/js/foundation/foundation.topbar.js" type="text/javascript"></script>
    <script src="public_html/bower_components/foundation/js/foundation/foundation.orbit.js" type="text/javascript"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
