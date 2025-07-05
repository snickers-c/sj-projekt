<div class="main-banner" id="top">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="owl-carousel owl-banner">
          <?php
          $banner = new Banner($db);
          $bannerItems = $banner->readBanner();

          foreach ($bannerItems as $row):
            if ($row['active'] == 0) continue; ?>
            <div class="item item-<?= $row['id_banner'] ?>">
              <img src="<?= $row['image'] ?>" alt="<?= $row['title'] ?>">
              <div class="header-text">
                <span class="category"><?= $row['tag'] ?></span>
                <h2><?= $row['title'] ?></h2>
                <p><?= $row['description'] ?></p>
                <div class="buttons">
                  <div class="main-button">
                    <a href="<?= $row['button_link'] ?>">Request Demo</a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="services section" id="services">
  <div class="container">
    <div class="row">
      <?php
      $service = new Service($db);
      $serviceItems = $service->readService();

      foreach ($serviceItems as $row):
        if ($row['active'] == 0) continue; ?>
        <div class="col-lg-4 col-md-6">
          <div class="service-item">
            <div class="icon">
              <img src="<?= $row['image'] ?>" alt="<?= $row['title'] ?>">
            </div>
            <div class="main-content">
              <h4><?= $row['title'] ?></h4>
              <p><?= $row['description'] ?></p>
              <div class="main-button">
                <a href="<?= $row['button_link'] ?>">Read More</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>

<div class="section about-us">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-1">
        <div class="accordion" id="accordionExample">
          <?php
          $qna = new Qna($db);
          $qnaItems = $qna->readQna();

          foreach ($qnaItems as $row):
            if ($row['active'] == 0) continue;
            $id = $row['id_about_us']; ?>
            <div class="accordion-item">
              <h2 class="accordion-header" id="heading<?= $id ?>">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapse<?= $id ?>" aria-expanded="false" aria-controls="collapse<?= $id ?>">
                  <?= $row['title'] ?>
                </button>
              </h2>
              <div id="collapse<?= $id ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $id ?>"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <?= $row['description'] ?>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
      <div class="col-lg-5 align-self-center">
        <div class="section-heading">
          <h6>About Us</h6>
          <h2>What make us the best academy online?</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Quis ipsum suspendisse ultrices gravid risus commodo.</p>
          <div class="main-button">
            <a href="#">Discover More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="section courses" id="courses">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="section-heading">
          <h6>Latest Courses</h6>
          <h2>Latest Courses</h2>
        </div>
      </div>
    </div>
    <ul class="event_filter">
      <li>
        <a class="is_active" href="#!" data-filter="*">Show All</a>
      </li>
      <?php
      $tag = new Tag($db);
      $tagItems = $tag->readTag();

      foreach ($tagItems as $row): ?>
        <li>
          <a href="#!" data-filter=".<?= $row['name'] ?>"><?= $row['name'] ?></a>
        </li>
      <?php endforeach ?>
    </ul>
    <div class="row event_box">

      <?php
      $course = new Course($db);
      $courseItems = $course->readCourse();

      foreach ($courseItems as $row):
        if ($row['active'] == 0) continue;
        $tags = $row['tags'];
        $spaceExists = strpos($tags, ' ');
        $firstTag = substr($tags, 0, $spaceExists ? $spaceExists : strlen($tags)) ?>

        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 <?= $row['tags'] ?>">
          <div class="events_item">
            <div class="thumb">
              <a href="register-course.php?id=<?= $row['id_course'] ?>"><img src="<?= $row['image'] ?>"
                  alt="<?= $row['title'] ?>"></a>
              <span class="category"><?= $firstTag ?></span>
              <span class="price">
                <h6><?= $row['price'] ?><em>€</em></h6>
              </span>
            </div>
            <div class="down-content">
              <span class="author"><?= $row['first_name'] . ' ' . $row['last_name'] ?></span>
              <h4><?= $row['title'] ?></h4>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>

