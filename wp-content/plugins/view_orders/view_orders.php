<?php 
/*
Plugin Name: View Orders
Plugin URI: http://www.mobile-store.in
Description: View and manage all the orders
Version: 1.0
Author: Sagnik Paul
Author URI: http://www.mobile-store.in
License: None
*/


function orders_post_type(){

    $labels = array(
        'name' => 'Orders',
        'singular_name' => 'Order',
        'add_new' => 'Add New Item',
        'all_items' => 'All Items',
        'add_new_item' => 'Add New Item',
        'edit_item' => 'Edit Item',
        'new_item' => 'New Item',
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
        'capabilities' => array(
            'create_posts' => false,
        ),
        'hierarchical' => false,
        'supports' => array(
            'title',
            'custom-fields',
        ),
        'taxonomies' => array(),
        'menu_position' => 8,
        'exclude_from_search' => false,

    );

    register_post_type('orders', $args);

    
}

add_action('init', 'orders_post_type');


$url = $_SERVER['REQUEST_URI'];
if (strpos($url, "orders")!=false){

    add_filter( 'manage_posts_columns', 'custom_posts_table_head' );
    function custom_posts_table_head( $columns ) {
        unset($columns['date']);
        $columns['customer_name']  = 'Name';
        $columns['customer_email']  = 'Email';
        $columns['customer_number']  = 'Number';
        $columns['customer_total']  = 'Total';
        $columns['customer_delivered_status'] = 'Delivered';
        $columns['customer_date'] = 'Date';
        return $columns;

    }
    add_action( 'manage_posts_custom_column', 'custom_posts_table_content', 10, 2 );

    function custom_posts_table_content( $column_name, $post_id ) {
        global $wpdb;
        if( $column_name == 'customer_name' ) {
            $customer_name = get_post_meta( $post_id, 'customer_name', true );
            echo $customer_name;
        }
        if( $column_name == 'customer_email' ) {
            $customer_email = get_post_meta( $post_id, 'customer_email', true );
            echo $customer_email;
        }
        if( $column_name == 'customer_number' ) {
            $customer_number = get_post_meta( $post_id, 'customer_number', true );
            echo $customer_number;
        }
        if( $column_name == 'customer_total' ) {
            $customer_total = get_post_meta( $post_id, 'customer_total', true );
            echo $customer_total;
        }
        if( $column_name == 'customer_delivered_status' ) {
            $customer_delivered_status = get_post_meta( $post_id, 'customer_delivered_status', true );
            echo $customer_delivered_status;
        }
        if( $column_name == 'customer_date' ) {
            $customer_date = get_post_meta( $post_id, 'customer_date', true );
            echo $customer_date;
        }

    }
}

add_filter( 'post_row_actions', 'remove_row_actions', 10, 1 );

function remove_row_actions( $actions )
{
    if( get_post_type() === 'orders' )
        unset( $actions['view'] );
    return $actions;
}