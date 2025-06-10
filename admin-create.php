<?php
include_once("components/header.php");

if (($_GET['tab'] ?? '') == "testimonials") {
  $testimonial = new Testimonial($db);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $occupation = $_POST['occupation'];
    $text = $_POST['text'];
    $image = $_POST['image'];

    if ($testimonial->createTestimonial($firstName, $lastName, $occupation, $text, $image)) {
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
      <label>Text</label>
      <input name="text" type="text" class="form-control" placeholder="Text" required>
    </div>
    <div class="form-group">
      <label>Image</label>
      <input name="image" type="text" class="form-control" placeholder="Not required">
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
</div>
<?php
include_once("components/footer.php");
?>