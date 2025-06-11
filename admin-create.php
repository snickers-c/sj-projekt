<?php
include_once("components/header.php");

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
      header('Location: admin.php?tab=testimonials');
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
      header('Location: admin.php?tab=users');
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
      header('Location: admin.php?tab=tags');
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
    $button_link = $_POST['button_link'];
    $image = $_POST['image'];
    $active = $_POST['active'];

    if ($service->createService($_SESSION['userID'], $title, $desc, $button_link, $image, $active)) {
      header('Location: admin.php?tab=services');
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
    $active = $_POST['active'];

    if ($event->createEvent($_SESSION['userID'], $title, $category, $date, $duration, $price, $image, $active)) {
      header('Location: admin.php?tab=events');
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
  <?php
  if (isset($err)) {
    echo '<br><div class="alert alert-danger" role="alert">' . $err . '</div>';
    $err = null;
  }
  ?>

  <?php if (($_GET['tab'] ?? '') == "testimonials"): ?>
    <h1>Create new testimonial</h1>

    <form method="POST">
      <div class="form-group">
        <label>First Name</label>
        <input name="firstName" type="text" class="form-control" placeholder="First Name" required>
      </div>
      <div class="form-group">
        <label>Last Name</label>
        <input name="lastName" type="text" class="form-control" placeholder="Last Name" required>
      </div>
      <div class="form-group">
        <label>Occupation</label>
        <input name="occupation" type="text" class="form-control" placeholder="Occupation" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <input name="desc" type="text" class="form-control" placeholder="Description" required>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input name="image" type="text" class="form-control" placeholder="Not required">
      </div>
      <div class="form-group">
        <label>Active</label>
        <input name="active" type="text" class="form-control" placeholder="1 or 0" required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "users"): ?>
    <h1>Create new user</h1>

    <form method="POST">
      <div class="form-group">
        <label>First Name</label>
        <input name="firstName" type="text" class="form-control" placeholder="First Name" required>
      </div>
      <div class="form-group">
        <label>Last Name</label>
        <input name="lastName" type="text" class="form-control" placeholder="Last Name" required>
      </div>
      <div class="form-group">
        <label>Role</label>
        <input name="role" type="text" class="form-control" placeholder="Role" required>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input name="email" type="email" class="form-control" placeholder="Email" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input name="password" type="password" class="form-control" placeholder="Password" required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "tags"): ?>
    <h1>Create new tag</h1>

    <form method="POST">
      <div class="form-group">
        <label>Tag name</label>
        <input name="name" type="text" class="form-control" placeholder="Tag name" required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "services"): ?>
    <h1>Create new service</h1>

    <form method="POST">
      <div class="form-group">
        <label>Title</label>
        <input name="title" type="text" class="form-control" placeholder="Title" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <input name="desc" type="text" class="form-control" placeholder="Description" required>
      </div>
      <div class="form-group">
        <label>Button link</label>
        <input name="button_link" type="text" class="form-control" placeholder="Not Required">
      </div>
      <div class="form-group">
        <label>Image</label>
        <input name="image" type="text" class="form-control" placeholder="Image" required>
      </div>
      <div class="form-group">
        <label>Active</label>
        <input name="active" type="text" class="form-control" placeholder="1 or 0" required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "events"): ?>
    <h1>Create new event</h1>

    <form method="POST">
      <div class="form-group">
        <label>Title</label>
        <input name="title" type="text" class="form-control" placeholder="Title" required>
      </div>
      <div class="form-group">
        <label>Category</label>
        <input name="category" type="text" class="form-control" placeholder="Category" required>
      </div>
      <div class="form-group">
        <label>Date</label>
        <input name="date" type="text" class="form-control" placeholder="yyyy-mm-dd hh:mm:ss" required>
      </div>
      <div class="form-group">
        <label>Duration</label>
        <input name="duration" type="text" class="form-control" placeholder="Duration" required>
      </div>
      <div class="form-group">
        <label>Price</label>
        <input name="price" type="text" class="form-control" placeholder="Price" required>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input name="image" type="text" class="form-control" placeholder="Image" required>
      </div>
      <div class="form-group">
        <label>Active</label>
        <input name="active" type="text" class="form-control" placeholder="1 or 0" required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>
</div>
<?php
include_once("components/footer.php");
?>