<?php
include_once("components/header.php");

$id = $_GET['id'];
if (empty($id)) {
  header("Location: /#courses");
  exit;
}

$course = new Course($db);
$validIds = $course->getCourseIds();

$courseItem = NULL;
foreach ($validIds as $row) {
  if ($row['id_course'] == $id) {
    $courseItem = $course->findCourse($id);
    break;
  }
}

$err = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $date = $_POST['date'];

  $order = new Order($db);
  if ($order->createOrder($_SESSION['userID'], $date)) {
    header("Location: admin.php?tab=myCourses");
    exit;
  } else {
    $err = 'Failed to register course to your account, try again later.';
  }
}
?>

<div class="header-text my-5">
  <br>
</div>

<div class="container register-course">
  <?php if ($courseItem): ?>
    <h1 class="mb-4"><?php echo $courseItem['title'] ?></h1>

    <?php
    $courseTags = $course->readCourseTags($id);

    foreach ($courseTags as $tag): ?>
      <span class="category"><?php echo $tag['name'] ?></span>
    <?php endforeach ?>

    <h3 class="mt-4 mb-4"><?php echo $courseItem['price'] ?>€</h3>


    <p><?php echo $courseItem['description'] ?></p>

    <h2>Lector:</h2>
    <?php
    $employee = new Employee($db);
    $employeeId = $courseItem['employee'];
    $employeeItem = $employee->findEmployee($employeeId);

    if ($employeeItem): ?>
      <div class="empl col-lg-3 col-md-6">
        <div class="team-member">
          <div class="main-content">
            <img src="<?php echo $employeeItem['image'] ?>"
              alt="<?php echo $employeeItem['first_name'] . $employeeItem['last_name'] ?>">
            <span class="category"><?php echo $employeeItem['occupation'] ?></span>
            <h4><?php echo $employeeItem['first_name'] . $employeeItem['last_name'] ?></h4>
            <ul class="social-icons">
              <li><a href="<?php echo $employeeItem['facebook'] ?>"><i class="fab fa-facebook"></i></a></li>
              <li><a href="<?php echo $employeeItem['twitter'] ?>"><i class="fab fa-twitter"></i></a></li>
              <li><a href="<?php echo $employeeItem['linkedin'] ?>"><i class="fab fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    <?php endif ?>

    <h2 class="mt-4">Available dates:</h2>
    <?php if ($err): ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $err ?>
      </div>
    <?php endif ?>

    <form method="POST">
      <?php
      $dateObject = new Date($db);
      $dateItems = $dateObject->readCourseDates($id);

      foreach ($dateItems as $row):
        $trimmedDate = substr($row['date'], 0, 10); ?>
        <div class="form-check">
          <input class="form-check-input" value="<?php echo $row['id_date'] ?>" type="radio" name="date" required>
          <label class="form-check-label">
            <?php echo $trimmedDate . ' (' . $row['slots'] . '/' . $row['capacity'] . ' slots available)' ?>
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

        <a href="signup.php">sign up</a>
      <?php endif ?>
    </form>

  <?php else: ?>
    <h1>Course was not found</h1>
  <?php endif ?>
</div>

<?php
include_once("components/footer.php");
?>