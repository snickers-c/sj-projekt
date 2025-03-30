<?php

function load_menu(array $pages)
{
  $menuItems = "";

  foreach ($pages as $page_name => $page_url) {
    $menuItems .= "<li class=\"scroll-to-section\"><a href=\"$page_url\">$page_name</a></li>";
  }

  return $menuItems;
}

function add_stylesheets()
{
  $page_name = basename($_SERVER["SCRIPT_NAME"], ".php");
  echo '<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">';
  echo '<link rel="stylesheet" href="assets/css/fontawesome.css">';
  echo '<link rel="stylesheet" href="assets/css/templatemo-scholar.css">';
  echo '<link rel="stylesheet" href="assets/css/animate.css">';
  echo '<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />';

  switch ($page_name) {
    case "index":
      echo '<link rel="stylesheet" href="assets/css/owl.css">';
      break;
    case "thankyou":
      echo '<link rel="stylesheet" href="assets/css/owl.css">';
      break;
  }
}

function add_scripts()
{
  $page_name = basename($_SERVER["SCRIPT_NAME"], ".php");
  echo '<script src="vendor/jquery/jquery.min.js"></script>';
  echo '<script src="vendor/bootstrap/js/bootstrap.min.js"></script>';
  echo '<script src="assets/js/isotope.min.js"></script>';

  switch ($page_name) {
    case "index":
      echo '<script src="assets/js/owl-carousel.js"></script>';
      echo '<script src="assets/js/custom.js"></script>';
      echo '<script src="assets/js/counter.js"></script>';
      break;
    case "thankyou":
      echo '<script src="assets/js/owl-carousel.js"></script>';
      echo '<script src="assets/js/custom.js"></script>';
      echo '<script src="assets/js/counter.js"></script>';
      break;
  }
}