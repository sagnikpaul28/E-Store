<?php

/*
Template Name: Shop Page
*/


get_header();
?>
<br><br>
<div class="col-xs-0 col-sm-3 col-md-2">
	<?php get_sidebar(); ?>
</div>

<div class="col-xs-12 col-sm-9 col-md-10">

<br><br>
	<?php 
	$count = 0;

	$sort = $_POST['sort'];

	if ($sort === "Price Descending"){
		$args = array('post_type' => 'mobile', 'meta_key' => 'price', 'orderby' => 'meta_value_num', 'order' => 'DESC');
	}
	else if ($sort === "Price Ascending"){
		$args = array('post_type' => 'mobile', 'meta_key' => 'price', 'orderby' => 'meta_value_num', 'order' => 'ASC');
	}
	else if ($sort === 'Oldest First'){
		$args = array('post_type' => 'mobile', 'orderby' => 'date', 'order' => 'ASC');
	}
	else{
		$args = array('post_type' => 'mobile', 'orderby' => 'date', 'order' => 'DESC');
	}

	$loop = new WP_Query($args);

	if ($loop -> have_posts()): ?>

	<div class="sort-div" style="display: inline-block">
	<h4 class="brand-sort" style="width: 15vw;margin-left: 0">Sort by </h4>
	<input type="submit" name="sort" value="Price Ascending" style="background: none; border: 0; margin: 0 1vmin;">
	<input type="submit" name="sort" value="Price Descending" style="background: none; border: 0; margin: 0 1vmin;">
	<input type="submit" name="sort" value="Oldest First" style="background: none; border: 0; margin: 0 1vmin;">
	<input type="submit" name="sort" value="Newest First" style="background: none; border: 0; margin: 0 1vmin;">
	</div>

	</form>

	<?php get_search_form(); ?>
	

	<div class="row" >

		<?php while($loop -> have_posts()): $loop -> the_post(); ?>

			<?php
			$countbrands = 0;
			$countprice = 0;
			$countbattery = 0;
			$countinternal = 0;
			$countprimarycam = 0;
			$countram = 0;
			$countscreen = 0;
			$countsim = 0;
			$countsearch = 0;

			if ($_POST['brands']){
				$countbrands = 1;
				foreach($_POST['brands'] as $a){
					$cats = get_the_category();
					foreach($cats as $c){
						if ($c->name === $a){
							$countbrands = 0;
						}
					}
				}
			}

			if ($_POST['price']){
				$countprice = 1;
				foreach($_POST['price'] as $a){
					$cats = get_the_category();
					foreach($cats as $c){
						if ($c->name === $a){
							$countprice = 0;
						}
					}
				}
			}

			if ($_POST['battery']){
				$countbattery = 1;
				foreach($_POST['battery'] as $a){
					$cats = get_the_category();
					foreach($cats as $c){
						if ($c->name === $a){
							$countbattery = 0;
						}
					}
				}
			}

			if ($_POST['internal']){
				$countinternal = 1;
				foreach($_POST['internal'] as $a){
					$cats = get_the_category();
					foreach($cats as $c){
						if ($c->name === $a){
							$countinternal = 0;
						}
					}
				}
			}

			if ($_POST['primary_camera']){
				$countprimarycam = 1;
				foreach($_POST['primary_camera'] as $a){
					$cats = get_the_category();
					foreach($cats as $c){
						if ($c->name === $a){
							$countprimarycam = 0;
						}
					}
				}
			}

			if ($_POST['ram']){
				$countram = 1;
				foreach($_POST['ram'] as $a){
					$cats = get_the_category();
					foreach($cats as $c){
						if ($c->name === $a){
							$countram = 0;
						}
					}
				}
			}

			if ($_POST['screen']){
				$countscreen = 1;
				foreach($_POST['screen'] as $a){
					$cats = get_the_category();
					foreach($cats as $c){
						if ($c->name === $a){
							$countscreen = 0;
						}
					}
				}
			}

			if ($_POST['sim']){
				$countsim = 1;
				foreach($_POST['sim'] as $a){
					$cats = get_the_category();
					foreach($cats as $c){
						if ($c->name === $a){
							$countsim = 0;
						}
					}
				}
			}


			if ($_GET['Search']){
				$countsearch = 1;

				$search = $_GET['Search'];

				if (stripos(get_the_title(), $search) !== false){
					$countsearch = 0;
				}
			}

			if ($countbrands===0 && $countsim===0 && $countscreen===0 && $countram===0 && $countprimarycam===0 && $countinternal===0 && $countbattery===0 && $countprice===0 && $countsearch===0){

		?>
				<a href="<?php the_permalink() ?>">
					<div class="col-xs-6 col-sm-4 col-md-3" id="contain">
				
						<center>
							<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" id="brands-img-thumbnail">
					
							<?php the_title(sprintf( "<h4 class='title-brands'><a href='%s'>",esc_url(get_permalink())),'</a></h4>'); ?>

							<h5>Rs <?php echo get_post_meta(get_the_ID(), 'Price', true); ?></h5>
						</center>
					</div>
				</a>


			<?php $count++; }?>

		<?php endwhile;
	endif; 

	if ($count===0){ ?>
	<center>
	<h2 style="margin-top: 10vh;">No Items Found.</h2>
	</center>

	<?php }

	wp_reset_postdata();

	?>
	</div>
</div>



<?php get_footer(); ?>