<?php
include_once("components/header.php");
$auth = new Authenticate($db);

if ($auth->isLoggedIn()) {
  header("Location: admin.php");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $role = 1;
  $email = $_POST['email'];
  $password = $_POST['password'];
  $repeatPassword = $_POST['repeatPassword'];

  $userCreated = false;
  $userLogged = false;
  if ($password == $repeatPassword) {
    $user = new User($db);
    $userCreated = $user->createUser($firstName, $lastName, $role, $email, $password);
  } else {
    $err = "Password is not equal!";
  }

  if ($userCreated) {
    $userLogged = $auth->login($email, $password);
  } else {
    $err = $err ?? "Sign up failed!";
  }

  if ($userLogged) {
    header("Location: admin.php");
    exit;
  } else {
    $err = $err ?? "Login failed!";
  }
}

require("views/signup.view.php");
include_once("components/footer.php");
