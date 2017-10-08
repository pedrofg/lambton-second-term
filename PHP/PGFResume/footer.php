    <!-- Using fixed footer to always show to the user needed contact info -->
    <footer>
      <img class="footer-profile" src="<?php echo $IMG_PATH.$img_profile ?>" alt="" />
      <audio class="footer-audio" src="resources/resume.mp3" controls></audio>

      <span class="footer-btn-video"><i class="fa fa-video-camera" aria-hidden="true" data-toggle="modal" data-target="#modal-video"></i></span>

      <div class="div-contact">
        <p class="email"><i class="fa fa-envelope"></i><?php echo $email ?></p>
        <p class="phone"><i class="fa fa-phone"></i><?php echo $phone ?></p>
      </div>
      <div class="div-contact">
        <p class="linkedin"><i class="fa fa-linkedin"></i><a href="<?php echo $linkedin ?>" target="_blank">linkedin.com/pedrofg</a></p>
        <p class="github"><i class="fa fa-github"></i><a href="<?php echo $github ?>" target="_blank">github.com/pedrofg</a></p>
      </div>
    </footer>

    <!-- Modal -->
    <div id="modal-video" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Why and How Software Engineering</h4>
          </div>
          <div class="modal-body">
            <video id="sf-video" width="100%" height="100%" controls>
              <source src="resources/softwareengineer.mp4" type="video/mp4">
            </video>
          </div>
        </div>

      </div>
    </div>
  </div>

</body>

<!-- Import jquery and caroulse javascript from the cdn and local script from the current folder -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="script/script.js"></script>

</html>