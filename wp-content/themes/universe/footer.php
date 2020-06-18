<footer class="site-footer">

    <div class="site-footer__inner container container--narrow">

      <div class="group">

        <div class="site-footer__col-one">
          <h1 class="school-logo-text school-logo-text--alt-color"><a href="#"><strong>Fictional</strong> University</a></h1>
          <p><a class="site-footer__link" href="#">555.555.5555</a></p>
        </div>

        <div class="site-footer__col-two-three-group">
          <div class="site-footer__col-two">
            <h3 class="headline headline--small">Explore</h3>
            <nav>
              <ul class="nav-list min-list">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Programs</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Campuses</a></li>
              </ul>
            </nav>
          </div>

          <div class="site-footer__col-three">
            <h3 class="headline headline--small">Learn</h3>
            <nav>
              <ul class="nav-list min-list">
                <li><a href="#">Legal</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Careers</a></li>
              </ul>
            </nav>
          </div>
        </div>

        <div class="site-footer__col-four">
          <h3 class="headline headline--small">Connect With Us</h3>
          <nav>
            <ul class="min-list social-icons-list group">
              <li><a href="#" class="social-color-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
          </nav>
        </div>
      </div>

    </div>
  </footer>

<?php wp_footer(); ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
$(".like-box").on("click", function(e) {
  var currentLikeBox =$(e.target).closest(".like-box");
  if(currentLikeBox.data('exists') === 'yes'){
    alert('delete')
  } else {
    $.ajax({
      beforeSend: (xhr) => {
        xhr.setRequestHeader('X-WP-Nonce', universityData.nonce);
      },
      url: universityData.root_url + '/wp-json/university/v1/like',
      type: 'POST',
      data: {'programId': currentLikeBox.data('program')},
      success: (response) => {
        console.log('success');
      },
      error: (response) => {
        console.log('error');
      }
    }); 
  }
});
</script>

</body>
</html>