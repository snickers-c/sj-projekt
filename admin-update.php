<?php
include_once("components/header.php");
$testimonial = new Testimonial($db);

$id = $_GET['id'];
$currentTestimonial;
if (isset($id)) {
  $currentTestimonial = $testimonial->findTestimonial($id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $occupation = $_POST['occupation'];
  $text = $_POST['text'];
  $image = $_POST['image'];
  if ($testimonial->updateTestimonial($id, $firstName, $lastName, $occupation, $text, $image)) {
    header("Location: admin.php");
    exit;
  } else {
    echo "Update of data failed.";
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
      <input value="<?php echo $currentTestimonial['first_name'] ?? '' ?>" name="firstName" type="text"
        class="form-control" placeholder="First Name" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Last Name</label>
      <input value="<?php echo $currentTestimonial['last_name'] ?? '' ?>" name="lastName" type="text"
        class="form-control" placeholder="Last Name" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Occupation</label>
      <input value="<?php echo $currentTestimonial['occupation'] ?? '' ?>" name="occupation" type="text"
        class="form-control" placeholder="Occupation" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Text</label>
      <input value="<?php echo $currentTestimonial['text'] ?? '' ?>" name="text" type="text" class="form-control"
        placeholder="Text" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Image</label>
      <input value="<?php echo $currentTestimonial['image'] ?? '' ?>" name="image" type="text" class="form-control"
        placeholder="Not required">
    </div>

    <button type="submit" class="btn btn-primary mt-2">Submit</button>
  </form>
</div>
<?php
include_once("components/footer.php");
?>