<?php

/*
Template Name: Brand Page
*/


get_header();
?>
<br><br>
<div class="col-xs-0 col-sm-3 col-md-2">
	<?php get_sidebar(); ?>
</div>

<div class="col-xs-12 col-sm-9 col-md-10"

<br><br>
	<?php 
	$count = 0;

	$sort = $_GET['sort'];

	if ($sort === "pricedesc"){
		$args = array('post_type' => 'mobile', 'meta_key' => 'price', 'orderby' => 'meta_value', 'order' => 'DESC');
	}
	else if ($sort === 'priceasc'){
		$args = array('post_type' => 'mobile', 'meta_key' => 'price', 'orderby' => 'meta_value', 'order' => 'ASC');
	}
	else if ($sort === 'oldest'){
		$args = array('post_type' => 'mobile', 'orderby' => 'date', 'order' => 'ASC');
	}
	else{
		$args = array('post_type' => 'mobile', 'orderby' => 'date', 'order' => 'DESC');
	}

	$loop = new WP_Query($args);

	if ($loop -> have_posts()): ?>

	<div class="sort-div">
	<h4 class="brand-sort" style="width: 15vw;margin-left: 0">Sort by </h4>
	<h5 class="brand-sort" onclick="window.location.href = window.location.hostname + window.location.pathname + '?sort=priceasc';">Price Low to High</h5>
	<h5 class="brand-sort" onclick="window.location.href = window.location.hostname + window.location.pathname +'?sort=pricedesc';">Price High to Low</h5>
	<h5 class="brand-sort" onclick="window.location.href = window.location.hostname + window.location.pathname + '?sort=newest';">Newest First</h5>
	<h5 class="brand-sort" onclick="window.location.href = window.location.hostname + window.location.pathname + '?sort=oldest';">Oldest First</h5>

		<div class="row" >

		<?php while($loop -> have_posts()): $loop -> the_post(); ?>

				<a href="<?php the_permalink() ?>">
					<div class="col-xs-6 col-sm-4 col-md-3" id="contain">
				
					<center>
					<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" id="brands-img-thumbnail">
					
					<?php the_title(sprintf( "<h4 class='title-brands'><a href='%s'>",esc_url(get_permalink())),'</a></h4>'); ?>

					<h5>Rs <?php echo get_post_meta(get_the_ID(), 'Price', true); ?></h5>
				</center>
				</div>
				</a>

		<?php $count++; ?>

		<?php endwhile;
	endif; ?>
</div>


<?php get_footer(); ?>