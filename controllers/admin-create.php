<?php
include_once("components/header.php");

$err = false;
if (($_GET['tab'] ?? '') == "testimonials") {
  $testimonial = new Testimonial($db);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $occupation = $_POST['occupation'];
    $desc = $_POST['desc'];
    $image = $_POST['image'];
    $active = $_POST['active'];

    if ($testimonial->createTestimonial($_SESSION['userID'], $firstName, $lastName, $occupation, $desc, $image, $active)) {
      header('Location: admin?tab=testimonials');
      exit;
    } else {
      $err = "Inserting failed";
    }
  }
}

if (($_GET['tab'] ?? '') == "users") {
  $user = new User($db);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($user->createUser($firstName, $lastName, $role, $email, $password)) {
      header('Location: admin?tab=users');
      exit;
    } else {
      $err = "Inserting failed";
    }
  }
}

if (($_GET['tab'] ?? '') == "tags") {
  $tag = new Tag($db);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];

    if ($tag->createTag($name)) {
      header('Location: admin?tab=tags');
      exit;
    } else {
      $err = "Inserting failed";
    }
  }
}

if (($_GET['tab'] ?? '') == "services") {
  $service = new Service($db);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $buttonLink = $_POST['buttonLink'];
    $image = $_POST['image'];
    $active = $_POST['active'];

    if ($service->createService($_SESSION['userID'], $title, $desc, $buttonLink, $image, $active)) {
      header('Location: admin?tab=services');
      exit;
    } else {
      $err = "Inserting failed";
    }
  }
}

if (($_GET['tab'] ?? '') == "events") {
  $event = new Event($db);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $date = $_POST['date'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $desc = $_POST['desc'];
    $active = $_POST['active'];

    if ($event->createEvent($_SESSION['userID'], $title, $category, $date, $duration, $price, $image, $desc, $active)) {
      header('Location: admin?tab=events');
      exit;
    } else {
      $err = "Inserting failed";
    }
  }
}

if (($_GET['tab'] ?? '') == "courses") {
  $course = new Course($db);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee = $_POST['employee'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $active = $_POST['active'];
    $tags = $_POST['tags'];
    $desc = $_POST['desc'];

    if ($course->createCourse($_SESSION['userID'], $employee, $title, $price, $image, $active, $desc, $tags)) {
      header('Location: admin?tab=courses');
      exit;
    } else {
      $err = "Inserting failed";
    }
  }
}

if (($_GET['tab'] ?? '') == "employees") {
  $employee = new Employee($db);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $occupation = $_POST['occupation'];
    $image = $_POST['image'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $linkedIn = $_POST['linkedIn'];

    if ($employee->createEmployee($firstName, $lastName, $occupation, $image, $facebook, $twitter, $linkedIn)) {
      header('Location: admin?tab=employees');
      exit;
    } else {
      $err = "Inserting failed";
    }
  }
}

if (($_GET['tab'] ?? '') == "qnas") {
  $qna = new Qna($db);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $active = $_POST['active'];

    if ($qna->createQna($_SESSION['userID'], $title, $desc, $active)) {
      header('Location: admin?tab=qnas');
      exit;
    } else {
      $err = "Inserting failed";
    }
  }
}

if (($_GET['tab'] ?? '') == "banners") {
  $banner = new Banner($db);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tag = $_POST['tag'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $image = $_POST['image'];
    $buttonLink = $_POST['buttonLink'];
    $active = $_POST['active'];

    if ($banner->createBanner($_SESSION['userID'], $tag, $title, $desc, $image, $buttonLink, $active)) {
      header('Location: admin?tab=banners');
      exit;
    } else {
      $err = "Inserting failed";
    }
  }
}

if (($_GET['tab'] ?? '') == "dates") {
  $dateObject = new Date($db);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course = $_POST['course'];
    $date = $_POST['date'];
    $capacity = $_POST['capacity'];

    if ($dateObject->createDate($course, $date, $capacity)) {
      header('Location: admin?tab=dates');
      exit;
    } else {
      $err = "Inserting failed";
    }
  }
}

require("views/admin-create.view.php");
include_once("components/footer.php");
