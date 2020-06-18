<?php get_header(); ?>

<?php
while(have_posts()){
    the_post();
    $title = get_the_title();
    $content = get_the_content();
}
?>

<div class="page-banner">
     
  </div>

  <div class="container container--narrow page-section">

    <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="/events"></i> All Events</a> <span class="metabox__main"><?php echo $title ?></span>
      </p>
    </div>
    
    <div class="page-links">
      <h2 class="page-links__title"><a href="#">About Us</a></h2>
      <ul class="min-list">
        <li class="current_page_item"><a href="#">Our History</a></li>
        <li><a href="#">Our Goals</a></li>
      </ul>
    </div>

    <div class="generic-content">
      <?php echo $title ?>
      <p>
      	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
      	function testEndpoint() {
      		$( document ).ready(function() {
	      		$.ajax({
			        beforeSend: function(xhr) {
			          xhr.setRequestHeader('X-WP-Nonce', universityData.nonce);
			        },
			        url: universityData.root_url + '/wp-json/university/v1/like',
			        type: 'POST',
			        data: {'programId': 27},
			        success: function(response)  {
			          console.log('success' + response);
			        },
			        error: function(response)  {
			          console.log('fail' + response);
			        }
	    		});  
    		});  
		}
    </script>

	<?php
		$likeCount = new WP_Query(array(
			'post_type' => 'like',
			'meta_query' => array(
				array(
					'key' => 'likedprogram',
					'compare' => '=',
					'value' => get_the_ID()
				)
			)
		));

		$existsStatus = 'no';

		$userLiked = new WP_Query(array(
			'post_type' => 'like',
			'author' => get_current_user_id(), 
			'meta_query' => array(
				array(
					'key' => 'likedprogram',
					'compare' => '=',
					'value' => get_the_ID()
				)
			)
		));

		if ($userLiked->found_posts){
			$existsStatus = 'yes';
		}
	?>

	

    <span class='like-box' data-exists="<?php echo $existsStatus; ?>">
    	<i class="fa fa-heart-o" aria-hidden='true'></i>
    	<i class="fa fa-heart" aria-hidden='true'></i>
    	<span class="like-count"><?php echo $likeCount->found_posts;?></span>
    </span>
      	<form action="javascript:testEndpoint();void(0);" >
      		<input type='submit' />
      	</form>
      </p>
      <?php echo $content ?>
    </div>

  </div>

  <div class="page-section page-section--white">

</div>

<?php get_footer(); ?>