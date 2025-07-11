<div class="header-text my-5">
  <br>
</div>

<div class="container register-course">
  <?php if ($courseItem): ?>
    <h1 class="mb-4"><?= $courseItem['title'] ?></h1>

    <?php
    $courseTags = $course->readCourseTags($id);

    foreach ($courseTags as $tag): ?>
      <span class="category"><?= $tag['name'] ?></span>
    <?php endforeach ?>

    <h3 class="mt-4 mb-4"><?= $courseItem['price'] ?>€</h3>


    <p><?= $courseItem['description'] ?></p>

    <h2>Lector:</h2>
    <?php
    $employee = new Employee($db);
    $employeeId = $courseItem['employee'];
    $employeeItem = $employee->findEmployee($employeeId);

    if ($employeeItem): ?>
      <div class="empl col-lg-3 col-md-6">
        <div class="team-member">
          <div class="main-content">
            <img src="<?= $employeeItem['image'] ?>" alt="<?= $employeeItem['first_name'] . $employeeItem['last_name'] ?>">
            <span class="category"><?= $employeeItem['occupation'] ?></span>
            <h4><?= $employeeItem['first_name'] . $employeeItem['last_name'] ?></h4>
            <ul class="social-icons">
              <li><a href="<?= $employeeItem['facebook'] ?>"><i class="fab fa-facebook"></i></a></li>
              <li><a href="<?= $employeeItem['twitter'] ?>"><i class="fab fa-twitter"></i></a></li>
              <li><a href="<?= $employeeItem['linkedin'] ?>"><i class="fab fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    <?php endif ?>

    <h2 class="mt-4">Available dates:</h2>
    <?php if ($err): ?>
      <div class="alert alert-danger" role="alert">
        <?= $err ?>
      </div>
    <?php endif ?>

    <form method="POST">
      <?php
      $dateObject = new Date($db);
      $dateItems = $dateObject->readCourseDates($id);

      foreach ($dateItems as $row):
        $trimmedDate = substr($row['date'], 0, 10); ?>
        <div class="form-check">
          <input class="form-check-input" value="<?= $row['id_date'] ?>" type="radio" name="date" required>
          <label class="form-check-label">
            <?= $trimmedDate . ' (' . $row['slots'] . '/' . $row['capacity'] . ' slots available)' ?>
          </label>
        </div>
      <?php endforeach ?>

      <?php
      $auth = new Authenticate($db);
      if ($auth->isLoggedIn() && $auth->getUserRole() == 1): ?>
        <button type="submit" class="mt-4 btn btn-primary">Register</button>

      <?php else: ?>
        <div class="mt-4 alert alert-primary" role="alert">
          To register a course, you have to be logged in your account or create one.
        </div>

        <a href="signup">sign up</a>
      <?php endif ?>
    </form>

  <?php else: ?>
    <h1>Course was not found</h1>
  <?php endif ?>
</div>