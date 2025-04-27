<?php
class Menu
{


  private $menuItems;


  public function __construct($menuItems = [])
  {
    if (empty($menuItems)) {
      $menuItems = [
        ['label' => 'Home', 'link' => '#top'],
        ['label' => 'Services', 'link' => '#services'],
        ['label' => 'Courses', 'link' => '#courses'],
        ['label' => 'Team', 'link' => '#team'],
        ['label' => 'Events', 'link' => '#events'],
        ['label' => 'Register Now!', 'link' => '#contact']
      ];
    }

    $this->menuItems = $menuItems;
  }

  public function header()
  {
    $pageName = basename($_SERVER["SCRIPT_NAME"], ".php");
    $header = '<header class="header-area header-sticky';

    if ($pageName != "admin") {
      $header .= '">';
    } else {
      $header .= ' background-header">';
    }

    return $header;
  }

  public function getMenu()
  {
    $result = "";
    foreach ($this->menuItems as $item) {
      $result .= '<li class="scroll-to-section"><a href="' . $item['link'] . '">' . $item['label'] . '</a></li>';
    }
    return $result;
  }

  public function addStylesheets()
  {
    $result = "";
    $pageName = basename($_SERVER["SCRIPT_NAME"], ".php");

    $result .= '<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">';
    $result .= '<link rel="stylesheet" href="assets/css/fontawesome.css">';
    $result .= '<link rel="stylesheet" href="assets/css/templatemo-scholar.css">';
    $result .= '<link rel="stylesheet" href="assets/css/animate.css">';
    $result .= '<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />';

    switch ($pageName) {
      case "index":
        $result .= '<link rel="stylesheet" href="assets/css/owl.css">';
        break;
      case "thankyou":
        $result .= '<link rel="stylesheet" href="assets/css/owl.css">';
        break;
      case "admin":
        $result .= '<link rel="stylesheet" href="assets/css/custom.css">';
        break;
    }

    return $result;
  }

  public function addScripts()
  {
    $result = "";
    $pageName = basename($_SERVER["SCRIPT_NAME"], ".php");

    $result .= '<script src="vendor/jquery/jquery.min.js"></script>';
    $result .= '<script src="vendor/bootstrap/js/bootstrap.min.js"></script>';
    $result .= '<script src="assets/js/isotope.min.js"></script>';

    switch ($pageName) {
      case "index":
        $result .= '<script src="assets/js/owl-carousel.js"></script>';
        $result .= '<script src="assets/js/custom.js"></script>';
        $result .= '<script src="assets/js/counter.js"></script>';
        break;
      case "thankyou":
        $result .= '<script src="assets/js/owl-carousel.js"></script>';
        $result .= '<script src="assets/js/custom.js"></script>';
        $result .= '<script src="assets/js/counter.js"></script>';
        break;
      case "admin":
        $result .= '<script src="assets/js/custom.js"></script>';
        break;
    }

    return $result;
  }
}
