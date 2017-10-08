<?php include_once 'header.php' ?>

<!-- row is a bootstrap class used to define a row in the screen which can contains columns like a table -->
<div class="row">
  <!-- section which define the left side of the page used for profile, contact and so on -->
  <!-- using bootstrap grid system col-md-4 to use 4 columns of the 12 -->
  <section class="left-section col-md-4">

    <div class="profile-container">
      <img class="profile" src="<?php echo $IMG_PATH.$img_profile ?>" alt="" />
      <p class="name"><?php echo $name ?></p>
      <p class="tagline"><?php echo $occupation ?></p>
      <p class="tagline location"><i class="fa fa-map-marker"></i><a href="http://maps.google.com/?q=M4K2S6" target="_blank"><?php echo $city ?>, <?php echo $state ?></a></p>
    </div>

    <div class="contact-container">
      <p class="email"><i class="fa fa-envelope"></i><?php echo $email ?></p>
      <p class="phone"><i class="fa fa-phone"></i><?php echo $phone ?></p>
      <p class="linkedin"><i class="fa fa-linkedin"></i><a href="<?php echo $linkedin ?>" target="_blank">linkedin.com/pedrofg</a></p>
      <p class="github"><i class="fa fa-github"></i><a href="<?php echo $github ?>" target="_blank">github.com/pedrofg</a></p>
    </div>

    <div class="education-container">
      <p class="title">EDUCATION</p>

      <?php
        $educations = $db->query('SELECT * FROM education WHERE profile_id = 1');
        foreach ($educations as $education) :
          $date_start = date("Y", strtotime($education['date_start']));
          $date_end = date("Y", strtotime($education['date_end']));
      ?>
          <p class="education-name"><?php echo $education['level'] ?> in <?php echo $education['name'] ?></p>
          <p class="education-school"><?php echo $education['institution'] ?></p>
          <p class="education-year"><?php echo $date_start ?> - <?php echo $date_end ?></p>
      <?php endforeach; ?>

    </div>

    <div class="language-container">
      <p class="title">Languages</p>

      <?php
        $languages = $db->query('SELECT * FROM language as l INNER JOIN language_profile as lp ON l.id = lp.language_id WHERE profile_id = 1');
        foreach ($languages as $language) :
      ?>
          <p class="language-name"><?php echo $language['name'] ?> <span class="language-level">(<?php echo $language['level'] ?>)</span></p>
      <?php endforeach; ?>



    </div>

  </section>
  <!-- Section that represents the main data in the resume. Using 8 columns of the 12 of the bootstrap grid system -->
  <section class="right-section col-md-8">

    <div class="about-container">
      <p class="right-title"><i class="fa fa-info-circle"></i>About</p>
      <p class="about-text">
        <?php echo $about ?>
      </p>
    </div>

    <div class="work-container">
      <p class="right-title"><i class="fa fa-briefcase" aria-hidden="true"></i>Work Experience</p>
      <ul class="work-ul">
        <?php
          $works = $db->query('SELECT * FROM work WHERE profile_id = 1');
          foreach ($works as $work) :
            $date_start = date("Y", strtotime($work['date_start']));
            if (isset($work['date_end'])) {
              $date_end = date("Y", strtotime($work['date_end']));
            } else {
              $date_end = 'PRESENT';
            }
        ?>

            <li class="work-li">
              <div class="work-circle"></div>
              <p class="work-date"><?php echo $date_start ?> - <?php echo $date_end ?></p>
              <p class="work-position"><?php echo $work['position'] ?></p>
              <p class="work-company"><?php echo $work['company'] ?></p>

                <?php
                  $work_links = $db->query('SELECT * FROM work_link WHERE work_id = '.$work['id']);
                  foreach ($work_links as $link) :
                ?>

                  <a class="work-project" target="_blank" href="<?php echo $link['link'] ?>"><?php echo $link['name'] ?></a>
                <?php endforeach; ?>


            </li>


        <?php endforeach; ?>
      </ul>
    </div>

    <div class="skills-container">
      <p class="right-title"><i class="fa fa-graduation-cap"></i>Skills</p>

      <?php
        $skills = $db->query('SELECT * FROM skill as s INNER JOIN skill_profile as sp ON s.id = sp.skill_id WHERE sp.profile_id = 1');
        foreach ($skills as $skill) :
      ?>
        <div class="skill">
          <p class="skill-name"><?php echo $skill['name'] ?></p>
          <div class="skill-progress years-<?php echo $skill['years'] ?>">
          </div>
          <span class="skill-year"><?php echo $skill['years'] ?> Years</span>
        </div>

      <?php endforeach; ?>

    </div>

  </section>
</div>
<!-- Another row to represent the bottom part of the resume since the first row is full by the 2 sections above -->
<div class="row">
  <!-- Section that represents the portfolio area of the resume using all the columns of the bootstrap grid system -->
  <section class="bottom-section col-md-12">
    <p class="bottom-title"><i class="fa fa-paint-brush" aria-hidden="true"></i>Portfolio</p>
    <!-- Using owl carousel classes to make the paginated list for us -->
    <div class="owl-carousel owl-theme">
      <?php
        $portfolios = $db->query('SELECT * FROM portfolio WHERE profile_id = 1');
        foreach ($portfolios as $portfolio) :
      ?>
        <img class="profile" src="<?php echo $IMG_PATH.$portfolio['img_location'] ?>" alt="" />

      <?php endforeach; ?>
    </div>
  </section>
</div>

<div class="row">
  <section class="bottom-section col-md-12" style="margin-top: 30px;">

    <p class="bottom-title"><i class="fa fa-commenting-o" aria-hidden="true"></i>Contact Me</p>

    <form id="form-contact" action="mailto:<?php echo $email ?>" target="_blank" enctype="text/plain" method="post" style="margin: 50px;">
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input id="input-name" type="text" class="form-control" name="name" maxlength="100" placeholder="Name">
      </div>

      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        <input id="input-email" type="text" class="form-control" name="email" maxlength="100" placeholder="Email">
      </div>

      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
        <textarea id="input-message" class="form-control" rows="5" placeholder="Message" maxlength="500" name="message" style="resize: none;"></textarea>
      </div>

      <div class="form-group text-right">
        <button type="submit" class="btn btn-default float-right">Send Email</button>
      </div>
    </form>
  </section>

</div>

<?php include_once 'footer.php' ?>