<?php
include_once("components/header.php");

$id = $_GET['id'];

if (($_GET['tab'] ?? '') == "testimonials") {
  $testimonial = new Testimonial($db);

  $current;
  if (isset($id)) {
    $current = $testimonial->findTestimonial($id);
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $occupation = $_POST['occupation'];
    $desc = $_POST['desc'];
    $image = $_POST['image'];
    $active = $_POST['active'];

    if ($testimonial->updateTestimonial($id, $firstName, $lastName, $occupation, $desc, $image, $active)) {
      header('Location: admin.php?tab=testimonials');
      exit;
    } else {
      $err = "Update of data failed";
    }
  }
}

if (($_GET['tab'] ?? '') == "users") {
  $user = new User($db);

  $current;
  if (isset($id)) {
    $current = $user->findUser($id);
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $role = $_POST['role'];
    $email = $_POST['email'];

    if ($user->updateUser($id, $firstName, $lastName, $role, $email)) {
      header('Location: admin.php?tab=users');
      exit;
    } else {
      $err = "Update of data failed";
    }
  }
}

if (($_GET['tab'] ?? '') == "tags") {
  $tag = new Tag($db);

  $current;
  if (isset($id)) {
    $current = $tag->findTag($id);
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];

    if ($tag->updateTag($id, $name)) {
      header('Location: admin.php?tab=tags');
      exit;
    } else {
      $err = "Update of data failed";
    }
  }
}

if (($_GET['tab'] ?? '') == "services") {
  $service = new Service($db);

  $current;
  if (isset($id)) {
    $current = $service->findService($id);
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $buttonLink = $_POST['buttonLink'];
    $image = $_POST['image'];
    $active = $_POST['active'];

    if ($service->updateService($id, $title, $desc, $buttonLink, $image, $active)) {
      header('Location: admin.php?tab=services');
      exit;
    } else {
      $err = "Update of data failed";
    }
  }
}

if (($_GET['tab'] ?? '') == "events") {
  $event = new Event($db);

  $current;
  if (isset($id)) {
    $current = $event->findEvent($id);
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $date = $_POST['date'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $desc = $_POST['desc'];
    $active = $_POST['active'];

    if ($event->updateEvent($id, $title, $category, $date, $duration, $price, $image, $desc, $active)) {
      header('Location: admin.php?tab=events');
      exit;
    } else {
      $err = "Update of data failed";
    }
  }
}

if (($_GET['tab'] ?? '') == "courses") {
  $course = new Course($db);
  $current;

  if (isset($id)) {
    $current = $course->findCourse($id);
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee = $_POST['employee'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $active = $_POST['active'];
    $tags = $_POST['tags'];
    $desc = $_POST['desc'];

    if ($course->updateCourse($id, $employee, $title, $price, $image, $desc, $active, $tags)) {
      header('Location: admin.php?tab=courses');
      exit;
    } else {
      $err = "Update of data failed";
    }
  }
}

if (($_GET['tab'] ?? '') == "employees") {
  $employee = new Employee($db);
  $current;

  if (isset($id)) {
    $current = $employee->findEmployee($id);
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $occupation = $_POST['occupation'];
    $image = $_POST['image'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $linkedIn = $_POST['linkedIn'];

    if ($employee->updateEmployee($id, $firstName, $lastName, $occupation, $image, $facebook, $twitter, $linkedIn)) {
      header('Location: admin.php?tab=employees');
      exit;
    } else {
      $err = "Update of data failed";
    }
  }
}

if (($_GET['tab'] ?? '') == "qnas") {
  $qna = new Qna($db);
  $current;

  if (isset($id)) {
    $current = $qna->findQna($id);
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $active = $_POST['active'];

    if ($qna->updateQna($id, $title, $desc, $active)) {
      header('Location: admin.php?tab=qnas');
      exit;
    } else {
      $err = "Update of data failed";
    }
  }
}

if (($_GET['tab'] ?? '') == "banners") {
  $banner = new Banner($db);
  $current;

  if (isset($id)) {
    $current = $banner->findBanner($id);
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tag = $_POST['tag'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $image = $_POST['image'];
    $buttonLink = $_POST['buttonLink'];
    $active = $_POST['active'];

    if ($banner->updateBanner($id, $tag, $title, $desc, $image, $buttonLink, $active)) {
      header('Location: admin.php?tab=banners');
      exit;
    } else {
      $err = "Update of data failed";
    }
  }
}

if (($_GET['tab'] ?? '') == "dates") {
  $dateObject = new Date($db);

  $current;
  if (isset($id)) {
    $current = $dateObject->findDate($id);
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course = $_POST['course'];
    $date = $_POST['date'];
    $capacity = $_POST['capacity'];

    if ($dateObject->updateDate($id, $course, $date, $capacity)) {
      header('Location: admin.php?tab=dates');
      exit;
    } else {
      $err = "Update of data failed";
    }
  }
}

if (($_GET['tab'] ?? '') == "orders") {
  $order = new Order($db);
  $current;

  if (isset($id)) {
    $current = $order->findOrder($id);
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $paid = $_POST['paid'];

    if ($order->updateOrder($id, $paid)) {
      header('Location: admin.php?tab=orders');
      exit;
    } else {
      $err = "Update of data failed";
    }
  }
}

if (($_GET['tab'] ?? '') == "eventOrders") {
  $order = new Order($db);
  $current;

  if (isset($id)) {
    $current = $order->findOrderEvent($id);
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $paid = $_POST['paid'];

    if ($order->updateOrderEvent($id, $paid)) {
      header('Location: admin.php?tab=eventOrders');
      exit;
    } else {
      $err = "Update of data failed";
    }
  }
}

require("views/admin-update.view.php");
include_once("components/footer.php");
