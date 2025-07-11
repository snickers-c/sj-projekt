<div class="header-text my-5">
  <br>
</div>

<div class="container">
  <h1>Sign up</h1>

  <?php if (isset($err)): ?>
    <br>
    <div class="alert alert-danger" role="alert"><?= $err ?></div>
  <?php endif ?>

  <form method="POST">
    <div class="form-group">
      <label>First name</label>
      <input name="firstName" value="<?= $firstName ?? '' ?>" type="text" class="form-control" placeholder="First Name"
        required>
    </div>
    <div class="form-group">
      <label>Last name</label>
      <input name="lastName" value="<?= $lastName ?? '' ?>" type="text" class="form-control" placeholder="Last name"
        required>
    </div>
    <div class="form-group">
      <label>Email</label>
      <input name="email" value="<?= $email ?? '' ?>" type="email" class="form-control" placeholder="Email" required>
    </div>
    <div class="form-group">
      <label>Password</label>
      <input name="password" type="password" class="form-control" placeholder="Password" required>
    </div>
    <div class="form-group">
      <label>Repeat password</label>
      <input name="repeatPassword" type="password" class="form-control" placeholder="Repeat password" required>
    </div>

    <a href="login">I have account.</a><br>
    <button type="submit" class="btn btn-primary mt-2">Submit</button>
  </form>
</div>