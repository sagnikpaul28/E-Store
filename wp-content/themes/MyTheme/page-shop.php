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
		<h4 style="display: inline-block; cursor: pointer; margin-left: 2vw;" class="sort1" onclick="fetch_date_ascending()">Date Ascending</h4>
		<h4 style="display: inline-block; cursor: pointer; margin-left: 2vw;" class="sort2" onclick="fetch_date_descending()">Date Descending</h4>
		<h4 style="display: inline-block; cursor: pointer; margin-left: 2vw;" class="sort3" onclick="fetch_price_ascending()">Price Ascending</h4>
		<h4 style="display: inline-block; cursor: pointer; margin-left: 2vw;" class="sort4" onclick="fetch_price_descending()">Price Descending</h4>
		</div>
		</div>

		
		<div id="content">
			
		</div>


	</div>

</div>



<?php get_footer(); ?>

<script>
	jQuery(document).ready(function(){
		fetch_date_descending();

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

</script>
