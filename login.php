<?php
include_once("components/header.php");
$auth = new Authenticate($db);

if ($auth->isLoggedIn()) {
  header("Location: admin.php");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if ($auth->login($email, $password)) {
    header("Location: admin.php");
    exit;
  } else {
    $err = "Login failed!";
  }
}

require("views/login.view.php");
include_once("components/footer.php");
