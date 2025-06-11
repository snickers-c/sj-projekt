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
    $button_link = $_POST['button_link'];
    $image = $_POST['image'];
    $active = $_POST['active'];

    if ($service->updateService($id, $title, $desc, $button_link, $image, $active)) {
      header('Location: admin.php?tab=services');
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
        <input value="<?php echo $current['button_link'] ?? '' ?>" name="button_link" type="text" class="form-control"
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
</div>
<?php
include_once("components/footer.php");
?>