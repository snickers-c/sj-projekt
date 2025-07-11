<?php
include_once("components/header.php");

$id = $_GET['id'];
if (empty($id)) {
  header("Location: /#events");
  exit;
}

$order = new Order($db);
$event = new Event($db);
$validIds = $event->getEventIds();

$eventItem = NULL;
foreach ($validIds as $row) {
  if ($row['id_event'] == $id) {
    $eventItem = $event->findEvent($id);
    break;
  }
}

$err = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($order->createOrderEvent($_SESSION['userID'], $id)) {
    header("Location: admin");
    exit;
  } else {
    $err = 'Failed to register event to your account, try again later.';
  }
}

require("views/register-event.view.php");
include_once("components/footer.php");
