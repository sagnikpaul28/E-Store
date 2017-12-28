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

			    <?php dynamic_sidebar('sidebar-1'); ?>
			    <button class="btn btn-block btn-default" id="shop-filter-cancel" onclick="hide_filter_bar()">Done</button>
			</div>
			<div class="col-xs-12 shop-mobile-only-sort-sidebar">
				<h4 onclick="fetch_price_ascending_order()">Price Low to High</h4><hr>
				<h4 onclick="fetch_price_descending_order()">Price High to Low</h4><hr>
				<h4 onclick="fetch_date_ascending_order()">Old to New</h4><hr>
				<h4 onclick="fetch_date_descending_order()">New to Old</h4>
				
				<button class="btn btn-block btn-default" id="shop-sorter-cancel" onclick="hide_sorting_bar()">Done</button>
			</div>
		</div>
		<br><br>

		<div id="shop-search-bar"><?php get_search_form(); ?></div>

		<div class="sort-div">
		<h3 class="brand-sort" style="margin-left: 2vw;margin-right: 2vw;">Sort by </h3>
		<div style="display: inline-block;">
			<h4 style="display: inline-block; cursor: pointer; margin-left: 2vw;" class="sort3" onclick="fetch_price_ascending_order()">Price Low to High</h4>
			<h4 style="display: inline-block; cursor: pointer; margin-left: 2vw;" class="sort4" onclick="fetch_price_descending_order()">Price High to Low</h4>
			<h4 style="display: inline-block; cursor: pointer; margin-left: 2vw;" class="sort1" onclick="fetch_date_ascending_order()">Oldest First</h4>
			<h4 style="display: inline-block; cursor: pointer; margin-left: 2vw;" class="sort2" onclick="fetch_date_descending_order()">Newest First</h4>
		
		</div>
		</div>

		
		<center>
			<h1 id='not_found' style="margin-top: 10vh; display: none;">There are no Items to show</h1>
			<div id="content">	
			</div>
		</center>
		


	</div>

</div>
<br><br>



<?php get_footer(); ?>

<script>
	
jQuery(document).ready(function(){
	jQuery('.shop-mobile-only-search-sidebar').show();
	
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

	jQuery('.shop-mobile-only-search-sidebar').hide();

	<?php } ?>

});



</script>