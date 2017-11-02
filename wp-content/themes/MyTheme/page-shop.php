<?php

/*
Template Name: Shop Page
*/


get_header();
?>

<br><br>
<div class="row">
	<div class="col-xs-6 col-sm-3 col-md-2">
		<?php get_sidebar(); ?>
	</div>

	<div class="col-xs-6 col-sm-9 col-md-10">

		<br><br>

		<div><?php get_search_form(); ?></div>

		<div class="sort-div" style="display: inline-block">
		<h3 class="brand-sort" style="margin-left: 2vw;margin-right: 2vw;">Sort by </h3>
		<div style="display: inline-block;">
		<h4 style="display: inline-block; cursor: pointer; margin-left: 2vw;" class="sort1">Date Ascending</h4>
		<h4 style="display: inline-block; cursor: pointer; margin-left: 2vw;" class="sort2">Date Descending</h4>
		<h4 style="display: inline-block; cursor: pointer; margin-left: 2vw;" class="sort3">Price Ascending</h4>
		<h4 style="display: inline-block; cursor: pointer; margin-left: 2vw;" class="sort4">Price Descending</h4>
		</div>
		</div>

		<div id="orderdesc">
			<?php 
			
			$args = array('post_type' => 'mobile', 'orderby' => 'date', 'order' => 'DESC');

			$loop = new WP_Query($args);

			if ($loop -> have_posts()): ?>
			
			<div class="row" >

				<?php while($loop -> have_posts()): $loop -> the_post(); ?>

					<a href="<?php the_permalink() ?>">
						<div class="col-xs-6 col-sm-4 col-md-3 <?php $ca = get_the_category(get_the_ID()); foreach($ca as $c){echo $c->slug; echo " ";} ?>" id="contain" data-namephone="<?php echo get_the_title(); ?>">
					
							<center>
								<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" id="brands-img-thumbnail">
						
								<?php the_title(sprintf( "<h4 class='title-brands'><a href='%s'>",esc_url(get_permalink())),'</a></h4>'); ?>

								<h5>Rs <?php echo get_post_meta(get_the_ID(), 'Price', true); ?></h5>
							</center>
						</div>
						
					</a>

				<?php endwhile;
			endif;

			wp_reset_postdata();

			?>
			</div>

		</div>

		<div id="orderasc">
			<?php 
			
			$args = array('post_type' => 'mobile', 'orderby' => 'date', 'order' => 'ASC');

			$loop = new WP_Query($args);

			if ($loop -> have_posts()): ?>
			
			<div class="row" >

				<?php while($loop -> have_posts()): $loop -> the_post(); ?>

					<a href="<?php the_permalink() ?>">
						<div class="col-xs-6 col-sm-4 col-md-3 <?php $ca = get_the_category(get_the_ID()); foreach($ca as $c){echo $c->slug; echo " ";} ?>" id="contain" data-namephone="<?php echo get_the_title(); ?>">
					
							<center>
								<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" id="brands-img-thumbnail">
						
								<?php the_title(sprintf( "<h4 class='title-brands'><a href='%s'>",esc_url(get_permalink())),'</a></h4>'); ?>

								<h5>Rs <?php echo get_post_meta(get_the_ID(), 'Price', true); ?></h5>
							</center>
						</div>
						
					</a>

				<?php endwhile;
			endif;

			wp_reset_postdata();

			?>
			</div>

		</div>

		<div id="orderpriceasc">
			<?php 
			
			$args = array('post_type' => 'mobile', 'meta_key' => 'price', 'orderby' => 'meta_value_num', 'order' => 'ASC');

			$loop = new WP_Query($args);

			if ($loop -> have_posts()): ?>
			
			<div class="row" >

				<?php while($loop -> have_posts()): $loop -> the_post(); ?>

					<a href="<?php the_permalink() ?>">
						<div class="col-xs-6 col-sm-4 col-md-3 <?php $ca = get_the_category(get_the_ID()); foreach($ca as $c){echo $c->slug; echo " ";} ?>" id="contain" data-namephone="<?php echo get_the_title(); ?>">
					
							<center>
								<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" id="brands-img-thumbnail">
						
								<?php the_title(sprintf( "<h4 class='title-brands'><a href='%s'>",esc_url(get_permalink())),'</a></h4>'); ?>

								<h5>Rs <?php echo get_post_meta(get_the_ID(), 'Price', true); ?></h5>
							</center>
						</div>
						
					</a>

				<?php endwhile;
			endif;

			wp_reset_postdata();

			?>
			</div>

		</div>

		<div id="orderpricedesc">
			<?php 
			
			$args = array('post_type' => 'mobile', 'meta_key' => 'price', 'orderby' => 'meta_value_num', 'order' => 'DESC');

			$loop = new WP_Query($args);

			if ($loop -> have_posts()): ?>
			
			<div class="row" >

				<?php while($loop -> have_posts()): $loop -> the_post(); ?>

					<a href="<?php the_permalink() ?>">
						<div class="col-xs-6 col-sm-4 col-md-3 <?php $ca = get_the_category(get_the_ID()); foreach($ca as $c){echo $c->slug; echo " ";} ?>" id="contain" data-namephone="<?php echo get_the_title(); ?>">
					
							<center>
								<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" id="brands-img-thumbnail">
						
								<?php the_title(sprintf( "<h4 class='title-brands'><a href='%s'>",esc_url(get_permalink())),'</a></h4>'); ?>

								<h5>Rs <?php echo get_post_meta(get_the_ID(), 'Price', true); ?></h5>
							</center>
						</div>
						
					</a>

				<?php endwhile;
			endif;

			wp_reset_postdata();

			?>
			</div>

		</div>


	</div>

