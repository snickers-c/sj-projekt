<?php
include_once("components/header.php");

$id = $_GET['id'];
if (empty($id)) {
  header("Location: /#courses");
  exit;
}

$course = new Course($db);
$validIds = $course->getCourseIds();

$courseItem = NULL;
foreach ($validIds as $row) {
  if ($row['id_course'] == $id) {
    $courseItem = $course->findCourse($id);
    break;
  }
}

$err = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $date = $_POST['date'];

  $order = new Order($db);
  if ($order->createOrder($_SESSION['userID'], $date)) {
    header("Location: admin?tab=myCourses");
    exit;
  } else {
    $err = 'Failed to register course to your account, try again later.';
  }
}

require("views/register-course.view.php");
include_once("components/footer.php");
