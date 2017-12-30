<?php get_header(); ?>

<?php 
if ($_POST['phone-name'] && $_POST['phone-price'] && $_POST['phone-id']){
    $name = $_POST['phone-name'];
    $price = (int)$_POST['phone-price'];
    $id = $_POST['phone-id'];
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
                'number_items'=>$number1 + 1
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
                'number_items' => 1,
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
<br><br>

<div class="container">

	<?php
	if (have_posts()):
		while(have_posts()): the_post(); ?>

        <h1 id="single-page-title"><?php the_title(); ?></h1>

		
    		<br>
            <div class="row">

        		<div class="col-xs-12 col-md-4 single-col" >

        		<center>
                    <div class="thumbnail">
                        <?php the_post_thumbnail('medium'); ?>
                    </div>

                <form action="" method="post">


                    <?php
                    if ($_SESSION['username']){
                    ?>
                    <input type="hidden" name="phone-name" value="<?php echo get_the_title(); ?>">
                    <input type="hidden" name="phone-id" value="<?php echo get_the_ID(); ?>">
                    <input type="hidden" name="phone-price" value="<?php echo get_post_meta(get_the_ID(), 'Price', true); ?>">

                	<button type="submit" class="btn btn-primary btn-block" id="single-submit" >Add To Cart</button>
                    <br>
                    <button type="button" class="btn btn-primary btn-block" onclick="window.location.href = 'http://localhost/E-Store/cart'">Go To Cart</button>
                    <br>

                    <?php
                    }else{
                    ?>
                    <hr>
                    <button type="button" class="btn btn-primary btn-block" href="#myModal" data-toggle="modal">Order Now</button>
                    <br>
                    <button type="button" class="btn btn-primary btn-block" href="#myModal" data-toggle="modal">Go To Cart</button>
                    <br>
                    <?php
                    }
                    ?>

                </form>
                
            	</center>
                </div>

                <div class="col-xs-12 col-md-8">

                    <div id="single-specifications">
                        <h1>Rs <?php echo get_post_meta(get_the_ID(), 'Price', true); ?></h1>
                        <hr>
                        <h3>Network</h3>
                        <h5>Technology: <?php echo get_post_meta(get_the_ID(), 'Technology', true); ?></h5>
                        <h5>SIM: <?php echo get_post_meta(get_the_ID(), 'Sim', true); ?></h5>
                        <h3>Display</h3>
                        <h5>Size: <?php echo get_post_meta(get_the_ID(), 'Size', true); ?></h5>
                        <h5>SIM: <?php echo get_post_meta(get_the_ID(), 'Resolution', true); ?></h5>
                        <h3>Platform</h3>
                        <h5>OS: <?php echo get_post_meta(get_the_ID(), 'OS', true); ?></h5>
                        <h5>Chipset: <?php echo get_post_meta(get_the_ID(), 'Chipset', true); ?></h5>
                        <h5>CPU: <?php echo get_post_meta(get_the_ID(), 'CPU', true); ?></h5>
                        <h3>Memory</h3>
                        <h5>Card Slot: <?php echo get_post_meta(get_the_ID(), 'Memory Card Slot', true); ?></h5>
                        <h5>Internal: <?php echo get_post_meta(get_the_ID(), 'Internal Memory', true); ?></h5>
                        <h3>Camera</h3>
                        <h5>Primary: <?php echo get_post_meta(get_the_ID(), 'Primary Camera', true); ?></h5>
                        <h5>Features: <?php echo get_post_meta(get_the_ID(), 'Camera Features', true); ?></h5>
                        <h5>Secondary: <?php echo get_post_meta(get_the_ID(), 'Secondary Camera', true); ?></h5>
                        <h3>Battery</h3>
                        <h5>Capacity: <?php echo get_post_meta(get_the_ID(), 'Battery', true); ?></h5>
                    </div>

                    <?php 
                    if (get_the_content()): ?>
                    <div id="single-descriptions">
                        <h3>Description</h3> 
                        <h5><?php the_content(); ?></h5>
                    </div>
                    <?php endif; ?>


                </div>
            </div>

        <?php endwhile;

        endif;
        ?>

</div>

<?php get_footer(); ?>