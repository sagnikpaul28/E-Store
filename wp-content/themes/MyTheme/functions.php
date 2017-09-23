<?php
if (!session_id()) {
session_start();
}
/*
============================================
Activate CSS and JS Files
============================================
*/

wp_enqueue_script('jquery');

function style_enqueue(){
	wp_enqueue_style('bootstrap_css', get_template_directory_uri().'/css/bootstrap.min.css', array(), '', 'all');

	wp_enqueue_style('custom_css', get_template_directory_uri().'/css/style.css', array(), '', 'all');

	wp_enqueue_script('bootsrap_js', get_template_directory_uri().'/js/bootstrap.min.js', array(), '1.0.0', true);

	wp_enqueue_script('custom_js', get_template_directory_uri().'/js/script.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'style_enqueue');


/*
===========================================
Activate Theme Supports
===========================================
*/

function theme_supports(){
	add_theme_support('post-thumbnails');
	add_theme_support('custom-background');
	add_theme_support('menus');

	register_nav_menu('primary', "Primary Header Menu Not Logged In");
	register_nav_menu('secondary', "Primary Header Menu Logged In");

    add_theme_support('post-formats', array("aside", "image", "video"));

	add_theme_support('html5', array('search_form'));

}

add_action('init', 'theme_supports');

/*
====================================================
Sidebar Functions
====================================================
*/

function widget_setup(){
    
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar-1',
        'class' => 'custom',
        'description' => 'Standard Sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>'
    ));
}

add_action('widgets_init', 'widget_setup');



/*
=============================================
Head Functions
=============================================
*/
function removeheaderpart(){
    return '';
}

add_filter('the_generator', 'removeheaderpart');

/*
===========================
Custom Post Type
===========================
*/

function custom_post_types(){

    $labels = array(
        'name' => 'Phones',
        'singular_name' => 'Phones',
        'add_new' => 'Add New Item',
        'all_items' => 'All Items',
        'add_new_item' => 'Add New Item',
        'edit_item' => 'Edit Item',
        'new_item' => 'New Item',
        'view_item' => 'View Item',
        'search_item' => 'Search Item',
        'not_found' => 'No Items Found',
        'not_found_in_trash' => 'No Items in Trash',
        'parent_item_colon' => 'Parent Item'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'author',
            'excerpt',
            'thumbnail',
            'revision',
            'comments',
            'custom-fields',
            'post-formats',
        ),
        'taxonomies' => array('category', 'post_tag'),
        'menu_position' => 5,
        'exclude_from_search' => false
    );

    register_post_type('mobile', $args);

    
}

add_action('init', 'custom_post_types');


/*
===========================================
Walker Class
===========================================
*/

class Walker_Nav_Primary extends Walker_Nav_menu {
    
    function start_lvl( &$output, $depth=0, $args = array() ){ //ul
        $indent = str_repeat("\t",$depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
    }
    
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ //li a span
        
        $indent = ( $depth ) ? str_repeat("\t",$depth) : '';
        
        $li_attributes = '';
        $class_names = $value = '';
        
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        
        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
        $classes[] = 'menu-item-' . $item->ID;
        if( $depth && $args->walker->has_children ){
            $classes[] = 'dropdown-submenu';
        }
        
        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr($class_names) . '"';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
        
        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
        
        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';
        
        $attributes .= ( $args->walker->has_children ) ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';
        
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' <b class="caret"></b></a>' : '</a>';
        $item_output .= $args->after;
        
        $output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        
    }
    
/*  
    function end_el(){ // closing li a span
        
    }
    
    function end_lvl(){ // closing ul
        
    }
*/
    
}