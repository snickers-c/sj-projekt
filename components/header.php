<?php
require_once("_inc/functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <title>Scholar - Online School HTML5 Template</title>

  <!-- Bootstrap core CSS -->
  <!-- Additional CSS Files -->
  <?php
  add_stylesheets();
  ?>
  <!--

TemplateMo 586 Scholar

https://templatemo.com/tm-586-scholar

-->
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.php" class="logo">
              <h1>Scholar</h1>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Serach Start ***** -->
            <div class="search-input">
              <form id="search" action="#">
                <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword"
                  onkeypress="handle" />
                <i class="fa fa-search"></i>
              </form>
            </div>
            <!-- ***** Serach Start ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <?php
              $pages = array(
                "Home" => "#top",
                "Services" => "#services",
                "Courses" => "#courses",
                "Team" => "#team",
                "Events" => "#events",
                "Register Now!" => "#contact"
              );
              echo load_menu($pages);
              ?>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->