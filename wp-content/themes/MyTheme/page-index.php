<?php 

/*
Template Name: Index Page
*/

get_header();
?>

<section class="first">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
    		<div class="item active" style="background-image: url(<?php echo wp_get_attachment_url(57); ?>);background-position: top; background-attachment: fixed; background-size: cover; background-repeat:no-repeat;">
      			
    		</div>

    		<div class="item" style="background-image: url(<?php echo wp_get_attachment_url(115); ?>);background-position: center; background-attachment: fixed; background-size: cover; background-repeat:no-repeat;">
      			
    		</div>

    		<div class="item" style="background-image: url(<?php echo wp_get_attachment_url(119); ?>);background-position: top; background-attachment: fixed; background-size: cover; background-repeat:no-repeat;">
      			
    		</div>

    		<div class="item" style="background-image: url(<?php echo wp_get_attachment_url(60); ?>);background-position: top; background-attachment: fixed; background-size: cover; background-repeat:no-repeat;">
      			
    		</div>



    
  		</div>
  		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
    		<span class="glyphicon glyphicon-chevron-left"></span>
    		<span class="sr-only">Previous</span>
  		</a>
  		<a class="right carousel-control" href="#myCarousel" data-slide="next">
    		<span class="glyphicon glyphicon-chevron-right"></span>
    		<span class="sr-only">Next</span>
  		</a>
	</div>
</section>

<section class="second">
  <br>
  <div class="container">
    <h2>Featured Phones</h2>

    <?php 
    $args = array('post_type' => 'mobile', 'orderby' => 'date', 'order' => 'DESC', 'cat' => '69');
    $loop = new WP_Query($args);

    if ($loop -> have_posts()): ?>
    <div class="row">
      <?php while ($loop -> have_posts()): $loop -> the_post(); ?>

      <a href="<?php the_permalink() ?>">
        <div class="col-xs-6 col-sm-4 col-md-3" id="contain">
        
          <center>
            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" id="brands-img-thumbnail">
        
            <?php the_title(sprintf( "<h4 class='title-brands'><a href='%s'>",esc_url(get_permalink())),'</a></h4>'); ?>

            <h5>Rs <?php echo get_post_meta(get_the_ID(), 'Price', true); ?></h5>
          </center>
        </div>
      </a>

      <?php endwhile; 
    endif; ?>

    </div> 

  </div>
  <hr>

</section>

<section class="third">

  <div style="height: 30vh; width: 100vw; background-attachment: fixed; background-position: center; background-image: url(<?php echo wp_get_attachment_url('338'); ?>)">
  </div>
</section>

<section class="fourth">
  <br>
  <div class="container">
    <h2>Our Latest Arrivals</h2>

    <?php 
    $args = array('post_type' => 'mobile', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => '8');
    $loop = new WP_Query($args);

    if ($loop -> have_posts()): ?>
    <div class="row">
      <?php while ($loop -> have_posts()): $loop -> the_post(); ?>

      <a href="<?php the_permalink() ?>">
        <div class="col-xs-6 col-sm-4 col-md-3" id="contain">
        
          <center>
            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" id="brands-img-thumbnail">
        
            <?php the_title(sprintf( "<h4 class='title-brands'><a href='%s'>",esc_url(get_permalink())),'</a></h4>'); ?>

            <h5>Rs <?php echo get_post_meta(get_the_ID(), 'Price', true); ?></h5>
          </center>
        </div>
      </a>

      <?php endwhile; 
    endif; ?>

    </div> 

  </div>
  <hr>

</section>

<section class="fifth">

  <div style="height: 30vh; width: 100vw; background-attachment: fixed; background-position: center; background-image: url(<?php echo wp_get_attachment_url('338'); ?>)">
  </div>
</section>

<section class="sixth">
  <br>
  <div class="container">
    <h2>Budget Phones</h2>

    <?php 
    $args = array('post_type' => 'mobile', 'meta_key' => 'price', 'orderby' => 'meta_value_num', 'order' => 'ASC', 'posts_per_page' => '8');
    $loop = new WP_Query($args);

    if ($loop -> have_posts()): ?>
    <div class="row">
      <?php while ($loop -> have_posts()): $loop -> the_post(); ?>

      <a href="<?php the_permalink() ?>">
        <div class="col-xs-6 col-sm-4 col-md-3" id="contain">
        
          <center>
            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" id="brands-img-thumbnail">
        
            <?php the_title(sprintf( "<h4 class='title-brands'><a href='%s'>",esc_url(get_permalink())),'</a></h4>'); ?>

            <h5>Rs <?php echo get_post_meta(get_the_ID(), 'Price', true); ?></h5>
          </center>
        </div>
      </a>

      <?php endwhile; 
    endif; ?>

    </div> 

  </div>
  <hr>

</section>

<section class="seventh">

  <div style="height: 30vh; width: 100vw; background-attachment: fixed; background-position: center; background-image: url(<?php echo wp_get_attachment_url('338'); ?>)">
  </div>
</section>

<section class="eight">
  <br>
  <div class="container">
	<h2>Shop By your Favourite Brands</h2><br>

		<?php 

    $query = new WP_Query('type=post&category_name="Brand"');
    if ($query->have_posts()):
      while($query->have_posts()): $query->the_post();


      $image_url = wp_get_attachment_url(get_post_thumbnail_id()); ?>

      <div class="col-xs-6 col-sm-4 col-md-3">
        <center>
          <form action="http://localhost/E-Store/shop" method="post" id="brand-<?php echo get_the_content(); ?>">
            <input type="hidden" name="brands[]" value="<?php echo get_the_content(); ?>">
            <a onclick="document.getElementById('brand-<?php echo get_the_content(); ?>').submit();"><div class="brands" style="background-image: url('<?php echo $image_url ?> ')">
            </div></a>
          </form>
        </center>
      </div>

      <?php endwhile;

    endif;

    wp_reset_postdata();

    ?>
  </div>

</section>

<?php get_footer(); ?>