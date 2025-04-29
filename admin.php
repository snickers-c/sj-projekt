<?php
include_once("components/header.php");
$testimonial = new Testimonial($db);
$testimonialItems = $testimonial->readTestimonial();

if (isset($_GET['delete'])) {
  if ($testimonial->deleteTestimonial($_GET['delete'])) {
    header("Location: admin.php");
    exit;
  } else {
    echo "Record failed to be deleted.";
  }
}

?>
<div class="header-text my-5">
  <br>
</div>
<div class="container">
  <h1>Testimonials</h1>
  <a href="admin-create.php">Create</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Occupation</th>
        <th>Text</th>
        <th>Image path</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($testimonialItems as $row) {
        $id = $row['id_testimonial'];
        echo '<tr>';
        echo '<td>' . $id . '</td>';
        echo '<td>' . $row['first_name'] . '</td>';
        echo '<td>' . $row['last_name'] . '</td>';
        echo '<td>' . $row['occupation'] . '</td>';
        echo '<td>' . $row['text'] . '</td>';
        echo '<td>' . $row['image'] . '</td>';
        echo '<td><a href="admin-update.php?id=' . $id . '">Edit</a></td>';
        echo '<td><a href="?delete=' . $id . '">Delete</a></td>';
        echo '</tr>';
      }
      ?>
    </tbody>
  </table>
</div>
<?php
include_once("components/footer.php");
?>