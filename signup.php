<?php
include_once("components/header.php");
$auth = new Authenticate($db);

if ($auth->isLoggedIn()) {
  header("Location: admin.php");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $role = 1;
  $email = $_POST['email'];
  $password = $_POST['password'];
  $repeatPassword = $_POST['repeatPassword'];

  $userCreated = false;
  $userLogged = false;
  if ($password == $repeatPassword) {
    $user = new User($db);
    $userCreated = $user->createUser($firstName, $lastName, $role, $email, $password);
  } else {
    $err = "Password is not equal!";
  }

  if ($userCreated) {
    $userLogged = $auth->login($email, $password);
  } else {
    $err = $err ?? "Sign up failed!";
  }

  if ($userLogged) {
    header("Location: admin.php");
    exit;
  } else {
    $err = $err ?? "Login failed!";
  }
}
?>

<div class="header-text my-5">
  <br>
</div>

<div class="container">
  <h1>Sign up</h1>

  <?php if (isset($err)): ?>
    <br>
    <div class="alert alert-danger" role="alert"><?php echo $err ?></div>
  <?php endif ?>

  <form method="POST">
    <div class="form-group">
      <label>First name</label>
      <input name="firstName" value="<?php echo $firstName ?? '' ?>" type="text" class="form-control"
        placeholder="First Name" required>
    </div>
    <div class="form-group">
      <label>Last name</label>
      <input name="lastName" value="<?php echo $lastName ?? '' ?>" type="text" class="form-control"
        placeholder="Last name" required>
    </div>
    <div class="form-group">
      <label>Email</label>
      <input name="email" value="<?php echo $email ?? '' ?>" type="email" class="form-control" placeholder="Email"
        required>
    </div>
    <div class="form-group">
      <label>Password</label>
      <input name="password" type="password" class="form-control" placeholder="Password" required>
    </div>
    <div class="form-group">
      <label>Repeat password</label>
      <input name="repeatPassword" type="password" class="form-control" placeholder="Repeat password" required>
    </div>

    <a href="login.php">I have account.</a><br>
    <button type="submit" class="btn btn-primary mt-2">Submit</button>
  </form>
</div>

<?php
include_once("components/footer.php");
?>