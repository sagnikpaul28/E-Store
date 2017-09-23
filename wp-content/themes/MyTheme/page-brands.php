<?php

/*
Template Name: Brand Page
*/


get_header();
?>
<br><br>
	<?php 
	$count = 0;

	$args = array('post_type' => 'mobile', 'category_name' => get_the_title());

	$loop = new WP_Query($args);

	if ($loop -> have_posts()): ?>

		<div class="row" >

		<?php while($loop -> have_posts()): $loop -> the_post(); ?>
		
		<?php
		if ($count%3==0){ ?>
			</div>
			<div class="row">

		<?php } ?>

			<div class="col-xs-12 col-sm-4">
				<div id="contain">
				<center>
					<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" id="brands-img-thumbnail">

					<?php the_title(sprintf( "<h3 class='title'><a href='%s'>",esc_url(get_permalink())),'</a></h3>'); ?>
				</center>
				</div>

			</div>

		<?php $count++; ?>

		<?php endwhile;
	endif; ?>
</div>


<?php get_footer(); ?>