<div class="header-text my-5">
  <br>
</div>

<div class="container">
  <h1>Log in</h1>

  <?php if (isset($err)): ?>
    <br>
    <div class="alert alert-danger" role="alert"><?= $err ?></div>
  <?php endif ?>

  <form method="POST">
    <div class="form-group">
      <label>Email</label>
      <input name="email" value="<?= $email ?? '' ?>" type="text" class="form-control" placeholder="Email" required>
    </div>
    <div class="form-group">
      <label>Password</label>
      <input name="password" type="password" class="form-control" placeholder="Password" required>
    </div>

    <a href="signup">Don't have account?</a><br>
    <button type="submit" class="btn btn-primary mt-2">Submit</button>
  </form>
</div>