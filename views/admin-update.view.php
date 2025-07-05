<div class="header-text my-5">
  <br>
</div>
<div class="container">
  <?php if (($_GET['tab'] ?? '') == "testimonials"): ?>
    <h1>Update testimonial</h1>

    <form method="POST">
      <div class="form-group">
        <label>First Name</label>
        <input value="<?= $current['first_name'] ?? '' ?>" name="firstName" type="text" class="form-control"
          placeholder="First Name" required>
      </div>
      <div class="form-group">
        <label>Last Name</label>
        <input value="<?= $current['last_name'] ?? '' ?>" name="lastName" type="text" class="form-control"
          placeholder="Last Name" required>
      </div>
      <div class="form-group">
        <label>Occupation</label>
        <input value="<?= $current['occupation'] ?? '' ?>" name="occupation" type="text" class="form-control"
          placeholder="Occupation" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <input value="<?= $current['description'] ?? '' ?>" name="desc" type="text" class="form-control"
          placeholder="Description" required>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input value="<?= $current['image'] ?? '' ?>" name="image" type="text" class="form-control"
          placeholder="Not required">
      </div>
      <div class="form-group">
        <label>Active</label>
        <input value="<?= $current['active'] ?? '' ?>" name="active" type="text" class="form-control" placeholder="1 or 0"
          required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "users"): ?>
    <h1>Update user</h1>

    <form method="POST">
      <div class="form-group">
        <label>First Name</label>
        <input value="<?= $current['first_name'] ?? '' ?>" name="firstName" type="text" class="form-control"
          placeholder="First Name" required>
      </div>
      <div class="form-group">
        <label>Last Name</label>
        <input value="<?= $current['last_name'] ?? '' ?>" name="lastName" type="text" class="form-control"
          placeholder="Last Name" required>
      </div>
      <div class="form-group">
        <label>Role</label>
        <input value="<?= $current['role'] ?? '' ?>" name="role" type="text" class="form-control" placeholder="Role"
          required>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input value="<?= $current['email'] ?? '' ?>" name="email" type="email" class="form-control" placeholder="Email"
          required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "tags"): ?>
    <h1>Update course tag</h1>

    <form method="POST">
      <div class="form-group">
        <label>Tag name</label>
        <input value="<?= $current['name'] ?? '' ?>" name="name" type="text" class="form-control" placeholder="Tag name"
          required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "services"): ?>
    <h1>Update service</h1>

    <form method="POST">
      <div class="form-group">
        <label>Title</label>
        <input value="<?= $current['title'] ?? '' ?>" name="title" type="text" class="form-control" placeholder="Title"
          required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <input value="<?= $current['description'] ?? '' ?>" name="desc" type="text" class="form-control"
          placeholder="Description" required>
      </div>
      <div class="form-group">
        <label>Button link</label>
        <input value="<?= $current['button_link'] ?? '' ?>" name="buttonLink" type="text" class="form-control"
          placeholder="Not Required">
      </div>
      <div class="form-group">
        <label>Image</label>
        <input value="<?= $current['image'] ?? '' ?>" name="image" type="text" class="form-control" placeholder="Image"
          required>
      </div>
      <div class="form-group">
        <label>Active</label>
        <input value="<?= $current['active'] ?? '' ?>" name="active" type="text" class="form-control" placeholder="1 or 0"
          required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "events"): ?>
    <h1>Update event</h1>

    <form method="POST">
      <div class="form-group">
        <label>Title</label>
        <input value="<?= $current['title'] ?? '' ?>" name="title" type="text" class="form-control" placeholder="Title"
          required>
      </div>
      <div class="form-group">
        <label>Category</label>
        <input value="<?= $current['category'] ?? '' ?>" name="category" type="text" class="form-control"
          placeholder="Category" required>
      </div>
      <div class="form-group">
        <label>Date</label>
        <input value="<?= $current['date'] ?? '' ?>" name="date" type="text" class="form-control"
          placeholder="yyyy-mm-dd hh:mm:ss" required>
      </div>
      <div class="form-group">
        <label>Duration</label>
        <input value="<?= $current['duration'] ?? '' ?>" name="duration" type="text" class="form-control"
          placeholder="Duration" required>
      </div>
      <div class="form-group">
        <label>Price</label>
        <input value="<?= $current['price'] ?? '' ?>" name="price" type="text" class="form-control" placeholder="Price"
          required>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input value="<?= $current['image'] ?? '' ?>" name="image" type="text" class="form-control" placeholder="Image"
          required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <input value="<?= $current['description'] ?? '' ?>" name="desc" type="text" class="form-control"
          placeholder="Description" required>
      </div>
      <div class="form-group">
        <label>Active</label>
        <input value="<?= $current['active'] ?? '' ?>" name="active" type="text" class="form-control" placeholder="1 or 0"
          required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "courses"): ?>
    <h1>Update course</h1>

    <form method="POST">
      <div class="form-group">
        <label>Employee ID</label>
        <input value="<?= $current['employee'] ?? '' ?>" name="employee" type="text" class="form-control"
          placeholder="Employee ID" required>
      </div>
      <div class="form-group">
        <label>Title</label>
        <input value="<?= $current['title'] ?? '' ?>" name="title" type="text" class="form-control" placeholder="Title"
          required>
      </div>
      <div class="form-group">
        <label>Price</label>
        <input value="<?= $current['price'] ?? '' ?>" name="price" type="text" class="form-control" placeholder="Price"
          required>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input value="<?= $current['image'] ?? '' ?>" name="image" type="text" class="form-control" placeholder="Image"
          required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <input value="<?= $current['description'] ?? '' ?>" name="desc" type="text" class="form-control"
          placeholder="Description" required>
      </div>
      <div class="form-group">
        <label>Active</label>
        <input value="<?= $current['active'] ?? '' ?>" name="active" type="text" class="form-control" placeholder="1 or 0"
          required>
      </div>
      <br>
      <h2>Tags:</h2>
      <?php
      $tag = new Tag($db);
      $tagItems = $tag->readTag();
      $courseTags = $course->readCourseTags($id);

      $currentTags = [];
      foreach ($courseTags as $row) {
        $currentTags[] = $row['name'];
      }

      $numberOfTags = count($currentTags);
      $i = 0;
      foreach ($tagItems as $row):
        $checked = '';
        if ($i < $numberOfTags && $currentTags[$i] == $row['name']) {
          $checked = 'checked';
          $i++;
        } ?>
        <div class="form-check">
          <label class="form-check-label"><?= $row['name'] ?></label>
          <input name="tags[]" type="checkbox" class="form-check-input" value="<?= $row['id_tag'] . '" ' . $checked ?>>
        </div>
      <?php endforeach ?>

      <button type=" submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "employees"): ?>
    <h1>Update Employee</h1>

    <form method="POST">
      <div class="form-group">
        <label>First Name</label>
        <input value="<?= $current['first_name'] ?? '' ?>" name="firstName" type="text" class="form-control"
          placeholder="First Name" required>
      </div>
      <div class="form-group">
        <label>Last Name</label>
        <input value="<?= $current['last_name'] ?? '' ?>" name="lastName" type="text" class="form-control"
          placeholder="Last Name" required>
      </div>
      <div class="form-group">
        <label>Occupation</label>
        <input value="<?= $current['occupation'] ?? '' ?>" name="occupation" type="text" class="form-control"
          placeholder="Occupation" required>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input value="<?= $current['image'] ?? '' ?>" name="image" type="text" class="form-control"
          placeholder="Not required">
      </div>
      <div class="form-group">
        <label>Facebook</label>
        <input value="<?= $current['facebook'] ?? '' ?>" name="facebook" type="text" class="form-control"
          placeholder="Not required">
      </div>
      <div class="form-group">
        <label>Twitter</label>
        <input value="<?= $current['twitter'] ?? '' ?>" name="twitter" type="text" class="form-control"
          placeholder="Not required">
      </div>
      <div class="form-group">
        <label>LinkedIn</label>
        <input value="<?= $current['linkedin'] ?? '' ?>" name="linkedIn" type="text" class="form-control"
          placeholder="Not required">
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "qnas"): ?>
    <h1>Update QnA</h1>

    <form method="POST">
      <div class="form-group">
        <label>Title</label>
        <input value="<?= $current['title'] ?? '' ?>" name="title" type="text" class="form-control" placeholder="Title"
          required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <input value="<?= $current['description'] ?? '' ?>" name="desc" type="text" class="form-control"
          placeholder="Description" required>
      </div>
      <div class="form-group">
        <label>Active</label>
        <input value="<?= $current['active'] ?? '' ?>" name="active" type="text" class="form-control" placeholder="1 or 0"
          required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "banners"): ?>
    <h1>Update banner</h1>

    <form method="POST">
      <div class="form-group">
        <label>Tag</label>
        <input value="<?= $current['tag'] ?? '' ?>" name="tag" type="text" class="form-control" placeholder="Tag"
          required>
      </div>
      <div class="form-group">
        <label>Title</label>
        <input value="<?= $current['title'] ?? '' ?>" name="title" type="text" class="form-control" placeholder="Title"
          required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <input value="<?= $current['description'] ?? '' ?>" name="desc" type="text" class="form-control"
          placeholder="Description" required>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input value="<?= $current['image'] ?? '' ?>" name="image" type="text" class="form-control" placeholder="Image"
          required>
      </div>
      <div class="form-group">
        <label>Button Link</label>
        <input value="<?= $current['button_link'] ?? '' ?>" name="buttonLink" type="text" class="form-control"
          placeholder="Button Link" required>
      </div>
      <div class="form-group">
        <label>Active</label>
        <input value="<?= $current['active'] ?? '' ?>" name="active" type="text" class="form-control" placeholder="1 or 0"
          required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "dates"): ?>
    <h1>Update date</h1>

    <form method="POST">
      <div class="form-group">
        <label>Select course</label>
        <select name="course" class="form-select" required>
          <?php
          $course = new Course($db);
          $courseItems = $course->readCourse();

          foreach ($courseItems as $row): ?>
            <option value="<?= $row['id_course'] ?>" <?= (($row['id_course'] == $current['course']) ? 'selected' : '') ?>>
              <?= $row['title'] ?>
            </option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="form-group">
        <label>Date</label>
        <input value="<?= $current['date'] ?? '' ?>" name="date" type="text" class="form-control"
          placeholder="yyyy-mm-dd hh:mm:ss" required>
      </div>
      <div class="form-group">
        <label>Capacity</label>
        <input value="<?= $current['capacity'] ?? '' ?>" name="capacity" type="text" class="form-control"
          placeholder="Capacity" required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "orders"): ?>
    <h1>Update order</h1>

    <form method="POST">
      <div class="form-group">
        <label>Paid</label>
        <input value="<?= $current['paid'] ?? '' ?>" name="paid" type="text" class="form-control" placeholder="1 or 0"
          required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "eventOrders"): ?>
    <h1>Update event order</h1>

    <form method="POST">
      <div class="form-group">
        <label>Paid</label>
        <input value="<?= $current['paid'] ?? '' ?>" name="paid" type="text" class="form-control" placeholder="1 or 0"
          required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>
</div>