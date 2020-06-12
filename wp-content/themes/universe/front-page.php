<?php get_header(); ?>

front-page.php

<?php
	//custom query
	$homepageEvents = new WP_Query(array(
		'posts_per_page' => 2,
		'post_type' => 'event'
	)); 

	while($homepageEvents->have_posts()) {
		$homepageEvents->the_post(); ?>
		<li><a href='<?php the_permalink(); ?>'> <?php the_title(); ?> </a></li>
	<?php }
?>

<?php get_footer(); ?>