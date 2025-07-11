<?php
include_once("components/header.php");
$auth = new Authenticate($db);

if (isset($_GET['logout'])) {
  $auth->logOut();
}
$auth->requireLogin();

$isAdmin = $auth->getUserRole() == 0;
if ($isAdmin) {
  if (($_GET['tab'] ?? '') == "testimonials") {
    $testimonial = new Testimonial($db);
    $testimonialItems = $testimonial->readTestimonial();

    if (isset($_GET['delete'])) {
      if ($testimonial->deleteTestimonial($_GET['delete'])) {
        header("Location: admin?tab=testimonials");
        exit;
      } else {
        echo "Record failed to be deleted.";
      }
    }
  }

  if (($_GET['tab'] ?? '') == "users") {
    $user = new User($db);
    $userItems = $user->readUser();

    if (isset($_GET['delete'])) {
      if ($user->deleteUser($_GET['delete'])) {
        header("Location: admin?tab=users");
        exit;
      } else {
        echo "Record failed to be deleted.";
      }
    }
  }

  if (($_GET['tab'] ?? '') == "tags") {
    $tag = new Tag($db);
    $tagItems = $tag->readTag();

    if (isset($_GET['delete'])) {
      if ($tag->deleteTag($_GET['delete'])) {
        header("Location: admin?tab=tags");
        exit;
      } else {
        echo "Record failed to be deleted.";
      }
    }
  }

  if (($_GET['tab'] ?? '') == "services") {
    $service = new Service($db);
    $serviceItems = $service->readService();

    if (isset($_GET['delete'])) {
      if ($service->deleteService($_GET['delete'])) {
        header("Location: admin?tab=services");
        exit;
      } else {
        echo "Record failed to be deleted.";
      }
    }
  }

  if (($_GET['tab'] ?? '') == "events") {
    $event = new Event($db);
    $eventItems = $event->readEvent();

    if (isset($_GET['delete'])) {
      if ($event->deleteEvent($_GET['delete'])) {
        header("Location: admin?tab=events");
        exit;
      } else {
        echo "Record failed to be deleted.";
      }
    }
  }

  if (($_GET['tab'] ?? '') == "courses") {
    $course = new Course($db);
    $courseItems = $course->readCourse();

    if (isset($_GET['delete'])) {
      if ($course->deleteCourse($_GET['delete'])) {
        header("Location: admin?tab=courses");
        exit;
      } else {
        echo "Record failed to be deleted.";
      }
    }
  }

  if (($_GET['tab'] ?? '') == "employees") {
    $employee = new Employee($db);
    $employeeItems = $employee->readEmployee();

    if (isset($_GET['delete'])) {
      if ($employee->deleteEmployee($_GET['delete'])) {
        header("Location: admin?tab=employees");
        exit;
      } else {
        echo "Record failed to be deleted.";
      }
    }
  }

  if (($_GET['tab'] ?? '') == "qnas") {
    $qna = new Qna($db);
    $qnaItems = $qna->readQna();

    if (isset($_GET['delete'])) {
      if ($qna->deleteQna($_GET['delete'])) {
        header("Location: admin?tab=qnas");
        exit;
      } else {
        echo "Record failed to be deleted.";
      }
    }
  }

  if (($_GET['tab'] ?? '') == "banners") {
    $banner = new Banner($db);
    $bannerItems = $banner->readBanner();

    if (isset($_GET['delete'])) {
      if ($banner->deleteBanner($_GET['delete'])) {
        header("Location: admin?tab=banners");
        exit;
      } else {
        echo "Record failed to be deleted.";
      }
    }
  }

  if (($_GET['tab'] ?? '') == "dates") {
    $date = new Date($db);
    $dateItems = $date->readDate();

    if (isset($_GET['delete'])) {
      if ($date->deleteDate($_GET['delete'])) {
        header("Location: admin?tab=dates");
        exit;
      } else {
        echo "Record failed to be deleted.";
      }
    }
  }

  if (($_GET['tab'] ?? '') == "orders") {
    $order = new Order($db);
    $orderItems = $order->readOrder();

    if (isset($_GET['delete'])) {
      if ($order->deleteOrder($_GET['delete'])) {
        header("Location: admin?tab=orders");
        exit;
      } else {
        echo "Record failed to be deleted.";
      }
    }
  }

  if (($_GET['tab'] ?? '') == "eventOrders") {
    $order = new Order($db);
    $orderItems = $order->readOrderEvent();

    if (isset($_GET['delete'])) {
      if ($order->deleteOrderEvent($_GET['delete'])) {
        header("Location: admin?tab=eventOrders");
        exit;
      } else {
        echo "Record failed to be deleted.";
      }
    }
  }

  if (($_GET['tab'] ?? '') == "messages") {
    $message = new Message($db);
    $messageItems = $message->readMessage();

    if (isset($_GET['delete'])) {
      if ($message->deleteMessage($_GET['delete'])) {
        header("Location: admin?tab=messages");
        exit;
      } else {
        echo "Record failed to be deleted.";
      }
    }
  }
} else {
  if (($_GET['tab'] ?? '') == "myCourses") {
    $order = new Order($db);
    $orderItems = $order->readOrderMyCourses($_SESSION['userID']);
  }

  if (($_GET['tab'] ?? '') == "myEvents") {
    $order = new Order($db);
    $orderItems = $order->readOrderMyEvents($_SESSION['userID']);
  }
}

require("views/admin.view.php");
include_once("components/footer.php");