</div>



<?php get_footer(); ?>

<script>
	jQuery('document').ready(function(){
		jQuery('#orderasc').hide();
		jQuery('#orderpriceasc').hide();
		jQuery('#orderpricedesc').hide();

		jQuery('.sort1').click(function(){
			jQuery('#orderasc').hide();
			jQuery('#orderpriceasc').hide();
			jQuery('#orderpricedesc').hide();
			jQuery('#orderdesc').show();
		});

		jQuery('.sort2').click(function(){
			jQuery('#orderdesc').hide();
			jQuery('#orderpriceasc').hide();
			jQuery('#orderpricedesc').hide();
			jQuery('#orderasc').show();
		});

		jQuery('.sort3').click(function(){
			jQuery('#orderasc').hide();
			jQuery('#orderdesc').hide();
			jQuery('#orderpricedesc').hide();
			jQuery('#orderpriceasc').show();
		});

		jQuery('.sort4').click(function(){
			jQuery('#orderasc').hide();
			jQuery('#orderdesc').hide();
			jQuery('#orderpriceasc').hide();
			jQuery('#orderpricedesc').show();
		})
	});

	var changeResultFunction = function(){
		if (jQuery('input:checkbox:checked').length > 0){

			var arraybrands = [];
			var arrayprice = [];
			var arraybattery = [];
			var arrayinternal = [];
			var arrayprimarycam = [];
			var arrayram = [];
			var arrayscreen = [];

			jQuery('[id=contain]').hide();

			jQuery('input[name="brands"]:checkbox:checked').each(function(){
				var item = jQuery(this).val();
				arraybrands.push(item);
			});

			jQuery('input[name="price"]:checkbox:checked').each(function(){
				var item = jQuery(this).val();
				arrayprice.push(item);
			});

			jQuery('input[name="battery"]:checkbox:checked').each(function(){
				var item = jQuery(this).val();
				arraybattery.push(item);
			});

			jQuery('input[name="internal_storage"]:checkbox:checked').each(function(){
				var item = jQuery(this).val();
				arrayinternal.push(item);
			});

			jQuery('input[name="primary_camera"]:checkbox:checked').each(function(){
				var item = jQuery(this).val();
				arrayprimarycam.push(item);
			});

			jQuery('input[name="ram"]:checkbox:checked').each(function(){
				var item = jQuery(this).val();
				arrayram.push(item);
			});

			jQuery('input[name="screen"]:checkbox:checked').each(function(){
				var item = jQuery(this).val();
				arrayscreen.push(item);
			});


			if (arraybrands.length === 0){
				arraybrands = [' '];
			}			

			if (arrayprice.length === 0){
				arrayprice = [' '];
			}

			if (arraybattery.length === 0){
				arraybattery = [' '];
			}

			if (arrayinternal.length === 0){
				arrayinternal = [' '];
			}

			if (arrayprimarycam.length === 0){
				arrayprimarycam = [' '];
			}

			if (arrayram.length === 0){
				arrayram = [' '];
			}

			if (arrayscreen.length === 0){
				arrayscreen = [' '];
			}

			var count = 0;
			var arg, arg1, arg2, arg3, arg4, arg5, arg6, arg7;

			for (var i = 0; i < arraybrands.length; i++){
				arg = "";
				if (arraybrands[0] !== " "){
					arg1 = arg + "." + arraybrands[i];
				}
				else{
					arg1 = arg;
				}
				for (var j = 0; j < arrayprice.length; j++){
					if (arrayprice[0] !== " "){
						arg2 = arg1 + "." + arrayprice[j];
					}
					else{
						arg2 = arg1;
					}
					for (var k = 0; k < arraybattery.length; k++){
						if (arraybattery[0] !== " "){
							arg3 = arg2 + "." + arraybattery[k];
						}
						else{
							arg3 = arg2;
						}
						for (var l = 0; l < arrayinternal.length; l++){
							if (arrayinternal[0] !== " "){
								arg4 = arg3 + "." + arrayinternal[l];
							}
							else{
								arg4 = arg3;
							}
							for (var m = 0; m < arrayprimarycam.length; m++){
								if (arrayprimarycam[0] !== " "){
									arg5 = arg4 + "." + arrayprimarycam[m];
								}
								else{
									arg5 = arg4;
								}
								for (var n = 0; n < arrayram.length; n++){
									if (arrayram[0] !== " "){
										arg6 = arg5 + "." + arrayram[n];
									}
									else{
										arg6 = arg5;
									}
									for (var o = 0; o < arrayscreen.length; o++){
										if (arrayscreen[0] !== " "){
											arg7 = arg6 + "." + arrayscreen[o];
										}
										else{
											arg7 = arg6;
										}

										jQuery(arg7).show();

										jQuery(arg7).each(function(){
											var x = jQuery(this).data('namephone');
											var y = jQuery('#Search').val();
											if (x.indexOf(y) === -1){
												jQuery(this).hide();
											}
										
										})
									}
								}
							}
						}
					}
				}
			}

		}
		else{
			jQuery('[id=contain]').show();
			jQuery('[id=contain]').each(function(){
				var x = jQuery(this).data('namephone').toLowerCase().trim();
				var y = jQuery('#Search').val().toLowerCase().trim();
				if (x.indexOf(y) === -1){
					jQuery(this).hide();
				}
			})
		}
	};
	jQuery('input[type=checkbox]').click(changeResultFunction);

</script>
