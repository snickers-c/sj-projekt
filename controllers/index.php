<?php
include_once("components/header.php");

$err = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $messageObject = new Message($db);
  if ($messageObject->createMessage($firstName, $lastName, $email, $message)) {
    header("Location: /#contact");
    exit;
  } else {
    $err = 'Failed to send your message.';
  }
}

require("views/index.view.php");
include_once("components/footer.php");
