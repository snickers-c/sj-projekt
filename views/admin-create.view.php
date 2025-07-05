<div class="header-text my-5">
  <br>
</div>
<div class="container">
  <?php if ($err): ?>
    <br>
    <div class="alert alert-danger" role="alert"><?= $err ?></div>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "testimonials"): ?>
    <h1>Create new testimonial</h1>

    <form method="POST">
      <div class="form-group">
        <label>First Name</label>
        <input name="firstName" type="text" class="form-control" placeholder="First Name" required>
      </div>
      <div class="form-group">
        <label>Last Name</label>
        <input name="lastName" type="text" class="form-control" placeholder="Last Name" required>
      </div>
      <div class="form-group">
        <label>Occupation</label>
        <input name="occupation" type="text" class="form-control" placeholder="Occupation" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <input name="desc" type="text" class="form-control" placeholder="Description" required>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input name="image" type="text" class="form-control" placeholder="Not required">
      </div>
      <div class="form-group">
        <label>Active</label>
        <input name="active" type="text" class="form-control" placeholder="1 or 0" required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "users"): ?>
    <h1>Create new user</h1>

    <form method="POST">
      <div class="form-group">
        <label>First Name</label>
        <input name="firstName" type="text" class="form-control" placeholder="First Name" required>
      </div>
      <div class="form-group">
        <label>Last Name</label>
        <input name="lastName" type="text" class="form-control" placeholder="Last Name" required>
      </div>
      <div class="form-group">
        <label>Role</label>
        <input name="role" type="text" class="form-control" placeholder="Role" required>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input name="email" type="email" class="form-control" placeholder="Email" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input name="password" type="password" class="form-control" placeholder="Password" required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "tags"): ?>
    <h1>Create new tag</h1>

    <form method="POST">
      <div class="form-group">
        <label>Tag name</label>
        <input name="name" type="text" class="form-control" placeholder="Tag name" required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "services"): ?>
    <h1>Create new service</h1>

    <form method="POST">
      <div class="form-group">
        <label>Title</label>
        <input name="title" type="text" class="form-control" placeholder="Title" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <input name="desc" type="text" class="form-control" placeholder="Description" required>
      </div>
      <div class="form-group">
        <label>Button link</label>
        <input name="buttonLink" type="text" class="form-control" placeholder="Not Required">
      </div>
      <div class="form-group">
        <label>Image</label>
        <input name="image" type="text" class="form-control" placeholder="Image" required>
      </div>
      <div class="form-group">
        <label>Active</label>
        <input name="active" type="text" class="form-control" placeholder="1 or 0" required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "events"): ?>
    <h1>Create new event</h1>

    <form method="POST">
      <div class="form-group">
        <label>Title</label>
        <input name="title" type="text" class="form-control" placeholder="Title" required>
      </div>
      <div class="form-group">
        <label>Category</label>
        <input name="category" type="text" class="form-control" placeholder="Category" required>
      </div>
      <div class="form-group">
        <label>Date</label>
        <input name="date" type="text" class="form-control" placeholder="yyyy-mm-dd hh:mm:ss" required>
      </div>
      <div class="form-group">
        <label>Duration</label>
        <input name="duration" type="text" class="form-control" placeholder="Duration" required>
      </div>
      <div class="form-group">
        <label>Price</label>
        <input name="price" type="text" class="form-control" placeholder="Price" required>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input name="image" type="text" class="form-control" placeholder="Image" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <input name="desc" type="text" class="form-control" placeholder="Description" required>
      </div>
      <div class="form-group">
        <label>Active</label>
        <input name="active" type="text" class="form-control" placeholder="1 or 0" required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "courses"): ?>
    <h1>Create new course</h1>

    <form method="POST">
      <div class="form-group">
        <label>Employee ID</label>
        <input name="employee" type="text" class="form-control" placeholder="Employee ID" required>
      </div>
      <div class="form-group">
        <label>Title</label>
        <input name="title" type="text" class="form-control" placeholder="Title" required>
      </div>
      <div class="form-group">
        <label>Price</label>
        <input name="price" type="text" class="form-control" placeholder="Price" required>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input name="image" type="text" class="form-control" placeholder="Image" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <input name="desc" type="text" class="form-control" placeholder="Description" required>
      </div>
      <div class="form-group">
        <label>Active</label>
        <input name="active" type="text" class="form-control" placeholder="1 or 0" required>
      </div>
      <br>
      <h2>Tags:</h2>
      <?php
      $tag = new Tag($db);
      $tagItems = $tag->readTag();

      foreach ($tagItems as $row): ?>
        <div class="form-check">
          <label class="form-check-label"><?= $row['name'] ?></label>
          <input name="tags[]" type="checkbox" class="form-check-input" value="<?= $row['id_tag'] ?>">
        </div>
      <?php endforeach ?>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "employees"): ?>
    <h1>Create new Employee</h1>

    <form method="POST">
      <div class="form-group">
        <label>First Name</label>
        <input name="firstName" type="text" class="form-control" placeholder="First Name" required>
      </div>
      <div class="form-group">
        <label>Last Name</label>
        <input name="lastName" type="text" class="form-control" placeholder="Last Name" required>
      </div>
      <div class="form-group">
        <label>Occupation</label>
        <input name="occupation" type="text" class="form-control" placeholder="Occupation" required>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input name="image" type="text" class="form-control" placeholder="Not required">
      </div>
      <div class="form-group">
        <label>Facebook</label>
        <input name="facebook" type="text" class="form-control" placeholder="Not required">
      </div>
      <div class="form-group">
        <label>Twitter</label>
        <input name="twitter" type="text" class="form-control" placeholder="Not required">
      </div>
      <div class="form-group">
        <label>LinkedIn</label>
        <input name="linkedIn" type="text" class="form-control" placeholder="Not required">
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "qnas"): ?>
    <h1>Create new QnA</h1>

    <form method="POST">
      <div class="form-group">
        <label>Title</label>
        <input name="title" type="text" class="form-control" placeholder="Title" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <input name="desc" type="text" class="form-control" placeholder="Description" required>
      </div>
      <div class="form-group">
        <label>Active</label>
        <input name="active" type="text" class="form-control" placeholder="1 or 0" required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "banners"): ?>
    <h1>Create new banner</h1>

    <form method="POST">
      <div class="form-group">
        <label>Tag</label>
        <input name="tag" type="text" class="form-control" placeholder="Tag" required>
      </div>
      <div class="form-group">
        <label>Title</label>
        <input name="title" type="text" class="form-control" placeholder="Title" required>
      </div>
      <div class="form-group">
        <label>Description</label>
        <input name="desc" type="text" class="form-control" placeholder="Description" required>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input name="image" type="text" class="form-control" placeholder="Image" required>
      </div>
      <div class="form-group">
        <label>Button Link</label>
        <input name="buttonLink" type="text" class="form-control" placeholder="Button Link">
      </div>
      <div class="form-group">
        <label>Active</label>
        <input name="active" type="text" class="form-control" placeholder="1 or 0" required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>

  <?php if (($_GET['tab'] ?? '') == "dates"): ?>
    <h1>Create new date</h1>

    <form method="POST">
      <div class="form-group">
        <label>Select course</label>
        <select name="course" class="form-select" required>
          <?php
          $course = new Course($db);
          $courseItems = $course->readCourse();

          foreach ($courseItems as $row): ?>
            <option value="<?= $row['id_course'] ?>"><?= $row['title'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="form-group">
        <label>Date</label>
        <input name="date" type="text" class="form-control" placeholder="yyyy-mm-dd hh:mm:ss" required>
      </div>
      <div class="form-group">
        <label>Capacity</label>
        <input name="capacity" type="text" class="form-control" placeholder="Capacity" required>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  <?php endif ?>
</div>