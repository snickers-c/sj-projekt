<?php
include_once("components/header.php");

$id = $_GET['id'];
if (empty($id)) {
  header("Location: /#events");
  exit;
}

$order = new Order($db);
$event = new Event($db);
$validIds = $event->getEventIds();

$eventItem = NULL;
foreach ($validIds as $row) {
  if ($row['id_event'] == $id) {
    $eventItem = $event->findEvent($id);
    break;
  }
}

$err = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($order->createOrderEvent($_SESSION['userID'], $id)) {
    header("Location: admin.php");
    exit;
  } else {
    $err = '
      <div class="alert alert-danger" role="alert">
        Failed to register event to your account, try again later.
      </div>
    ';
  }
}
?>

<div class="header-text my-5">
  <br>
</div>

<div class="container register-course">
  <?php if ($eventItem): ?>
    <h1 class="mb-4"><?php echo $eventItem['title']; ?></h1>

    <span class="category"><?php echo $eventItem['category']; ?></span>

    <h3 class="mt-4 mb-4"><?php echo $eventItem['price']; ?>€</h3>


    <p><?php echo $eventItem['description']; ?></p>

    <?php
    echo $err;
    ?>
    <form method="POST">
      <?php
      $auth = new Authenticate($db);
      if ($auth->isLoggedIn() && $auth->getUserRole() == 1):
        $disabled = '';
        if ($order->isUserRegisteredEvent($id, $_SESSION['userID'])) {
          $disabled = ' disabled';
        }
      ?>
        <button type="submit" class="mt-4 btn btn-primary" <?php echo $disabled; ?>>Register</button>

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

<?php
include_once("components/footer.php");
?>