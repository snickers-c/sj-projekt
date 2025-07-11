<div class="header-text my-5">
  <br>
</div>
<div class="container">
  <a href="?logout=1" type="button" class="btn btn-primary">Log out</a>
  <br><br>
  <ul class="nav nav-tabs">
    <?php
    $tabItems = [];
    if ($isAdmin) {
      $tabItems = [
        ['label' => 'Users', 'link' => 'users'],
        ['label' => 'Testimonials', 'link' => 'testimonials'],
        ['label' => 'Course tags', 'link' => 'tags'],
        ['label' => 'Services', 'link' => 'services'],
        ['label' => 'Events', 'link' => 'events'],
        ['label' => 'Courses', 'link' => 'courses'],
        ['label' => 'Employees', 'link' => 'employees'],
        ['label' => 'Qna', 'link' => 'qnas'],
        ['label' => 'Banners', 'link' => 'banners'],
        ['label' => 'Dates', 'link' => 'dates'],
        ['label' => 'Orders', 'link' => 'orders'],
        ['label' => 'Event orders', 'link' => 'eventOrders'],
        ['label' => 'Messages', 'link' => 'messages']
      ];
    } else {
      $tabItems = [
        ['label' => 'My courses', 'link' => 'myCourses'],
        ['label' => 'My events', 'link' => 'myEvents']
      ];
    }
    $tabs = new Menu($tabItems);
    echo $tabs->getTabs($_GET['tab'] ?? '');
    ?>
  </ul>
  <br>

  <?php if ($isAdmin): ?>
    <?php if (($_GET['tab'] ?? '') == "testimonials"): ?>
      <h1>Testimonials</h1>
      <a href="admin-create?tab=testimonials">Create</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Creator ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Occupation</th>
            <th>Description</th>
            <th>Active</th>
            <th>Image path</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($testimonialItems as $row):
            $id = $row['id_testimonial']; ?>
            <tr>
              <td><?= $id ?></td>
              <td><?= $row['creator'] ?></td>
              <td><?= $row['first_name'] ?></td>
              <td><?= $row['last_name'] ?></td>
              <td><?= $row['occupation'] ?></td>
              <td><?= $row['description'] ?></td>
              <td><?= $row['active'] ?></td>
              <td><?= $row['image'] ?></td>
              <td><a href="admin-update?tab=testimonials&id=<?= $id ?>">Edit</a></td>
              <td><a href="?tab=testimonials&delete=<?= $id ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "users"): ?>
      <h1>Users</h1>
      <a href="admin-create?tab=users">Create</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Role</th>
            <th>Email</th>
            <th>Created at</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($userItems as $row):
            $id = $row['id_user']; ?>
            <tr>
              <td><?= $id ?></td>
              <td><?= $row['first_name'] ?></td>
              <td><?= $row['last_name'] ?></td>
              <td><?= $row['role'] ?></td>
              <td><?= $row['email'] ?></td>
              <td><?= $row['created_at'] ?></td>
              <td><a href="admin-update?tab=users&id=<?= $id ?>">Edit</a></td>
              <td><a href="?tab=users&delete=<?= $id ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "tags"): ?>
      <h1>Course tags</h1>
      <a href="admin-create?tab=tags">Create</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($tagItems as $row):
            $id = $row['id_tag']; ?>
            <tr>
              <td><?= $id ?></td>
              <td><?= $row['name'] ?></td>
              <td><a href="admin-update?tab=tags&id=<?= $id ?>">Edit</a></td>
              <td><a href="?tab=tags&delete=<?= $id ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "services"): ?>
      <h1>Services</h1>
      <a href="admin-create?tab=services">Create</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Creator ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Button link</th>
            <th>Image</th>
            <th>Active</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($serviceItems as $row):
            $id = $row['id_service']; ?>
            <tr>
              <td><?= $id ?></td>
              <td><?= $row['creator'] ?></td>
              <td><?= $row['title'] ?></td>
              <td><?= $row['description'] ?></td>
              <td><?= $row['button_link'] ?></td>
              <td><?= $row['image'] ?></td>
              <td><?= $row['active'] ?></td>
              <td><a href="admin-update?tab=services&id=<?= $id ?>">Edit</a></td>
              <td><a href="?tab=services&delete=<?= $id ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "events"): ?>
      <h1>Events</h1>
      <a href="admin-create?tab=events">Create</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Creator ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Date</th>
            <th>Duration</th>
            <th>Price</th>
            <th>Image</th>
            <th>Description</th>
            <th>Users count</th>
            <th>Active</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($eventItems as $row):
            $id = $row['id_event']; ?>
            <tr>
              <td><?= $id ?></td>
              <td><?= $row['creator'] ?></td>
              <td><?= $row['title'] ?></td>
              <td><?= $row['category'] ?></td>
              <td><?= $row['date'] ?></td>
              <td><?= $row['duration'] ?></td>
              <td><?= $row['price'] ?></td>
              <td><?= $row['image'] ?></td>
              <td>Check in edit</td>
              <td><?= $row['users_count'] ?></td>
              <td><?= $row['active'] ?></td>
              <td><a href="admin-update?tab=events&id=<?= $id ?>">Edit</a></td>
              <td><a href="?tab=events&delete=<?= $id ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "courses"): ?>
      <h1>Courses</h1>
      <a href="admin-create?tab=courses">Create</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Creator ID</th>
            <th>Employee</th>
            <th>Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Description</th>
            <th>Active</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($courseItems as $row):
            $id = $row['id_course']; ?>
            <tr>
              <td><?= $id ?></td>
              <td><?= $row['creator'] ?></td>
              <td><?= $row['first_name'] . ' ' . $row['last_name'] ?></td>
              <td><?= $row['title'] ?></td>
              <td><?= $row['price'] ?></td>
              <td><?= $row['image'] ?></td>
              <td>Check in edit</td>
              <td><?= $row['active'] ?></td>
              <td><a href="admin-update?tab=courses&id=<?= $id ?>">Edit</a></td>
              <td><a href="?tab=courses&delete=<?= $id ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
          <?php
          ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "employees"): ?>
      <h1>Employees</h1>
      <a href="admin-create?tab=employees">Create</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Occupation</th>
            <th>Image</th>
            <th>Facebook</th>
            <th>Twitter</th>
            <th>LinkedIn</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($employeeItems as $row):
            $id = $row['id_employee']; ?>
            <tr>
              <td><?= $id ?></td>
              <td><?= $row['first_name'] ?></td>
              <td><?= $row['last_name'] ?></td>
              <td><?= $row['occupation'] ?></td>
              <td><?= $row['image'] ?></td>
              <td><?= $row['facebook'] ?></td>
              <td><?= $row['twitter'] ?></td>
              <td><?= $row['linkedin'] ?></td>
              <td><a href="admin-update?tab=employees&id=<?= $id ?>">Edit</a></td>
              <td><a href="?tab=employees&delete=<?= $id ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "qnas"): ?>
      <h1>QnA's</h1>
      <a href="admin-create?tab=qnas">Create</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Creator ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Active</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($qnaItems as $row):
            $id = $row['id_about_us']; ?>
            <tr>
              <td><?= $id ?></td>
              <td><?= $row['creator'] ?></td>
              <td><?= $row['title'] ?></td>
              <td><?= $row['description'] ?></td>
              <td><?= $row['active'] ?></td>
              <td><a href="admin-update?tab=qnas&id=<?= $id ?>">Edit</a></td>
              <td><a href="?tab=qnas&delete=<?= $id ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "banners"): ?>
      <h1>Banners</h1>
      <a href="admin-create?tab=banners">Create</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Creator ID</th>
            <th>Tag</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Button link</th>
            <th>Active</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($bannerItems as $row):
            $id = $row['id_banner']; ?>
            <tr>
              <td><?= $id ?></td>
              <td><?= $row['creator'] ?></td>
              <td><?= $row['tag'] ?></td>
              <td><?= $row['title'] ?></td>
              <td><?= $row['description'] ?></td>
              <td><?= $row['image'] ?></td>
              <td><?= $row['button_link'] ?></td>
              <td><?= $row['active'] ?></td>
              <td><a href="admin-update?tab=banners&id=<?= $id ?>">Edit</a></td>
              <td><a href="?tab=banners&delete=<?= $id ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "dates"): ?>
      <h1>Dates</h1>
      <a href="admin-create?tab=dates">Create</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Course ID</th>
            <th>Course title</th>
            <th>Date</th>
            <th>Capacity</th>
            <th>Slots</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($dateItems as $row):
            $id = $row['id_date']; ?>
            <tr>
              <td><?= $id ?></td>
              <td><?= $row['course'] ?></td>
              <td><?= $row['title'] ?></td>
              <td><?= $row['date'] ?></td>
              <td><?= $row['capacity'] ?></td>
              <td><?= $row['slots'] ?></td>
              <td><a href="admin-update?tab=dates&id=<?= $id ?>">Edit</a></td>
              <td><a href="?tab=dates&delete=<?= $id ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "orders"): ?>
      <h1>Orders</h1>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Title</th>
            <th>Date</th>
            <th>Registered at</th>
            <th>Paid</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($orderItems as $row):
            $id = $row['id_order']; ?>
            <tr>
              <td><?= $id ?></td>
              <td><?= $row['first_name'] ?></td>
              <td><?= $row['last_name'] ?></td>
              <td><?= $row['email'] ?></td>
              <td><?= $row['title'] ?></td>
              <td><?= $row['date'] ?></td>
              <td><?= $row['registered_at'] ?></td>
              <td><?= $row['paid'] ?></td>
              <td><a href="admin-update?tab=orders&id=<?= $id ?>">Edit</a></td>
              <td><a href="?tab=orders&delete=<?= $id . '-' . $row['id_date'] ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "eventOrders"): ?>
      <h1>Event orders</h1>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Title</th>
            <th>Date</th>
            <th>Registered at</th>
            <th>Paid</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($orderItems as $row):
            $id = $row['id_order_event']; ?>
            <tr>
              <td><?= $id ?></td>
              <td><?= $row['first_name'] ?></td>
              <td><?= $row['last_name'] ?></td>
              <td><?= $row['email'] ?></td>
              <td><?= $row['title'] ?></td>
              <td><?= $row['date'] ?></td>
              <td><?= $row['registered_at'] ?></td>
              <td><?= $row['paid'] ?></td>
              <td><a href="admin-update?tab=eventOrders&id=<?= $id ?>">Edit</a></td>
              <td><a href="?tab=eventOrders&delete=<?= $id . '-' . $row['id_event'] ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "messages"): ?>
      <h1>Messages</h1>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Created at</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($messageItems as $row):
            $id = $row['id_message']; ?>
            <tr>
              <td><?= $id ?></td>
              <td><?= $row['first_name'] ?></td>
              <td><?= $row['last_name'] ?></td>
              <td><?= $row['email'] ?></td>
              <td><?= $row['message'] ?></td>
              <td><?= $row['created_at'] ?></td>
              <td><a href="?tab=messages&delete=<?= $id ?>">Delete</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

  <?php else: ?>
    <?php if (($_GET['tab'] ?? '') == "myCourses"): ?>
      <h1>My registered courses</h1>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Lector</th>
            <th>Price</th>
            <th>Date</th>
            <th>Registered at</th>
            <th>Paid</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($orderItems as $row): ?>
            <tr>
              <td><?= $row['title'] ?></td>
              <td><?= $row['first_name'] . ' ' . $row['last_name'] ?></td>
              <td><?= $row['price'] ?></td>
              <td><?= $row['date'] ?></td>
              <td><?= $row['registered_at'] ?></td>
              <td><?= (($row['paid'] == 1) ? 'Yes' : 'no') ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>

    <?php if (($_GET['tab'] ?? '') == "myEvents"): ?>
      <h1>My registered events</h1>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Price</th>
            <th>Date</th>
            <th>Registered at</th>
            <th>Paid</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($orderItems as $row): ?>
            <tr>
              <td><?= $row['title'] ?></td>
              <td><?= $row['price'] ?></td>
              <td><?= $row['date'] ?></td>
              <td><?= $row['registered_at'] ?></td>
              <td><?= (($row['paid'] == 1) ? 'Yes' : 'No') ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>
  <?php endif ?>
</div>