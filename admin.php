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
        header("Location: admin.php?tab=testimonials");
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
        header("Location: admin.php?tab=users");
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
        header("Location: admin.php?tab=tags");
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
        header("Location: admin.php?tab=services");
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
        header("Location: admin.php?tab=events");
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
        header("Location: admin.php?tab=courses");
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
        header("Location: admin.php?tab=employees");
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
        header("Location: admin.php?tab=qnas");
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
        header("Location: admin.php?tab=banners");
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
        header("Location: admin.php?tab=dates");
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
        header("Location: admin.php?tab=orders");
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
        header("Location: admin.php?tab=eventOrders");
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
        header("Location: admin.php?tab=messages");
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
?>
<div class="header-text my-5">
  <br>
</div>
<div class="container">
  <a href="?logout=1" type="button" class="btn btn-primary">Log out</a>
  <br><br>
  <ul class="nav nav-tabs">
    <?php
    $tabItems = [];
    if ($isAdmin) {
      $tabItems = [
        ['label' => 'Users', 'link' => 'users'],
        ['label' => 'Testimonials', 'link' => 'testimonials'],
        ['label' => 'Course tags', 'link' => 'tags'],
        ['label' => 'Services', 'link' => 'services'],
        ['label' => 'Events', 'link' => 'events'],
        ['label' => 'Courses', 'link' => 'courses'],
        ['label' => 'Employees', 'link' => 'employees'],
        ['label' => 'Qna', 'link' => 'qnas'],
        ['label' => 'Banners', 'link' => 'banners'],
        ['label' => 'Dates', 'link' => 'dates'],
        ['label' => 'Orders', 'link' => 'orders'],
        ['label' => 'Event orders', 'link' => 'eventOrders'],
        ['label' => 'Messages', 'link' => 'messages']
      ];
    } else {
      $tabItems = [
        ['label' => 'My courses', 'link' => 'myCourses'],
        ['label' => 'My events', 'link' => 'myEvents']
      ];
    }
    $tabs = new Menu($tabItems);
    echo $tabs->getTabs($_GET['tab'] ?? '');
    ?>
  </ul>
  <br>

  <?php if ($isAdmin): ?>
    <?php if (($_GET['tab'] ?? '') == "testimonials"): ?>
      <h1>Testimonials</h1>
      <a href="admin-create.php?tab=testimonials">Create</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Creator ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Occupation</th>
            <th>Description</th>
            <th>Active</th>
            <th>Image path</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($testimonialItems as $row):
            $id = $row['id_testimonial']; ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $row['creator'] ?></td>
              <td><?php echo $row['first_name'] ?></td>
              <td><?php echo $row['last_name'] ?></td>
              <td><?php echo $row['occupation'] ?></td>
              <td><?php echo $row['description'] ?></td>
              <td><?php echo $row['active'] ?></td>
              <td><?php echo $row['image'] ?></td>
              <td><a href="admin-update.php?tab=testimonials&id=<?php echo $id ?>">Edit</a></td>
              <td><a href="?tab=testimonials&delete=<?php echo $id ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "users"): ?>
      <h1>Users</h1>
      <a href="admin-create.php?tab=users">Create</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Role</th>
            <th>Email</th>
            <th>Created at</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($userItems as $row):
            $id = $row['id_user']; ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $row['first_name'] ?></td>
              <td><?php echo $row['last_name'] ?></td>
              <td><?php echo $row['role'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['created_at'] ?></td>
              <td><a href="admin-update.php?tab=users&id=<?php echo $id ?>">Edit</a></td>
              <td><a href="?tab=users&delete=<?php echo $id ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "tags"): ?>
      <h1>Course tags</h1>
      <a href="admin-create.php?tab=tags">Create</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($tagItems as $row):
            $id = $row['id_tag']; ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $row['name'] ?></td>
              <td><a href="admin-update.php?tab=tags&id=<?php echo $id ?>">Edit</a></td>
              <td><a href="?tab=tags&delete=<?php echo $id ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "services"): ?>
      <h1>Services</h1>
      <a href="admin-create.php?tab=services">Create</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Creator ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Button link</th>
            <th>Image</th>
            <th>Active</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($serviceItems as $row):
            $id = $row['id_service']; ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $row['creator'] ?></td>
              <td><?php echo $row['title'] ?></td>
              <td><?php echo $row['description'] ?></td>
              <td><?php echo $row['button_link'] ?></td>
              <td><?php echo $row['image'] ?></td>
              <td><?php echo $row['active'] ?></td>
              <td><a href="admin-update.php?tab=services&id=<?php echo $id ?>">Edit</a></td>
              <td><a href="?tab=services&delete=<?php echo $id ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "events"): ?>
      <h1>Events</h1>
      <a href="admin-create.php?tab=events">Create</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Creator ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Date</th>
            <th>Duration</th>
            <th>Price</th>
            <th>Image</th>
            <th>Description</th>
            <th>Users count</th>
            <th>Active</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($eventItems as $row):
            $id = $row['id_event']; ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $row['creator'] ?></td>
              <td><?php echo $row['title'] ?></td>
              <td><?php echo $row['category'] ?></td>
              <td><?php echo $row['date'] ?></td>
              <td><?php echo $row['duration'] ?></td>
              <td><?php echo $row['price'] ?></td>
              <td><?php echo $row['image'] ?></td>
              <td>Check in edit</td>
              <td><?php echo $row['users_count'] ?></td>
              <td><?php echo $row['active'] ?></td>
              <td><a href="admin-update.php?tab=events&id=<?php echo $id ?>">Edit</a></td>
              <td><a href="?tab=events&delete=<?php echo $id ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "courses"): ?>
      <h1>Courses</h1>
      <a href="admin-create.php?tab=courses">Create</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Creator ID</th>
            <th>Employee</th>
            <th>Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Description</th>
            <th>Active</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($courseItems as $row):
            $id = $row['id_course']; ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $row['creator'] ?></td>
              <td><?php echo $row['first_name'] . ' ' . $row['last_name'] ?></td>
              <td><?php echo $row['title'] ?></td>
              <td><?php echo $row['price'] ?></td>
              <td><?php echo $row['image'] ?></td>
              <td>Check in edit</td>
              <td><?php echo $row['active'] ?></td>
              <td><a href="admin-update.php?tab=courses&id=<?php echo $id ?>">Edit</a></td>
              <td><a href="?tab=courses&delete=<?php echo $id ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
          <?php
          ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "employees"): ?>
      <h1>Employees</h1>
      <a href="admin-create.php?tab=employees">Create</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Occupation</th>
            <th>Image</th>
            <th>Facebook</th>
            <th>Twitter</th>
            <th>LinkedIn</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($employeeItems as $row):
            $id = $row['id_employee']; ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $row['first_name'] ?></td>
              <td><?php echo $row['last_name'] ?></td>
              <td><?php echo $row['occupation'] ?></td>
              <td><?php echo $row['image'] ?></td>
              <td><?php echo $row['facebook'] ?></td>
              <td><?php echo $row['twitter'] ?></td>
              <td><?php echo $row['linkedin'] ?></td>
              <td><a href="admin-update.php?tab=employees&id=<?php echo $id ?>">Edit</a></td>
              <td><a href="?tab=employees&delete=<?php echo $id ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "qnas"): ?>
      <h1>QnA's</h1>
      <a href="admin-create.php?tab=qnas">Create</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Creator ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Active</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($qnaItems as $row):
            $id = $row['id_about_us']; ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $row['creator'] ?></td>
              <td><?php echo $row['title'] ?></td>
              <td><?php echo $row['description'] ?></td>
              <td><?php echo $row['active'] ?></td>
              <td><a href="admin-update.php?tab=qnas&id=<?php echo $id ?>">Edit</a></td>
              <td><a href="?tab=qnas&delete=<?php echo $id ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "banners"): ?>
      <h1>Banners</h1>
      <a href="admin-create.php?tab=banners">Create</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Creator ID</th>
            <th>Tag</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Button link</th>
            <th>Active</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($bannerItems as $row):
            $id = $row['id_banner']; ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $row['creator'] ?></td>
              <td><?php echo $row['tag'] ?></td>
              <td><?php echo $row['title'] ?></td>
              <td><?php echo $row['description'] ?></td>
              <td><?php echo $row['image'] ?></td>
              <td><?php echo $row['button_link'] ?></td>
              <td><?php echo $row['active'] ?></td>
              <td><a href="admin-update.php?tab=banners&id=<?php echo $id ?>">Edit</a></td>
              <td><a href="?tab=banners&delete=<?php echo $id ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "dates"): ?>
      <h1>Dates</h1>
      <a href="admin-create.php?tab=dates">Create</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Course ID</th>
            <th>Course title</th>
            <th>Date</th>
            <th>Capacity</th>
            <th>Slots</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($dateItems as $row):
            $id = $row['id_date']; ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $row['course'] ?></td>
              <td><?php echo $row['title'] ?></td>
              <td><?php echo $row['date'] ?></td>
              <td><?php echo $row['capacity'] ?></td>
              <td><?php echo $row['slots'] ?></td>
              <td><a href="admin-update.php?tab=dates&id=<?php echo $id ?>">Edit</a></td>
              <td><a href="?tab=dates&delete=<?php echo $id ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "orders"): ?>
      <h1>Orders</h1>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Title</th>
            <th>Date</th>
            <th>Registered at</th>
            <th>Paid</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($orderItems as $row):
            $id = $row['id_order']; ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $row['first_name'] ?></td>
              <td><?php echo $row['last_name'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['title'] ?></td>
              <td><?php echo $row['date'] ?></td>
              <td><?php echo $row['registered_at'] ?></td>
              <td><?php echo $row['paid'] ?></td>
              <td><a href="admin-update.php?tab=orders&id=<?php echo $id ?>">Edit</a></td>
              <td><a href="?tab=orders&delete=<?php echo $id . '-' . $row['id_date'] ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "eventOrders"): ?>
      <h1>Event orders</h1>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Title</th>
            <th>Date</th>
            <th>Registered at</th>
            <th>Paid</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($orderItems as $row):
            $id = $row['id_order_event']; ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $row['first_name'] ?></td>
              <td><?php echo $row['last_name'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['title'] ?></td>
              <td><?php echo $row['date'] ?></td>
              <td><?php echo $row['registered_at'] ?></td>
              <td><?php echo $row['paid'] ?></td>
              <td><a href="admin-update.php?tab=eventOrders&id=<?php echo $id ?>">Edit</a></td>
              <td><a href="?tab=eventOrders&delete=<?php echo $id . '-' . $row['id_event'] ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "messages"): ?>
      <h1>Messages</h1>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Created at</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($messageItems as $row):
            $id = $row['id_message']; ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $row['first_name'] ?></td>
              <td><?php echo $row['last_name'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['message'] ?></td>
              <td><?php echo $row['created_at'] ?></td>
              <td><a href="?tab=messages&delete=<?php echo $id ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

  <?php else: ?>
    <?php if (($_GET['tab'] ?? '') == "myCourses"): ?>
      <h1>My registered courses</h1>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Lector</th>
            <th>Price</th>
            <th>Date</th>
            <th>Registered at</th>
            <th>Paid</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($orderItems as $row): ?>
            <tr>
              <td><?php echo $row['title'] ?></td>
              <td><?php echo $row['first_name'] . ' ' . $row['last_name'] ?></td>
              <td><?php echo $row['price'] ?></td>
              <td><?php echo $row['date'] ?></td>
              <td><?php echo $row['registered_at'] ?></td>
              <td><?php echo (($row['paid'] == 1) ? 'Yes' : 'no') ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "myEvents"): ?>
      <h1>My registered events</h1>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Price</th>
            <th>Date</th>
            <th>Registered at</th>
            <th>Paid</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($orderItems as $row): ?>
            <tr>
              <td><?php echo $row['title'] ?></td>
              <td><?php echo $row['price'] ?></td>
              <td><?php echo $row['date'] ?></td>
              <td><?php echo $row['registered_at'] ?></td>
              <td><?php echo (($row['paid'] == 1) ? 'Yes' : 'No') ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>
  <?php endif ?>
</div>
<?php
include_once("components/footer.php");
?>