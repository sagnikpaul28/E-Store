<?php

$data = $_POST;
$mac_provided = $data['mac'];  // Get the MAC from the POST data
unset($data['mac']);  // Remove the MAC key from the data.
$ver = explode('.', phpversion());
$major = (int) $ver[0];
$minor = (int) $ver[1];
if($major >= 5 and $minor >= 4){
     ksort($data, SORT_STRING | SORT_FLAG_CASE);
}
else{
     uksort($data, 'strcasecmp');
}

require 'iclass.php';

$api = new Instamojo\Instamojo('3a91ca411f4ad6365d3977e5d534b28d', '367b2fb43864e630ff91f1b42273deab', 'https://test.instamojo.com/api/1.1/');

try {
    $response = $api->paymentRequestStatus($data['payment_request_id']);
    $realstatus = $response['status'];
}

catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}

$mac_calculated = hash_hmac("sha1", implode("|", $data), "9c1aa23eeba04cfb8105b44e4e5348fa");
if($mac_provided == $mac_calculated){

    global $wpdb;
    $data = $_POST;

    $payment_id = $data['payment_id'];
    $payment_request_id = $data['payment_request_id'];
    $total = $data['amount'];
        
    $wpdb->insert(
        'instapayments',
        array(
            'imojo_id' => $payment_request_id,
            'payment_id' => $payment_id,
            'status' => $realstatus
        ),
        array(
            '%s',
            '%s',
            '%s'
        )
    );

    $email = $data['buyer'];

    $query = $wpdb ->get_row("SELECT * FROM user_list WHERE email = '".$email."';");

    $username = "username_".$query->username;

    $wpdb->query("TRUNCATE TABLE ".$username.";");
    $order_no = "Order No ".$payment_id;
    
    $wpdb->insert(
        'wp_posts',
        array(
            'post_date' => date("Y-m-d H:i:s"),
            'post_date_gmt' => date("Y-m-d H:i:s"),
            'post_title' => $order_no,
            'post_type' => 'orders'
        ),
        array(
            '%s',
            '%s',
            '%s',
            '%s'
        )
    );

    $post_id = $wpdb->get_row('SELECT * FROM wp_posts WHERE post_title="'.$order_no.'";');

    $wpdb->insert(
        'wp_postmeta',
        array(
            'post_id' => $post_id->ID,
            'meta_key' => 'customer_name',
            'meta_value' => $query->name." ".$query->surname
        ),
        array(
            '%d',
            '%s',
            '%s'
        )
    );
    $wpdb->insert(
        'wp_postmeta',
        array(
            'post_id' => $post_id->ID,
            'meta_key' => 'customer_email',
            'meta_value' => $query->email
        ),
        array(
            '%d',
            '%s',
            '%s'
        )
    );
    $wpdb->insert(
        'wp_postmeta',
        array(
            'post_id' => $post_id->ID,
            'meta_key' => 'customer_number',
            'meta_value' => $query->number
        ),
        array(
            '%d',
            '%s',
            '%s'
        )
    );
    $wpdb->insert(
        'wp_postmeta',
        array(
            'post_id' => $post_id->ID,
            'meta_key' => 'customer_total',
            'meta_value' => $total
        ),
        array(
            '%d',
            '%s',
            '%s'
        )
    );
    $wpdb->insert(
        'wp_postmeta',
        array(
            'post_id' => $post_id->ID,
            'meta_key' => 'customer_delivered_status',
            'meta_value' => "Not Delivered"
        ),
        array(
            '%d',
            '%s',
            '%s'
        )
    );
    $wpdb->insert(
        'wp_postmeta',
        array(
            'post_id' => $post_id->ID,
            'meta_key' => 'customer_date',
            'meta_value' => $post_id->post_date
        ),
        array(
            '%d',
            '%s',
            '%s'
        )
    );
}
else{
    wp_redirect('http://localhost/E-Store/payment-failure');
}



?>