<?php

/*
Template Name: Shop Page
*/


get_header();
?>

<br><br>
<div class="row">
	<div class="col-xs-2 col-md-2 shop-sidebar">
		<?php get_sidebar(); ?>
	</div>
	<div class="col-xs-12 col-md-10 shop-main-content">
		<div id="shop-mobile-view-only">
			<div class="row">
				<div class="col-xs-6" onclick="show_filter_bar()">
					<h3 id="mobile-filter">Filter</h2>
				</div>
				<div class="col-xs-6" onclick="show_sorting_bar()">
					<h3 id="mobile-sort">Sort</h2>
				</div>
			</div>
			<div class="col-xs-12 shop-mobile-only-search-sidebar">
				<div class="sidebar-div">
			    	<h3 style="box-shadow: none;">Filters</h3>
			    	<hr style="margin-top: 0;margin-bottom: 20px;">
			    </div>

			    <?php dynamic_sidebar('sidebar-1'); ?>
			    <button class="btn btn-block btn-default" id="shop-filter-cancel" onclick="hide_filter_bar()">Done</button>
			</div>
			<div class="col-xs-12 shop-mobile-only-sort-sidebar">
				<h4 onclick="fetch_date_ascending_order()">Date Ascending</h4><hr>
				<h4 onclick="fetch_date_descending_order()">Date Descending</h4><hr>
				<h4 onclick="fetch_price_ascending_order()">Price Ascending</h4><hr>
				<h4 onclick="fetch_price_descending_order()">Price Descending</h4>
				<button class="btn btn-block btn-default" id="shop-sorter-cancel" onclick="hide_sorting_bar()">Done</button>
			</div>
		</div>
		<br><br>

		<div id="shop-search-bar"><?php get_search_form(); ?></div>

		<div class="sort-div">
		<h3 class="brand-sort" style="margin-left: 2vw;margin-right: 2vw;">Sort by </h3>
		<div style="display: inline-block;">
		<h4 style="display: inline-block; cursor: pointer; margin-left: 2vw;" class="sort1" onclick="fetch_date_ascending_order()">Date Ascending</h4>
		<h4 style="display: inline-block; cursor: pointer; margin-left: 2vw;" class="sort2" onclick="fetch_date_descending_order()">Date Descending</h4>
		<h4 style="display: inline-block; cursor: pointer; margin-left: 2vw;" class="sort3" onclick="fetch_price_ascending_order()">Price Ascending</h4>
		<h4 style="display: inline-block; cursor: pointer; margin-left: 2vw;" class="sort4" onclick="fetch_price_descending_order()">Price Descending</h4>
		</div>
		</div>

		
		<center>
			<h1 id='not_found' style="margin-top: 10vh; display: none;">There are no Items to show</h1>
			<div id="content">	
			</div>
		</center>
		


	</div>

</div>



<?php get_footer(); ?>

<script>
	jQuery('.shop-mobile-only-search-sidebar').hide();
	jQuery('.shop-mobile-only-sort-sidebar').hide();

	function show_filter_bar(){
		jQuery('.shop-mobile-only-search-sidebar').show(100);
		jQuery('#mobile-filter').css({'background-color':'rgb(240, 240, 240)', 'box-shadow':'none'});
	}
	function hide_filter_bar(){
		jQuery('.shop-mobile-only-search-sidebar').hide(100);
		jQuery('#mobile-filter').css({'background-color':'rgb(255, 255, 255)', 'box-shadow':'0 0 2px #aaa'});
	}
	function show_sorting_bar(){
		jQuery('.shop-mobile-only-sort-sidebar').show(100);
		jQuery('#mobile-sort').css({'background-color':'rgb(240, 240, 240)', 'box-shadow':'none'});
	}
	function hide_sorting_bar(){
		jQuery('.shop-mobile-only-sort-sidebar').hide(100);
		jQuery('#mobile-sort').css({'background-color':'rgb(255, 255, 255)', 'box-shadow':'0 0 2px #aaa'});
	}

	jQuery(document).ready(function(){
		
		fetch_date_descending_order();

		<?php
			if (isset($_POST['brands'])){ 
				$x = $_POST['brands'][0];
		?>
		var x = "<?php echo $x; ?>" ;
		document.getElementById(x).checked=true;
		
		var i = setInterval(changeResultFunction, 0);
		setTimeout(function(){
			clearInterval(i);
		}, 5000);

		<?php } ?>
	});

	jQuery('#content').ready(function(){
		setTimeout(function(){ jQuery('#loading').hide(200); }, 2000);
	});

</script>
