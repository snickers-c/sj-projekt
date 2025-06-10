<?php
include_once("components/header.php");
$auth = new Authenticate($db);

if ($auth->isLoggedIn()) {
  header("Location: admin.php");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';

  if ($auth->login($email, $password)) {
    header("Location: admin.php");
    exit;
  } else {
    $err = "Login failed!";
  }
}
?>

<div class="header-text my-5">
  <br>
</div>
<div class="container">
  <h1>Log in</h1>

  <?php
  if (isset($err)) {
    echo '<br><div class="alert alert-danger" role="alert">' . $err . '</div>';
    $err = null;
  }
  ?>

  <form method="POST">
    <div class="form-group">
      <label>Email</label>
      <input name="email" type="text" class="form-control" placeholder="Email" required>
    </div>
    <div class="form-group">
      <label>Password</label>
      <input name="password" type="password" class="form-control" placeholder="Password" required>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Submit</button>
  </form>
</div>

<?php
include_once("components/footer.php");
?>