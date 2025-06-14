<?php
include_once("components/header.php");
$auth = new Authenticate($db);

if (isset($_GET['logout'])) {
  $auth->logOut();
}
$auth->requireLogin();

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


?>
<div class="header-text my-5">
  <br>
</div>
<div class="container">
  <a href="?logout=1" type="button" class="btn btn-primary">Log out</a>
  <br><br>
  <ul class="nav nav-tabs">
    <?php
    $tabItems = [
      ['label' => 'Users', 'link' => 'users'],
      ['label' => 'Testimonials', 'link' => 'testimonials'],
      ['label' => 'Course tags', 'link' => 'tags'],
      ['label' => 'Services', 'link' => 'services'],
      ['label' => 'Events', 'link' => 'events'],
      ['label' => 'Courses', 'link' => 'courses'],
      ['label' => 'Employees', 'link' => 'employees']
    ];
    $tabs = new Menu($tabItems);
    echo $tabs->getTabs($_GET['tab'] ?? '');
    ?>
  </ul>
  <br>

  <?php if (($_GET['tab'] ?? '') == "testimonials"): ?>
    <h1>Testimonials</h1>
    <a href="admin-create.php?tab=testimonials">Create</a>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>creator ID</th>
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
        foreach ($testimonialItems as $row) {
          $id = $row['id_testimonial'];
          echo '<tr>';
          echo '<td>' . $id . '</td>';
          echo '<td>' . $row['creator'] . '</td>';
          echo '<td>' . $row['first_name'] . '</td>';
          echo '<td>' . $row['last_name'] . '</td>';
          echo '<td>' . $row['occupation'] . '</td>';
          echo '<td>' . $row['description'] . '</td>';
          echo '<td>' . $row['active'] . '</td>';
          echo '<td>' . $row['image'] . '</td>';
          echo '<td><a href="admin-update.php?tab=testimonials&id=' . $id . '">Edit</a></td>';
          echo '<td><a href="?tab=testimonials&delete=' . $id . '">Delete</a></td>';
          echo '</tr>';
        }
        ?>
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
        foreach ($userItems as $row) {
          $id = $row['id_user'];
          echo '<tr>';
          echo '<td>' . $id . '</td>';
          echo '<td>' . $row['first_name'] . '</td>';
          echo '<td>' . $row['last_name'] . '</td>';
          echo '<td>' . $row['role'] . '</td>';
          echo '<td>' . $row['email'] . '</td>';
          echo '<td>' . $row['created_at'] . '</td>';
          echo '<td><a href="admin-update.php?tab=users&id=' . $id . '">Edit</a></td>';
          echo '<td><a href="?tab=users&delete=' . $id . '">Delete</a></td>';
          echo '</tr>';
        }
        ?>
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
        foreach ($tagItems as $row) {
          $id = $row['id_tag'];
          echo '<tr>';
          echo '<td>' . $id . '</td>';
          echo '<td>' . $row['name'] . '</td>';
          echo '<td><a href="admin-update.php?tab=tags&id=' . $id . '">Edit</a></td>';
          echo '<td><a href="?tab=tags&delete=' . $id . '">Delete</a></td>';
          echo '</tr>';
        }
        ?>
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
          <th>creator ID</th>
          <th>Title</th>
          <th>Description</th>
          <th>Button_link</th>
          <th>Image</th>
          <th>Active</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($serviceItems as $row) {
          $id = $row['id_service'];
          echo '<tr>';
          echo '<td>' . $id . '</td>';
          echo '<td>' . $row['creator'] . '</td>';
          echo '<td>' . $row['title'] . '</td>';
          echo '<td>' . $row['description'] . '</td>';
          echo '<td>' . $row['button_link'] . '</td>';
          echo '<td>' . $row['image'] . '</td>';
          echo '<td>' . $row['active'] . '</td>';
          echo '<td><a href="admin-update.php?tab=services&id=' . $id . '">Edit</a></td>';
          echo '<td><a href="?tab=services&delete=' . $id . '">Delete</a></td>';
          echo '</tr>';
        }
        ?>
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
          <th>creator ID</th>
          <th>Title</th>
          <th>Category</th>
          <th>Date</th>
          <th>Duration</th>
          <th>Price</th>
          <th>Image</th>
          <th>Active</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($eventItems as $row) {
          $id = $row['id_event'];
          echo '<tr>';
          echo '<td>' . $id . '</td>';
          echo '<td>' . $row['creator'] . '</td>';
          echo '<td>' . $row['title'] . '</td>';
          echo '<td>' . $row['category'] . '</td>';
          echo '<td>' . $row['date'] . '</td>';
          echo '<td>' . $row['duration'] . '</td>';
          echo '<td>' . $row['price'] . '</td>';
          echo '<td>' . $row['image'] . '</td>';
          echo '<td>' . $row['active'] . '</td>';
          echo '<td><a href="admin-update.php?tab=events&id=' . $id . '">Edit</a></td>';
          echo '<td><a href="?tab=events&delete=' . $id . '">Delete</a></td>';
          echo '</tr>';
        }
        ?>
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
          <th>creator ID</th>
          <th>Employee</th>
          <th>Title</th>
          <th>Price</th>
          <th>Image</th>
          <th>Active</th>
          <th>Edit</th>
          <th>Delete</th>
          <!-- <th>ID</th>
          <th>creator ID</th>
          <th>Employee</th>
          <th>Title</th>
          <th>Date</th>
          <th>Capacity</th>
          <th>Used capacity</th>
          <th>Price</th>
          <th>Image</th>
          <th>Active</th>
          <th>Edit</th>
          <th>Delete</th> -->
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($courseItems as $row) {
          $id = $row['id_course'];
          echo '<tr>';
          echo '<td>' . $id . '</td>';
          echo '<td>' . $row['creator'] . '</td>';
          echo '<td>' . $row['first_name'] . ' ' . $row['last_name'] . '</td>';
          echo '<td>' . $row['title'] . '</td>';
          echo '<td>' . $row['price'] . '</td>';
          echo '<td>' . $row['image'] . '</td>';
          echo '<td>' . $row['active'] . '</td>';
          echo '<td><a href="admin-update.php?tab=courses&id=' . $id . '">Edit</a></td>';
          echo '<td><a href="?tab=courses&delete=' . $id . '">Delete</a></td>';
          echo '</tr>';
        }
        ?>
        <?php
        /*foreach ($courseItems as $row) {
          $id = $row['id_course'];
          echo '<tr>';
          echo '<td>' . $id . '</td>';
          echo '<td>' . $row['c.creator'] . '</td>';
          echo '<td>' . $row['e.first_name'] . $row['e.last_name'] . '</td>';
          echo '<td>' . $row['c.title'] . '</td>';
          echo '<td>';
          // $tagsResult = "";
          // foreach ($courseTags as $cT) {
          //   if ($id == )
          //   $tagsResult .= $cT['name'] . ', ';
          // }
          echo $tagsResult . '</td>';
          echo '<td>' . $row['date'] . '</td>';
          echo '<td>' . $row['duration'] . '</td>';
          echo '<td>' . $row['c.price'] . '</td>';
          echo '<td>' . $row['c.image'] . '</td>';
          echo '<td>' . $row['c.active'] . '</td>';
          echo '<td><a href="admin-update.php?tab=courses&id=' . $id . '">Edit</a></td>';
          echo '<td><a href="?tab=courses&delete=' . $id . '">Delete</a></td>';
          echo '</tr>';
        }*/
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
        foreach ($employeeItems as $row) {
          $id = $row['id_employee'];
          echo '<tr>';
          echo '<td>' . $id . '</td>';
          echo '<td>' . $row['first_name'] . '</td>';
          echo '<td>' . $row['last_name'] . '</td>';
          echo '<td>' . $row['occupation'] . '</td>';
          echo '<td>' . $row['image'] . '</td>';
          echo '<td>' . $row['facebook'] . '</td>';
          echo '<td>' . $row['twitter'] . '</td>';
          echo '<td>' . $row['linkedin'] . '</td>';
          echo '<td><a href="admin-update.php?tab=employees&id=' . $id . '">Edit</a></td>';
          echo '<td><a href="?tab=employees&delete=' . $id . '">Delete</a></td>';
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>
  <?php endif ?>
</div>
<?php
include_once("components/footer.php");
?>