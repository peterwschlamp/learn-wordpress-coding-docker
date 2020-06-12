
<?php get_header(); ?>

archive-event.php


<?php
	
	while(have_posts()) {
		the_post(); ?>
		<li><a href='<?php the_permalink(); ?>'> <?php the_title(); ?> </a></li>
	<?php }
?>

<?php get_footer(); ?>