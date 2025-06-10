<?php
include_once("components/header.php");
?>

<div class="main-banner" id="top">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="owl-carousel owl-banner">
          <div class="item item-1">
            <div class="header-text">
              <span class="category">Our Courses</span>
              <h2>With Scholar Teachers, Everything Is Easier</h2>
              <p>Scholar is free CSS template designed by TemplateMo for online educational related websites. This
                layout is based on the famous Bootstrap v5.3.0 framework.</p>
              <div class="buttons">
                <div class="main-button">
                  <a href="#">Request Demo</a>
                </div>
                <div class="icon-button">
                  <a href="#"><i class="fa fa-play"></i> What's Scholar?</a>
                </div>
              </div>
            </div>
          </div>
          <div class="item item-2">
            <div class="header-text">
              <span class="category">Best Result</span>
              <h2>Get the best result out of your effort</h2>
              <p>You are allowed to use this template for any educational or commercial purpose. You are not allowed to
                re-distribute the template ZIP file on any other website.</p>
              <div class="buttons">
                <div class="main-button">
                  <a href="#">Request Demo</a>
                </div>
                <div class="icon-button">
                  <a href="#"><i class="fa fa-play"></i> What's the best result?</a>
                </div>
              </div>
            </div>
          </div>
          <div class="item item-3">
            <div class="header-text">
              <span class="category">Online Learning</span>
              <h2>Online Learning helps you save the time</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temporious incididunt ut labore
                et dolore magna aliqua suspendisse.</p>
              <div class="buttons">
                <div class="main-button">
                  <a href="#">Request Demo</a>
                </div>
                <div class="icon-button">
                  <a href="#"><i class="fa fa-play"></i> What's Online Course?</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $text = $_POST["message"];

  $arr = array($name, $email, $text);
  $i = 0;
  foreach ($arr as $item) {
    if (empty($item)) {
      echo "<h1>chyba: pole na $i nie je nič.</h1>";
    }
    $i++;
  }

  echo "<h1>Thank you for contacting us $arr[0], we will get in touch with you on your email: $arr[1]</h1>";
  echo "<h1>Your message: $arr[2]</h1>";
}

include_once("components/footer.php");
?>