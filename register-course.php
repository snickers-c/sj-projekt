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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $date = $_POST['date'];
}
?>

<div class="header-text my-5">
  <br>
</div>

<div class="container register-course">
  <?php if ($courseItem): ?>
  <h1 class="mb-4"><?php echo $courseItem['title']; ?></h1>
  <?php
    $courseTags = $course->readCourseTags($id);

    foreach ($courseTags as $tag) {
      echo '<span class="category">' . $tag['name'] . '</span>';
    }
    ?>

  <h3 class="mt-4 mb-4"><?php echo $courseItem['price']; ?>€</h3>


  <p><?php echo $courseItem['description']; ?></p>

  <h2>Lector:</h2>
  <?php
    $employee = new Employee($db);
    $employeeId = $courseItem['employee'];
    $employeeItem = $employee->findEmployee($employeeId);

    if ($employeeItem) {
      echo '
        <div class="empl col-lg-3 col-md-6">
          <div class="team-member">
            <div class="main-content">
              <img src="' . $employeeItem['image'] . '" alt="' . $employeeItem['first_name'] . ' ' . $employeeItem['last_name'] . '">
              <span class="category">' . $employeeItem['occupation'] . '</span>
              <h4>' . $employeeItem['first_name'] . ' ' . $employeeItem['last_name'] . '</h4>
              <ul class="social-icons">
                <li><a href="' . $employeeItem['facebook'] . '"><i class="fab fa-facebook"></i></a></li>
                <li><a href="' . $employeeItem['twitter'] . '"><i class="fab fa-twitter"></i></a></li>
                <li><a href="' . $employeeItem['linkedin'] . '"><i class="fab fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      ';
    }
    ?>

  <h2 class="mt-4">Available dates:</h2>
  <form method="POST">
    <?php
      $dateObject = new Date($db);
      $dateItems = $dateObject->readCourseDates($id);
      foreach ($dateItems as $row) {
        $trimmedDate = substr($row['date'], 0, 10);
        echo '
          <div class="form-check">
            <input class="form-check-input" value="' . $row['id_date'] . '" type="radio" name="date">
            <label class="form-check-label">
              ' . $trimmedDate . ' (' . $row['slots'] . '/' . $row['capacity'] . ' slots available)
            </label>
          </div>
        ';
      }
      ?>

    <?php
      $auth = new Authenticate($db);
      if ($auth->isLoggedIn()): ?>
    <button type="submit" class="mt-4 btn btn-primary">Register</button>

    <?php else: ?>
    <div class="mt-4 alert alert-primary" role="alert">
      To register a course, you have to create account
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