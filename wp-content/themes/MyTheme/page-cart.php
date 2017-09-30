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

if ($_POST['delete_id']){
	$d_id = $_POST['delete_id'];
	$table_name = "username_".$_SESSION['username'];
	global $wpdb;

	$wpdb->delete($table_name, array('id' => $d_id), array('%d'));
}

?>

<div class="container">

<?php 
if (!isset($_SESSION['username'])){
	wp_redirect(get_home_url());
}

global $wpdb;
$query = $wpdb->get_results("SELECT * FROM username_".$_SESSION['username']);
$count = $wpdb->num_rows;

$total = 0;

if ($query==null){
	echo "<br><br><br>";
	echo "<h2>Cart is Empty</h2>";
	echo "<h2>Go back to our <a href='".get_home_url()."'>Home Page</a></h2>";
}
else{
	echo "<br><br><br>";
	echo "<h4>My Cart (".$count.")</h4>";
} ?>

<div class="col-xs-12 col-sm-9 col-md-8">
<?php foreach($query as $array){ ?>
<div class="row" style="border: 1px solid #ccc">
	

	<?php 
	$id = $array->id;
	$post_id = $array->phone_id; 
	$price = $array->phone_price;
	$number = $array->number_items;
	$total += $price * $number;
	?>

	<center>
	<div class="col-xs-12 col-sm-5 col-md-4">
		<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post_id)); ?>" id="cart-img-thumbnail">
	</div>

	<div class="col-xs-12 col-sm-7 col-md-8">
		<h3><?php echo $array->phone_name ;?></h3>
		<h4>Price: <?php echo $price*$number; ?></h4>

		<form action="" method="post" style="display: inline-block;">
			<input type="hidden" value="<?php echo $id ?>" name="increase_id">
			<input type="hidden" value="<?php echo $number ?>" name="number">

			<button type="submit" style="background: none;border-radius: 50%;border: 2px solid #ddd">+</button>
		</form>

		<div style="display: inline-block;border: 1px solid #ccc; padding: 1vmin 2vmin;margin: 0 2vmin;"> <?php echo $number; ?></div>

		<form  action="" method="post" style="display: inline-block;">
			<input type="hidden" value="<?php echo $id ?>" name="decrease_id">
			<input type="hidden" value="<?php echo $number ?>" name="number">

			<button type="submit" style="background: none;border-radius: 50%;border: 2px solid #ddd;width: 100%; height: auto; padding-left: 1.25vmin;padding-right: 1.25vmin;">-</button>
		</form>

		<br>
		
		<form action="" method="post" style="display: block;">
			<input type="hidden" value="<?php echo $id ?>" name="delete_id">

			<button type="submit" name="delete" style="background: none; border:none;">Remove From Cart</button>
		</form>

	</center>
</div>


</div>

<div class="col-xs-12 col-sm-3 col-md-4" style="border: 1px solid #ccc">

	<h3>Total: <?php echo $total; ?> </h3>
	<form action="#" type="post">
	<input type="hidden" value="<?php echo $total ?>" name="total">
	<button type="submit" class="btn btn-primary btn-block">Confirm</button>
	<br>
	</form>

</div>

<?php } ?>
</div>





<?php get_footer(); ?>