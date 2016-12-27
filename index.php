<html>
  <head>
    <title>academic</title>
    <link href="public_html/bower_components/foundation/css/foundation.min.css" type="text/css" rel="stylesheet" />
    <link href="public_html/bower_components/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
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
          <h4>ACADEMIA ZONE</h4>
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
            <h2>Welcome to academia</h2>
              <ul data-orbit class="images">
                <li>
                  <img src="public_html/img/layout/3.jpg" alt="slide1" />
                </li>
                <li>
                  <img src="public_html/img/layout/2.jpg" alt="slide2" />
                </li>
                <li>
                  <img src="public_html/img/layout/apimage.jpg" alt="slide3" />
                </li>
              </ul>
              <div class="row">
                <div class="medium-3 columns">
                                    <div class="services">
                    <h5>OUR SERVICES</h5>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">Essay Writing</a><br>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">Term Paper Writing</a><br>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">Dissertation Writing</a><br>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">Research paper</a><br>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">CourseWork Writing</a><br>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">Homework Writing</a><br>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">Custom Writing</a><br>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">Editing Writing</a><br>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">Proofreading</a><br>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">Speech Writing</a><br>
 <i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">Custom Writing</a><br>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">Academic Writing</a><br>
                  </div>

              <!-- Order form for users -->
                <div class="order-form">
                  <fieldset>
                    <legend>Order form</legend>
                    <form action="" method="post" enctype="multipart/form-data">
                      <label>Document Topic</label>
                      <input type="text" name="topic" disabled placeholder="My topic">
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
                      <a class="button tiny" href="#" >Get Order Form</a>
                    </form>
                </fieldset>
              </div>
            <!-- Order form ends hers -->

                </div>
                <div class="medium-9 columns">
                  <h5>Home</h5>
                  <h4>Academia Zone</h4>
                  <p>Academic-paper.net is a US based online company that deals with academic and report writing. Our team consists of professionals with an array of knowledge in different fields of study. For the past years we have been able to deliver non-plagiarized quality work to our clientele since your document is worked on from scratch.</p>
                  <p>We employ the best suited writers to attend to your paper giving you a customized paper according to your requirement. We make sure that the paper has been checked for any grammatical errors and plagiarism.</p>
                  <p>For period we have been in this field, our experience has expanded greatly and we have no doubt promising our customers quality work. Choose us for a range of advantages building up to your satisfaction. With Intel-writers.us, it is quality service like never before. Read More</p>
                  <p>Customer satisfaction is our number one objective. We value you and thus offer services worth putting a smile on your face. We are dedicated into making your heavy moments light and it is always our pleasure to ensure that you are satisfied.Read More</p>
                </div>
              </div>
            </div>


            <!-- Side nav for layout.Has login and order form for page -->
            <div class="side-nav columns large-3">

              <!-- Search form acting as layout part -->
              <div class="search">
                <form action="#" method="get" class="search-form">
                  <div class="input-group">
                    <input type="text" placeholder="search..." class="form-control search-input" name="search"/>
                  </div>
                </form>
              </div>
              <!-- Search form ends here -->

              <!-- Order title and image -->
              <div class="order-title">
                <h5>Make your order</h5>
                <div class="order">
                  <img src="public_html/img/layout/quality.jpg">
                </div>
              </div>
              <!-- order title and pic ends here -->

              <!-- Login form as part of layout -->
              <div class="login">
                <fieldset>
                  <legend>Enter Login credentials</legend>
                  <form action="login.php" method="post">
                    <div class="row">
                      <div class="row">
                        <div class="medium-2 columns"><i class="fa fa-user" aria-hidden="true"></i></div>
                        <div class="medium-10 columns"><input type="text" name="username"></div>
                      </div>
                      <div class="row">
                        <div class="medium-2 columns"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
                        <div class="medium-10 columns"><input type="password" name="password"></div>
                      </div>
                      <div class="row">
                        <div class="medium-12 left"><input class="button tiny" type="submit" name="submit" value="login"></div>
                      </div>
                    </div>
                  </form>
                </fieldset>
              </div>
              <!-- Login form ends here -->
          
              <!-- Contact us picture -->
              <div class="contact1">
                <h5>Contact us on</h5>
              </div>

              <div class="contact">
              </div>
              <!-- Contact us picture ends -->
 
              
            </div>
            <!-- Side nav for layout ends here -->


        </div>
      </div>
      <!-- Wrapper form for main page ends here -->
    </div>

    <!-- Footer section for layout begins here -->
    <div class="footer">
      <div class="row">
        <div class="medium-6 columns">
          <h3>Contact Info</h3>
        </div>
        <div class="medium-6 columns">
          <h3>secure payment method</h3>
        </div>
      </div>
      <div class="row">
        <p class="copy">&copy 2016-2017 Academia Zone</p>
      </div>
    </div>
    <!-- Footer css ends here -->

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
