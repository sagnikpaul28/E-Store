<?php get_header(); ?>

<?php 
if ($_POST['phone-name'] && $_POST['phone-price'] && $_POST['number-items'] && $_POST['phone-id']){
    $name = $_POST['phone-name'];
    $price = (int)$_POST['phone-price'];
    $id = $_POST['phone-id'];
    $number = $_POST['number-items'];
    $number1 = 0;

    global $wpdb;

    $table_name = "username_".$_SESSION['username'];

    $query = $wpdb->get_results("SELECT * FROM $table_name");
    if (!$query){
        $query = $wpdb->get_results("CREATE TABLE ".$table_name." (id int(11) AUTO_INCREMENT PRIMARY KEY, phone_name TEXT NOT NULL, phone_price int(11) NOT NULL, number_items int(11) NOT NULL, phone_id int(11) NOT NULL)");
    }
    else{
        $query = $wpdb->get_row("SELECT * FROM ".$table_name." WHERE phone_name = '".$name."'");
        $number1 = $query->number_items;
    }
    if ($query){
        $query = $wpdb->update(
            $table_name,
            array(
                'phone_price' => $price,
                'number_items'=>$number+$number1
            ),
            array(
                'phone_name'=>$name
            ),
            array(
                '%d',
                '%d'
            ),
            array(
                '%s'
            )
        );
    }
    else{
        $query = $wpdb->insert(
            $table_name,
            array(
                'phone_name' => $name,
                'phone_price' => $price,
                'number_items' => $number,
                'phone_id' => $id
            ),
            array(
                "%s",
                "%d",
                "%d",
                "%d"
            )
        );
    }
}
?>


<div class="container">
	<h2><?php the_title(); ?></h2>

	<?php
	if (have_posts()):
		while(have_posts()): the_post(); ?>

		<?php the_content(); ?>
		<br>

		<div class="col-xs-12 col-md-4">

		<center>
        <?php the_post_thumbnail('medium'); ?>
        <hr>

        <h4>Rs <?php echo get_post_meta(get_the_ID(), 'Price', true); ?></h4>

        <form action="" method="post">
        	<div class="minus-sign" onclick="decrement()"><img src="http://localhost/E-Store/wp-content/uploads/2017/09/minus.png"></div>
        	<input id="number-items" type="number" readonly class="form-control" name="number-items" style="display: inline-block;">
        	<div class="plus-sign" onclick="increment()"><img src="http://localhost/E-Store/wp-content/uploads/2017/09/plus.png"></div>
        	
        	<hr>

        	<input type="hidden" name="phone-name" value="<?php echo get_the_title(); ?>">

        	<input type="hidden" name="phone-price" value="<?php echo get_post_meta(get_the_ID(), 'Price', true); ?>">

            <input type="hidden" name="phone-id" value="<?php echo get_the_ID(); ?>">

            <?php
            if ($_SESSION['username']){
            ?>
        	<button type="submit" class="btn btn-primary btn-block" >Order Now</button>
            <?php
            }else{
            ?>
            <button type="button" class="btn btn-primary btn-block" href="#myModal" data-toggle="modal">Order Now</button>
            <?php
            }
            ?>

        </form>
    	</center>
        </div>

        <div class="col-xs-12 col-md-8">
            <h4>Network</h4>
            <h6>Technology: <?php echo get_post_meta(get_the_ID(), 'Technology', true); ?></h6>
            <h6>SIM: <?php echo get_post_meta(get_the_ID(), 'Sim', true); ?></h6>
            <h4>Display</h4>
            <h6>Size: <?php echo get_post_meta(get_the_ID(), 'Size', true); ?></h6>
            <h6>SIM: <?php echo get_post_meta(get_the_ID(), 'Resolution', true); ?></h6>
            <h4>Platform</h4>
            <h6>OS: <?php echo get_post_meta(get_the_ID(), 'OS', true); ?></h6>
            <h6>Chipset: <?php echo get_post_meta(get_the_ID(), 'Chipset', true); ?></h6>
            <h6>CPU: <?php echo get_post_meta(get_the_ID(), 'CPU', true); ?></h6>
            <h4>Memory</h4>
            <h6>Card Slot: <?php echo get_post_meta(get_the_ID(), 'Memory Card Slot', true); ?></h6>
            <h6>Internal: <?php echo get_post_meta(get_the_ID(), 'Internal Memory', true); ?></h6>
            <h4>Camera</h4>
            <h6>Primary: <?php echo get_post_meta(get_the_ID(), 'Primary Camera', true); ?></h6>
            <h6>Features: <?php echo get_post_meta(get_the_ID(), 'Camera Features', true); ?></h6>
            <h6>Secondary: <?php echo get_post_meta(get_the_ID(), 'Secondary Camera', true); ?></h6>
            <h4>Battery</h4>
            <h6>Capacity: <?php echo get_post_meta(get_the_ID(), 'Battery', true); ?></h6>


        </div>

    <?php endwhile;

    endif;
    ?>

</div>

<?php get_footer(); ?>