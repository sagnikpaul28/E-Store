<?php 
/*
Plugin Name: Search by Brands
Plugin URI: http://localhost/Ekart
Description: Search within all the phones by the brand name
Version: 1.0
Author: Sagnik Paul
Author URI: http://localhost/Ekart
License: None
*/


function load_widget(){
	register_widget('widget_search_brands');
}

add_action('widgets_init', 'load_widget');


class widget_search_brands extends WP_Widget{

	function __construct(){

		parent::__construct(false, $name = __('Search by'));

	}

	public function form($instance){

	}

	public function update($new_instance, $old_instance){

	}

	public function widget($args, $instance){
		?>

		

		

		<form action="" method="post">
			<div class="sidebar-div" style="padding: 1vmin 2vmin">
			<h4>Brands</h4>
			
			<?php 
			$categories = array('parent' => 4);
			$categories = get_categories($categories);
			if ($_POST['brands']){
				$array = $_POST['brands'];
			}
			foreach($categories as $arr){ 
				$count = 0;

				if (isset($array)){
					foreach ($array as $a){ 
    					if ($a === $arr->name)
    						$count = 1;
					}
				}
			?>
			<div class="checkbox">
				<label><input name="brands[]" <?php if ($count===1){echo "checked";} ?> type="checkbox" value="<?php echo $arr->name ?>"> <?php echo $arr->name; ?></label>
			</div>
			<?php } ?>
			</div>


			<div class="sidebar-div" style="padding: 1vmin 2vmin">
			<h4>Price</h4>
			
			<?php 
			$categories = array('parent' => 18);
			$categories = get_categories($categories);
			if ($_POST['price']){
				$array = $_POST['price'];
			}
			foreach($categories as $arr){ 
				$count = 0;

				if (isset($array)){
					foreach ($array as $a){ 
    					if ($a === $arr->name)
    						$count = 1;
					}
				}
			?>
			<div class="checkbox">
				<label><input name="price[]" <?php if ($count===1){echo "checked";} ?> type="checkbox" value="<?php echo $arr->name ?>"> <?php echo $arr->name; ?></label>
			</div>
			<?php } ?>
			</div>


			<div class="sidebar-div" style="padding: 1vmin 2vmin">
			<h4>Battery Capacity</h4>
			<?php 
			$categories = array('parent' => 51);
			$categories = get_categories($categories);

			if ($_POST['battery']){
				$array = $_POST['battery'];
			}
			foreach($categories as $arr){ 
				$count = 0;

				if (isset($array)){
					foreach ($array as $a){ 
    					if ($a === $arr->name)
    						$count = 1;
					}
				}
			?>
			<div class="checkbox">
				<label><input name="battery[]" <?php if ($count===1){echo "checked";} ?> type="checkbox" value="<?php echo $arr->name ?>"> <?php echo $arr->name; ?></label>
			</div>
			<?php } ?>
			</div>


			<div class="sidebar-div" style="padding: 1vmin 2vmin">
			<h4>Internal Storage</h4>
			<?php 
			$categories = array('parent' => 35);
			$categories = get_categories($categories);
			if ($_POST['internal']){
				$array = $_POST['internal'];
			}
			foreach($categories as $arr){ 
				$count = 0;

				if (isset($array)){
					foreach ($array as $a){ 
    					if ($a === $arr->name)
    						$count = 1;
					}
				}
			?>
			<div class="checkbox">
				<label><input name="internal[]" <?php if ($count===1){echo "checked";} ?> type="checkbox" value="<?php echo $arr->name ?>"> <?php echo $arr->name; ?></label>
			</div>
			<?php } ?>
			</div>


			<div class="sidebar-div" style="padding: 1vmin 2vmin">
			<h4>Primary Camera</h4>
			
			<?php 
			$categories = array('parent' => 61);
			$categories = get_categories($categories);
			if ($_POST['primary_camera']){
				$array = $_POST['primary_camera'];
			}
			foreach($categories as $arr){ 
				$count = 0;

				if (isset($array)){
					foreach ($array as $a){ 
    					if ($a === $arr->name)
    						$count = 1;
					}
				}
			?>
			<div class="checkbox">
				<label><input name="primary_camera[]" <?php if ($count===1){echo "checked";} ?> type="checkbox" value="<?php echo $arr->name ?>"> <?php echo $arr->name; ?></label>
			</div>
			<?php } ?>
			</div>


			<div class="sidebar-div" style="padding: 1vmin 2vmin">
			<h4>RAM</h4>
			
			<?php 
			$categories = array('parent' => 27);
			$categories = get_categories($categories);
			if ($_POST['ram']){
				$array = $_POST['ram'];
			}
			foreach($categories as $arr){ 
				$count = 0;

				if (isset($array)){
					foreach ($array as $a){ 
    					if ($a === $arr->name)
    						$count = 1;
					}
				}
			?>
			<div class="checkbox">
				<label><input name="ram[]" <?php if ($count===1){echo "checked";} ?> type="checkbox" value="<?php echo $arr->name ?>"> <?php echo $arr->name; ?></label>
			</div>
			<?php } ?>
			</div>


			<div class="sidebar-div" style="padding: 1vmin 2vmin">
			<h4>Screen Size</h4>
			
			<?php 
			$categories = array('parent' => 45);
			$categories = get_categories($categories);
			if ($_POST['screen']){
				$array = $_POST['screen'];
			}
			foreach($categories as $arr){ 
				$count = 0;

				if (isset($array)){
					foreach ($array as $a){ 
    					if ($a === $arr->name)
    						$count = 1;
					}
				}
			?>
			<div class="checkbox">
				<label><input name="screen[]" <?php if ($count===1){echo "checked";} ?> type="checkbox" value="<?php echo $arr->name ?>"> <?php echo $arr->name; ?></label>
			</div>
			<?php } ?>
			</div>


			<div class="sidebar-div" style="padding: 1vmin 2vmin">
			<h4>Number of Sims</h4>
			
			<?php 
			$categories = array('parent' => 57);
			$categories = get_categories($categories);
			if ($_POST['sim']){
				$array = $_POST['sim'];
			}
			foreach($categories as $arr){ 
				$count = 0;

				if (isset($array)){
					foreach ($array as $a){ 
    					if ($a === $arr->name)
    						$count = 1;
					}
				}
			?>
			<div class="checkbox">
				<label><input name="sim[]" <?php if ($count===1){echo "checked";} ?> type="checkbox" value="<?php echo $arr->name ?>"> <?php echo $arr->name; ?></label>
			</div>
			<?php } ?>
			</div>

			<div class="sidebar-div" style="padding: 1vmin 2vmin">
				<button type="submit" class="btn btn-block btn-primary">Submit</button>
			</div>
			
		</form>
		

		<?php
	}

}


?>