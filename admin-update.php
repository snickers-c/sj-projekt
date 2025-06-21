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
      $err = "Inserting failed";
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
    $active = $_POST['active'];

    if ($event->updateEvent($id, $title, $category, $date, $duration, $price, $image, $active)) {
      header('Location: admin.php?tab=events');
      exit;
    } else {
      $err = "Inserting failed";
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
      $err = "Inserting failed";
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
      $err = "Inserting failed";
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
      $err = "Inserting failed";
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
      $err = "Inserting failed";
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
      $err = "Inserting failed";
    }
  }
}
?>
<div class="header-text my-5">
  <br>
</div>
<div class="container">
  <?php if (($_GET['tab'] ?? '') == "testimonials"): ?>
    <h1>Update testimonial</h1>

    <form method="POST">
      <div class="form-group">
        <label>First Name</label>
        <input value="<?php echo $current['first_name'] ?? '' ?>" name="firstName" type="text" class="form-control"
          placeholder="First Name" required>
      </div>
      <div class="form-group">
        <label>Last Name</label>
        <input value="<?php echo $current['last_name'] ?? '' ?>" name="lastName" type="text" class="form-control"
          placeholder="Last Name" required>
      </div>
      <div class="form-group">
        <label>Occupation</label>
        <input value="<?php echo $current['occupation'] ?? '' ?>" name="occupation" type="text" class="form-control"
          placeholder="Occupation" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <input value="<?php echo $current['description'] ?? '' ?>" name="desc" type="text" class="form-control"
          placeholder="Description" required>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input value="<?php echo $current['image'] ?? '' ?>" name="image" type="text" class="form-control"
          placeholder="Not required">
      </div>
      <div class="form-group">
        <label>Active</label>
        <input value="<?php echo $current['active'] ?? '' ?>" name="active" type="text" class="form-control"
          placeholder="1 or 0" required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "users"): ?>
    <h1>Update user</h1>

    <form method="POST">
      <div class="form-group">
        <label>First Name</label>
        <input value="<?php echo $current['first_name'] ?? '' ?>" name="firstName" type="text" class="form-control"
          placeholder="First Name" required>
      </div>
      <div class="form-group">
        <label>Last Name</label>
        <input value="<?php echo $current['last_name'] ?? '' ?>" name="lastName" type="text" class="form-control"
          placeholder="Last Name" required>
      </div>
      <div class="form-group">
        <label>Role</label>
        <input value="<?php echo $current['role'] ?? '' ?>" name="role" type="text" class="form-control"
          placeholder="Role" required>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input value="<?php echo $current['email'] ?? '' ?>" name="email" type="email" class="form-control"
          placeholder="Email" required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "tags"): ?>
    <h1>Update course tag</h1>

    <form method="POST">
      <div class="form-group">
        <label>Tag name</label>
        <input value="<?php echo $current['name'] ?? '' ?>" name="name" type="text" class="form-control"
          placeholder="Tag name" required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "services"): ?>
    <h1>Update service</h1>

    <form method="POST">
      <div class="form-group">
        <label>Title</label>
        <input value="<?php echo $current['title'] ?? '' ?>" name="title" type="text" class="form-control"
          placeholder="Title" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <input value="<?php echo $current['description'] ?? '' ?>" name="desc" type="text" class="form-control"
          placeholder="Description" required>
      </div>
      <div class="form-group">
        <label>Button link</label>
        <input value="<?php echo $current['button_link'] ?? '' ?>" name="buttonLink" type="text" class="form-control"
          placeholder="Not Required">
      </div>
      <div class="form-group">
        <label>Image</label>
        <input value="<?php echo $current['image'] ?? '' ?>" name="image" type="text" class="form-control"
          placeholder="Image" required>
      </div>
      <div class="form-group">
        <label>Active</label>
        <input value="<?php echo $current['active'] ?? '' ?>" name="active" type="text" class="form-control"
          placeholder="1 or 0" required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "events"): ?>
    <h1>Update event</h1>

    <form method="POST">
      <div class="form-group">
        <label>Title</label>
        <input value="<?php echo $current['title'] ?? '' ?>" name="title" type="text" class="form-control"
          placeholder="Title" required>
      </div>
      <div class="form-group">
        <label>Category</label>
        <input value="<?php echo $current['category'] ?? '' ?>" name="category" type="text" class="form-control"
          placeholder="Category" required>
      </div>
      <div class="form-group">
        <label>Date</label>
        <input value="<?php echo $current['date'] ?? '' ?>" name="date" type="text" class="form-control"
          placeholder="yyyy-mm-dd hh:mm:ss" required>
      </div>
      <div class="form-group">
        <label>Duration</label>
        <input value="<?php echo $current['duration'] ?? '' ?>" name="duration" type="text" class="form-control"
          placeholder="Duration" required>
      </div>
      <div class="form-group">
        <label>Price</label>
        <input value="<?php echo $current['price'] ?? '' ?>" name="price" type="text" class="form-control"
          placeholder="Price" required>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input value="<?php echo $current['image'] ?? '' ?>" name="image" type="text" class="form-control"
          placeholder="Image" required>
      </div>
      <div class="form-group">
        <label>Active</label>
        <input value="<?php echo $current['active'] ?? '' ?>" name="active" type="text" class="form-control"
          placeholder="1 or 0" required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "courses"): ?>
    <h1>Update course</h1>

    <form method="POST">
      <div class="form-group">
        <label>Employee ID</label>
        <input value="<?php echo $current['employee'] ?? '' ?>" name="employee" type="text" class="form-control"
          placeholder="Employee ID" required>
      </div>
      <div class="form-group">
        <label>Title</label>
        <input value="<?php echo $current['title'] ?? '' ?>" name="title" type="text" class="form-control"
          placeholder="Title" required>
      </div>
      <div class="form-group">
        <label>Price</label>
        <input value="<?php echo $current['price'] ?? '' ?>" name="price" type="text" class="form-control"
          placeholder="Price" required>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input value="<?php echo $current['image'] ?? '' ?>" name="image" type="text" class="form-control"
          placeholder="Image" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <input value="<?php echo $current['description'] ?? '' ?>" name="desc" type="text" class="form-control"
          placeholder="Description" required>
      </div>
      <div class="form-group">
        <label>Active</label>
        <input value="<?php echo $current['active'] ?? '' ?>" name="active" type="text" class="form-control"
          placeholder="1 or 0" required>
      </div>
      <br>
      <h2>Tags:</h2>
      <?php
      $tag = new Tag($db);
      $tagItems = $tag->readTag();
      $courseTags = $course->readCourseTags($id);

      $currentTags = [];
      foreach ($courseTags as $row) {
        $currentTags[] = $row['name'];
      }

      $numberOfTags = count($currentTags);
      $i = 0;
      foreach ($tagItems as $row) {
        $checked = '';
        if ($i < $numberOfTags && $currentTags[$i] == $row['name']) {
          $checked = 'checked';
          $i++;
        }
        echo '
        <div class="form-check">
          <label class="form-check-label">' . $row['name'] . '</label>
          <input name="tags[]" type="checkbox" class="form-check-input" value="' . $row['id_tag'] . '" ' . $checked . '>
        </div>
        ';
      }
      ?>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "employees"): ?>
    <h1>Update Employee</h1>

    <form method="POST">
      <div class="form-group">
        <label>First Name</label>
        <input value="<?php echo $current['first_name'] ?? '' ?>" name="firstName" type="text" class="form-control"
          placeholder="First Name" required>
      </div>
      <div class="form-group">
        <label>Last Name</label>
        <input value="<?php echo $current['last_name'] ?? '' ?>" name="lastName" type="text" class="form-control"
          placeholder="Last Name" required>
      </div>
      <div class="form-group">
        <label>Occupation</label>
        <input value="<?php echo $current['occupation'] ?? '' ?>" name="occupation" type="text" class="form-control"
          placeholder="Occupation" required>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input value="<?php echo $current['image'] ?? '' ?>" name="image" type="text" class="form-control"
          placeholder="Not required">
      </div>
      <div class="form-group">
        <label>Facebook</label>
        <input value="<?php echo $current['facebook'] ?? '' ?>" name="facebook" type="text" class="form-control"
          placeholder="Not required">
      </div>
      <div class="form-group">
        <label>Twitter</label>
        <input value="<?php echo $current['twitter'] ?? '' ?>" name="twitter" type="text" class="form-control"
          placeholder="Not required">
      </div>
      <div class="form-group">
        <label>LinkedIn</label>
        <input value="<?php echo $current['linkedin'] ?? '' ?>" name="linkedIn" type="text" class="form-control"
          placeholder="Not required">
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "qnas"): ?>
    <h1>Update QnA</h1>

    <form method="POST">
      <div class="form-group">
        <label>Title</label>
        <input value="<?php echo $current['title'] ?? '' ?>" name="title" type="text" class="form-control"
          placeholder="Title" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <input value="<?php echo $current['description'] ?? '' ?>" name="desc" type="text" class="form-control"
          placeholder="Description" required>
      </div>
      <div class="form-group">
        <label>Active</label>
        <input value="<?php echo $current['active'] ?? '' ?>" name="active" type="text" class="form-control"
          placeholder="1 or 0" required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "banners"): ?>
    <h1>Update banner</h1>

    <form method="POST">
      <div class="form-group">
        <label>Tag</label>
        <input value="<?php echo $current['tag'] ?? '' ?>" name="tag" type="text" class="form-control" placeholder="Tag"
          required>
      </div>
      <div class="form-group">
        <label>Title</label>
        <input value="<?php echo $current['title'] ?? '' ?>" name="title" type="text" class="form-control"
          placeholder="Title" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <input value="<?php echo $current['description'] ?? '' ?>" name="desc" type="text" class="form-control"
          placeholder="Description" required>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input value="<?php echo $current['image'] ?? '' ?>" name="image" type="text" class="form-control"
          placeholder="Image" required>
      </div>
      <div class="form-group">
        <label>Button Link</label>
        <input value="<?php echo $current['button_link'] ?? '' ?>" name="buttonLink" type="text" class="form-control"
          placeholder="Button Link" required>
      </div>
      <div class="form-group">
        <label>Active</label>
        <input value="<?php echo $current['active'] ?? '' ?>" name="active" type="text" class="form-control"
          placeholder="1 or 0" required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "dates"): ?>
    <h1>Update date</h1>

    <form method="POST">
      <div class="form-group">
        <label>Select course</label>
        <select name="course" class="form-select" required>
          <?php
          $course = new Course($db);
          $courseItems = $course->readCourse();

          foreach ($courseItems as $row) {
            echo '<option value="' . $row['id_course'] . '"' . (($row['id_course'] == $current['course']) ? 'selected' : '') . '>' . $row['title'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Date</label>
        <input value="<?php echo $current['date'] ?? '' ?>" name="date" type="text" class="form-control"
          placeholder="yyyy-mm-dd hh:mm:ss" required>
      </div>
      <div class="form-group">
        <label>Capacity</label>
        <input value="<?php echo $current['capacity'] ?? '' ?>" name="capacity" type="text" class="form-control"
          placeholder="Capacity" required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>
</div>
<?php
include_once("components/footer.php");
?>