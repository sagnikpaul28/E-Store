<?php 

if ($_POST['contact']){

	$name = $_POST['user-name'];
	$email = $_POST['user-email'];
	$comments = $_POST['user-query'];

	global $wpdb;

	$wpdb->insert(
		'contact_us',
		array(
			'name'=>$name,
			'email'=>$email,
			'comments'=>$comments
		)
	);

	wp_redirect('http://localhost/E-Store/success1');
}
else{
	wp_redirect('http://localhost/E-Store/contact-us');
}