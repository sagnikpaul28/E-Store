<?php 
/*
Plugin Name: Search Bar
Plugin URI: http://localhost/Ekart
Description: Search within all the phones by the different properties
Version: 1.0
Author: Sagnik Paul
Author URI: http://localhost/Ekart
License: None
*/


function load_widget(){
	register_widget('widget_searcher');
}

add_action('widgets_init', 'load_widget');


class widget_searcher extends WP_Widget{

	function __construct(){

		parent::__construct(false, $name = __('Search by'));

	}

	public function form($instance){

	}

	public function update($new_instance, $old_instance){

	}

	public function widget($args, $instance){
		?>

			<div class="sidebar-div" style="padding: 1vmin 2vmin">
			<h4>Brands</h4>
			
			<?php 
			$categories = array('parent' => 4);
			$categories = get_categories($categories);

			foreach($categories as $arr){ 
			?>
			<div class="checkbox">
				<label><input type="checkbox" name="brands" value="<?php echo $arr->slug ?>" id="<?php echo $arr->name; ?>"> <?php echo $arr->name; ?></label>
			</div>
			<?php } ?>
			</div>

			<div class="sidebar-div" style="padding: 1vmin 2vmin">
			<h4>Price</h4>
			
			<?php 
			$categories = array('parent' => 18);
			$categories = get_categories($categories);

			foreach($categories as $arr){ 
			?>
			<div class="checkbox">
				<label><input type="checkbox" name="price" value="<?php echo $arr->slug ?>"> <?php echo $arr->name; ?></label>
			</div>
			<?php } ?>
			</div>

			<div class="sidebar-div" style="padding: 1vmin 2vmin">
			<h4>Battery Capacity</h4>
			
			<?php 
			$categories = array('parent' => 51);
			$categories = get_categories($categories);

			foreach($categories as $arr){ 
			?>
			<div class="checkbox">
				<label><input type="checkbox" name="battery" value="<?php echo $arr->slug ?>"> <?php echo $arr->name; ?></label>
			</div>
			<?php } ?>
			</div>


			<div class="sidebar-div" style="padding: 1vmin 2vmin">
			<h4>Internal Storage</h4>
			
			<?php 
			$categories = array('parent' => 35);
			$categories = get_categories($categories);

			foreach($categories as $arr){ 
			?>
			<div class="checkbox">
				<label><input type="checkbox" name="internal_storage" value="<?php echo $arr->slug ?>"> <?php echo $arr->name; ?></label>
			</div>
			<?php } ?>
			</div>


			<div class="sidebar-div" style="padding: 1vmin 2vmin">
			<h4>Primary Camera</h4>
			
			<?php 
			$categories = array('parent' => 61);
			$categories = get_categories($categories);

			foreach($categories as $arr){ 
			?>
			<div class="checkbox">
				<label><input type="checkbox" name="primary_camera" value="<?php echo $arr->slug ?>"> <?php echo $arr->name; ?></label>
			</div>
			<?php } ?>
			</div>

			<div class="sidebar-div" style="padding: 1vmin 2vmin">
			<h4>RAM</h4>
			
			<?php 
			$categories = array('parent' => 27);
			$categories = get_categories($categories);

			foreach($categories as $arr){ 
			?>
			<div class="checkbox">
				<label><input type="checkbox" name="ram" value="<?php echo $arr->slug ?>"> <?php echo $arr->name; ?></label>
			</div>
			<?php } ?>
			</div>

			<div class="sidebar-div" style="padding: 1vmin 2vmin">
			<h4>Screen Size</h4>

			<?php 
			$categories = array('parent' => 45);
			$categories = get_categories($categories);

			foreach($categories as $arr){ 
			?>
			<div class="checkbox">
				<label><input type="checkbox" name="screen" value="<?php echo $arr->slug ?>"> <?php echo $arr->name; ?></label>
			</div>
			<?php } ?>
			</div>

		<?php
	}

}


?>