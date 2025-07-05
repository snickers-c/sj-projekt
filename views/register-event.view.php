<div class="header-text my-5">
  <br>
</div>

<div class="container register-course">
  <?php if ($eventItem): ?>
    <h1 class="mb-4"><?= $eventItem['title'] ?></h1>

    <span class="category"><?= $eventItem['category'] ?></span>

    <h3 class="mt-4 mb-4"><?= $eventItem['price'] ?>€</h3>


    <p><?= $eventItem['description'] ?></p>

    <?php if ($err): ?>
      <div class="alert alert-danger" role="alert">
        <?= $err ?>
      </div>
    <?php endif ?>

    <form method="POST">
      <?php
      $auth = new Authenticate($db);
      if ($auth->isLoggedIn() && $auth->getUserRole() == 1):
        $disabled = '';
        if ($order->isUserRegisteredEvent($id, $_SESSION['userID'])) {
          $disabled = ' disabled';
        }
      ?>
        <button type="submit" class="mt-4 btn btn-primary" <?= $disabled ?>>Register</button>

      <?php else: ?>
        <div class="mt-4 alert alert-primary" role="alert">
          To register a event, you have to be logged in your account or create one.
        </div>
        <a href="signup.php">sign up</a>
      <?php endif ?>
    </form>

  <?php else: ?>
    <h1>Event was not found</h1>
  <?php endif ?>
</div>