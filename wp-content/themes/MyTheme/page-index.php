<?php 

/*
Template Name: Index Page
*/

get_header();
?>

<section class="first">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
    		<div class="item " style="background-image: url('http://localhost/E-Store/wp-content/uploads/2017/09/carousel4.jpg');background-position: top; background-attachment: fixed; background-size: cover; background-repeat:no-repeat;">
      			
    		</div>

    		<div class="item" style="background-image: url('http://localhost/E-Store/wp-content/uploads/2017/09/carousel3.jpg');background-position: center; background-attachment: fixed; background-size: cover; background-repeat:no-repeat;">
      			
    		</div>

    		<div class="item" style="background-image: url('http://localhost/E-Store/wp-content/uploads/2017/09/carousel2.jpg');background-position: top; background-attachment: fixed; background-size: cover; background-repeat:no-repeat;">
      			
    		</div>

    		<div class="item active" style="background-image: url('http://localhost/E-Store/wp-content/uploads/2017/09/carousel1.jpg');background-position: top; background-attachment: fixed; background-size: cover; background-repeat:no-repeat;">
      			
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
</section>

<section class="third">
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
        <a href="http://localhost/E-Store/<?php echo wp_strip_all_tags( get_the_content() ); ?>"><div class="brands" style="background-image: url('<?php echo $image_url ?> ')">
        </div></a>
      </center>
      </div>

      <?php endwhile;

    endif;

    wp_reset_postdata();

    ?>
  </div>

</section>

<?php get_footer(); ?>