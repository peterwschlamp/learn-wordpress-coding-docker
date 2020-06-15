# learn-wordpress-coding-docker

Web apps in wordpress involve mostly coding but to associated custom post types together we use a 
plug-in:

Advanced Custom Fields
	

Customize WordPress with powerful, professional and intuitive fields.
| By Elliot Condon | View details

################################################################################################

single-event.php -- replace word event with whatever post type name is


<?php 
	//blogInfo('name');
	//blogInfo('description');

	while(have_posts()){
		the_post();
		$url = get_the_permalink();
		$title = get_the_title();
		the_title();
		the_content();
	}


?>


<?php 

$posts = get_field('related_programs');

if( $posts ): ?>
    <ul>
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
        <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <span>Custom field from $post: <?php the_field('author'); ?></span>
        </li>
    <?php endforeach; ?>
    </ul>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>

################################################################################################

