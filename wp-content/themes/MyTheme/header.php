<!DOCTYPE html>
<html   <?php language_attributes(); ?> >
    <head>
        <meta charset=" <?php  bloginfo('charset'); ?>">
        <title> <?php bloginfo('name') ?> <?php wp_title('  |  '); ?>  </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:700i|Mukta+Malar:800|Roboto+Slab" rel="stylesheet">
        
        <meta name='description' content="<?php bloginfo('description'); ?>">
        
        <?php wp_head(); ?>
    </head>
    <body>

    	<nav class="navbar navbar-fixed-top">
    		<div class="container-fluid">
    			<div class="navbar-header">
    				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
    					<span class="sr-only"></span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    				</button>
    				<a class="navbar-brand" href="<?php echo home_url(); ?> "> <?php bloginfo('name'); ?> </a>
    			</div>
    			<div class="collapse navbar-collapse" id="myNavbar">
    				<?php 
                    if (!isset($_SESSION['username'])){
                        wp_nav_menu(array(
    					'theme_location' => 'primary',
    					'container' => 'false',
    					'menu_class' => 'nav navbar-nav navbar-right',
                        'walker' => new Walker_Nav_Primary()
    				    ));
                    }
                    else{
                        wp_nav_menu(array(
                        'theme_location' => 'secondary',
                        'container' => 'false',
                        'menu_class' => 'nav navbar-nav navbar-right',
                        'walker' => new Walker_Nav_Primary()
                        ));
                    }
    				?>
    			</div>
    		</div>
    	</nav>

        <?php include "login_modal.php" ?>


        <div class="loader">
            <div class="cssload-loader">
                <div class="cssload-inner cssload-one"></div>
                <div class="cssload-inner cssload-two"></div>
                <div class="cssload-inner cssload-three"></div>
            </div>
            <h1>Loading...</h1>
        </div>