<div class="section fun-facts">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="wrapper">
          <div class="row">
            <div class="col-lg-3 col-md-6">
              <div class="counter">
                <h2 class="timer count-title count-number" data-to="150" data-speed="1000"></h2>
                <p class="count-text ">Happy Students</p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="counter">
                <h2 class="timer count-title count-number" data-to="804" data-speed="1000"></h2>
                <p class="count-text ">Course Hours</p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="counter">
                <h2 class="timer count-title count-number" data-to="50" data-speed="1000"></h2>
                <p class="count-text ">Employed Students</p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="counter end">
                <h2 class="timer count-title count-number" data-to="15" data-speed="1000"></h2>
                <p class="count-text ">Years Experience</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="team section" id="team">
  <div class="container">
    <div class="empl row"">
      <?php
      $employee = new Employee($db);
      $employeeItems = $employee->readEmployee();

      $i = 0;
      $reachedClosure = false;
      foreach ($employeeItems as $row): ?>
    <div class=" col-lg-3 col-md-6">
      <div class="team-member">
        <div class="main-content">
          <img src="<?= $row['image'] ?>" alt="<?= $row['first_name'] ?> <?= $row['last_name'] ?>">
          <span class="category"><?= $row['occupation'] ?></span>
          <h4><?= $row['first_name'] ?> <?= $row['last_name'] ?></h4>
          <ul class="social-icons">
            <li><a href="<?= $row['facebook'] ?>"><i class="fab fa-facebook"></i></a></li>
            <li><a href="<?= $row['twitter'] ?>"><i class="fab fa-twitter"></i></a></li>
            <li><a href="<?= $row['linkedin'] ?>"><i class="fab fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <?php
        $i++;
        if ($i == 4):
          $reachedClosure = true;
          $i = 0;
          if ($reachedClosure): ?>
  </div>
  <div class="empl row">
  <?php $reachedClosure = false;
          endif ?>
<?php endif ?>
<?php endforeach ?>

<?php if ($i > 0 && $reachedClosure == false): ?>
  </div>
<?php endif ?>
</div>
</div>

<div class=" section testimonials">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <div class="owl-carousel owl-testimonials">
          <?php
          $testimonial = new Testimonial($db);
          $testimonialItems = $testimonial->readTestimonial();

          foreach ($testimonialItems as $row):
            if ($row['active'] == 0) continue; ?>
            <div class="item">
              <p><?= $row["description"] ?></p>
              <div class="author">
                <img src="<?= $row["image"] ?>" alt="">
                <span class="category"><?= $row["occupation"] ?></span>
                <h4><?= $row["first_name"] . ' ' . $row["last_name"] ?></h4>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
      <div class="col-lg-5 align-self-center">
        <div class="section-heading">
          <h6>TESTIMONIALS</h6>
          <h2>What they say about us?</h2>
          <p>You can search free CSS templates on Google using different keywords such as templatemo portfolio,
            templatemo gallery, templatemo blue color, etc.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="section events" id="events">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="section-heading">
          <h6>Schedule</h6>
          <h2>Upcoming Events</h2>
        </div>
      </div>

      <?php
      $event = new Event($db);
      $eventItems = $event->readEvent();

      foreach ($eventItems as $row):
        if ($row['active'] == 0) continue; ?>
        <div class="col-lg-12 col-md-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-3">
                <div class="image">
                  <img src="<?= $row['image'] ?>" alt="<?= $row['title'] ?>">
                </div>
              </div>
              <div class="col-lg-9">
                <ul>
                  <li>
                    <span class="category"><?= $row['category'] ?></span>
                    <h4><?= $row['title'] ?></h4>
                  </li>
                  <li>
                    <span>Date:</span>
                    <h6><?= $row['date'] ?></h6>
                  </li>
                  <li>
                    <span>Duration:</span>
                    <h6><?= $row['duration'] ?></h6>
                  </li>
                  <li>
                    <span>Price:</span>
                    <h6><?= $row['price'] ?>€</h6>
                  </li>
                </ul>
                <a href="register-event.php?id=<?= $row['id_event'] ?>"><i class="fa fa-angle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>

<div class="contact-us section" id="contact">
  <?php if ($err): ?>
    <div class="alert alert-danger" role="alert">
      <?= $err ?>
    </div>
  <?php endif ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-6  align-self-center">
        <div class="section-heading">
          <h6>Contact Us</h6>
          <h2>Feel free to contact us anytime</h2>
          <p>Thank you for choosing our templates. We provide you best CSS templates at absolutely 100% free of
            charge.
            You may support us by sharing our website to your friends.</p>
          <div class="special-offer">
            <span class="offer">off<br><em>50%</em></span>
            <h6>Valide: <em>24 April 2036</em></h6>
            <h4>Special Offer <em>50%</em> OFF!</h4>
            <a href="#"><i class="fa fa-angle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="contact-us-content">
          <form id="contact-form" method="POST">
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                  <input type="text" name="firstName" placeholder="Your First Name..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="text" name="lastName" placeholder="Your Last Name..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="email" name="email" placeholder="Your E-mail..." required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <textarea name="message" placeholder="Your Message"></textarea required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="orange-button">Send Message Now</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>