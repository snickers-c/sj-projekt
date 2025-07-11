<?php
class Menu
{

  private $menuItems;


  public function __construct($menuItems = [])
  {
    if (empty($menuItems)) {
      $db = new Database();
      $auth = new Authenticate($db);

      $menuItems = [
        ['label' => 'Home', 'link' => '/#top'],
        ['label' => 'Services', 'link' => '/#services'],
        ['label' => 'Courses', 'link' => '/#courses'],
        ['label' => 'Team', 'link' => '/#team'],
        ['label' => 'Events', 'link' => '/#events'],
        ['label' => 'Contact us', 'link' => '/#contact']
      ];

      if ($auth->isLoggedIn()) {
        $menuItems[] = ['label' => 'Admin', 'link' => 'admin'];
      } else {
        $menuItems[] = ['label' => 'Log in', 'link' => 'login'];
        $menuItems[] = ['label' => 'Sign up', 'link' => 'signup'];
      }
    }

    $this->menuItems = $menuItems;
  }

  public function header()
  {
    $pageName = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $header = '<header class="header-area header-sticky';

    if ($pageName == "/") {
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

  public function getTabs($active)
  {
    $result = "";
    foreach ($this->menuItems as $tab) {
      $result .= '<a class="nav-link ' . (($active == $tab['link']) ? 'active' : '')  . '" aria-current="page" href="?tab=' . $tab['link'] . '">' . $tab['label'] . '</a>';
    }
    return $result;
  }

  public function addStylesheets()
  {
    $result = "";
    $pageName = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $result .= '<link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">';
    $result .= '<link rel="stylesheet" href="/assets/css/fontawesome.css">';
    $result .= '<link rel="stylesheet" href="/assets/css/templatemo-scholar.css">';
    $result .= '<link rel="stylesheet" href="/assets/css/animate.css">';
    $result .= '<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />';

    switch ($pageName) {
      case "/":
        $result .= '<link rel="stylesheet" href="/assets/css/owl.css">';
        break;
      case "/thankyou":
        $result .= '<link rel="stylesheet" href="/assets/css/owl.css">';
        break;
        // case "admin":
        // case "admin-create":
        //   $result .= '<link rel="stylesheet" href="assets/css/custom.css">';
        //   break;
    }

    return $result;
  }

  public function addScripts()
  {
    $result = "";
    $pageName = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $result .= '<script src="/vendor/jquery/jquery.min.js"></script>';
    $result .= '<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>';
    $result .= '<script src="/assets/js/isotope.min.js"></script>';

    switch ($pageName) {
      case "/":
        $result .= '<script src="/assets/js/owl-carousel.js"></script>';
        $result .= '<script src="/assets/js/counter.js"></script>';
        break;
      case "/thankyou":
        $result .= '<script src="/assets/js/owl-carousel.js"></script>';
        $result .= '<script src="/assets/js/counter.js"></script>';
        break;
    }
    $result .= '<script src="/assets/js/custom.js"></script>';

    return $result;
  }
}
