<h1><?php get_header() ?></h1>

index.php<br />



<?php 
	//blogInfo('name');
	//blogInfo('description');

	while(have_posts()){
		the_post();
		$url = get_the_permalink();
		$title = get_the_title();
		echo "<a href='$url'>$title</a>";
		the_content();
	}
?>


<?php get_footer() ?>