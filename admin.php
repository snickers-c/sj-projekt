<?php
include_once("components/header.php");
$testimonial = new Testimonial($db);
$testimonialItems = $testimonial->readTestimonial();

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
        echo '<tr>';
        echo '<td>' . $row['id_testimonial'] . '</td>';
        echo '<td>' . $row['first_name'] . '</td>';
        echo '<td>' . $row['last_name'] . '</td>';
        echo '<td>' . $row['occupation'] . '</td>';
        echo '<td>' . $row['text'] . '</td>';
        echo '<td>' . $row['image'] . '</td>';
        echo '</tr>';
      }
      ?>
    </tbody>
  </table>
</div>
<?php
include_once("components/footer.php");
?>