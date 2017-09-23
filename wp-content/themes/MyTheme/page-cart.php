<?php get_header(); ?>

<?php
if ($_POST['increase_id'] && $_POST['number']){
	global $wpdb;
	$table_name = "username_".$_SESSION['username'];
	$query = $wpdb->update(
        $table_name,
        array(
            'number_items'=>$_POST['number']+1
        ),
        array(
            'id'=>$_POST['increase_id']
        ),
        array(
            '%d'
        ),
        array(
            '%d'
        )
    );
}

if ($_POST['decrease_id'] && $_POST['number']){
	global $wpdb;
	$table_name = "username_".$_SESSION['username'];

	if ($_POST['number']==1){
		$wpdb->delete(
			$table_name,
			array(
				'id'=>$_POST['decrease_id']
			),
			array(
				'%d'
			)
		);
	}else{
	
	$query = $wpdb->update(
        $table_name,
        array(
            'number_items'=>$_POST['number']-1
        ),
        array(
            'id'=>$_POST['decrease_id']
        ),
        array(
            '%d'
        ),
        array(
            '%d'
        )
    );
	}
}

?>

<?php 
if (!isset($_SESSION['username'])){
	wp_redirect(get_home_url());
}

global $wpdb;
$query = $wpdb->get_results("SELECT * FROM username_".$_SESSION['username']);

if ($query==null){
	echo "<br>";
	echo "<h2>Cart is Empty</h2>";
	echo "<h2>Go back to our <a href='".get_home_url()."'>Home Page</a></h2>";
}

foreach($query as $array){ ?>
<div class="row">
	<h1><?php echo $array->phone_name ;?></h1>

	<?php 
	$id = $array->id;
	$post_id = $array->phone_id; 
	$price = $array->phone_price;
	$number = $array->number_items;
	?>

	<center>
	<div class="col-xs-12 col-sm-5 col-md-4">
		<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post_id)); ?>" id="cart-img-thumbnail">
	</div>

	<div class="col-xs-12 col-sm-7 col-md-8">
		<?php echo $id; ?>
		<?php echo $price; ?>
		<?php echo $number; ?>
		<?php echo $price*$number; ?>

		<form action="" method="post">
			<input type="hidden" value="<?php echo $id ?>" name="increase_id">
			<input type="hidden" value="<?php echo $number ?>" name="number">

			<button type="submit">Increase</button>
		</form>

		<form  action="" method="post">
			<input type="hidden" value="<?php echo $id ?>" name="decrease_id">
			<input type="hidden" value="<?php echo $number ?>" name="number">

			<button type="submit">Decrease</button>
		</form>

	</center>
</div>

<?php } ?>





<?php get_footer(); ?>