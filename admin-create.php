<?php
include_once("components/header.php");
$testimonial = new Testimonial($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $occupation = $_POST['occupation'];
  $text = $_POST['text'];
  $image = $_POST['image'];

  try {
    $testimonial->createTestimonial($firstName, $lastName, $occupation, $text, $image);
    header('Location: admin.php');
    exit;
  } catch (PDOException $e) {
    echo "Inserting of testimonial failed " . $e;
    exit;
  }
}
?>
<div class="header-text my-5">
  <br>
</div>
<div class="container">
  <h1>Create new testimonial</h1>

  <form method="POST">
    <div class="form-group">
      <label for="exampleInputEmail1">First Name</label>
      <input name="firstName" type="text" class="form-control" placeholder="First Name" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Last Name</label>
      <input name="lastName" type="text" class="form-control" placeholder="Last Name" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Occupation</label>
      <input name="occupation" type="text" class="form-control" placeholder="Occupation" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Text</label>
      <input name="text" type="text" class="form-control" placeholder="Text" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Image</label>
      <input name="image" type="text" class="form-control" placeholder="Not required">
    </div>

    <button type="submit" class="btn btn-primary mt-2">Submit</button>
  </form>
</div>
<?php
include_once("components/footer.php");
?>