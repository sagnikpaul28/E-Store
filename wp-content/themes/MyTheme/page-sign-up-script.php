<?php
$count = -1;
if ($_POST['signup']){
	$name = $_POST['user-name'];
	$username = $_POST['username'];
	$email = $_POST['user-email'];
	$number = $_POST['user-number'];
	$pwd = $_POST['user-pwd'];
	$pwd2 = $_POST['user-pwd2'];
	$count = 0;

	global $wpdb;

	$table_name = $wpdb->user_list;
	$query = $wpdb ->get_row("SELECT * FROM user_list WHERE username = '".$username."';");
	$query1 = $wpdb ->get_row("SELECT * FROM user_list WHERE email = '".$email."';");
	$query2 = $wpdb-> get_row("SELECT * FROM user_list WHERE number = ".$number.";");


	if ($pwd !== $pwd2){
		$count = 1;
	}
	else if (strlen($pwd) < 6){
		$count = 2;
	}
	else if ($query1){
		$count = 3;
	}
	else if ($query2){
		$count = 4;
	}
	else if ($query){
		$count = 5;
	}
	else{
		$count = 0;
		
		$wpdb->insert( 
			'user_list', 
			array( 
				'name' => $name,
				'username' => $username, 
				'email' => $email,
				'number' => $number,
				'password' => $pwd 
			), 
			array( 
				'%s', 
				'%s',
				'%s',
				'%d',
				'%s' 
			) 
		);
		$_SESSION['username'] = $username;
		
	}
}
if ($count<=0){
	wp_redirect(get_home_url());
}
else{
	wp_redirect("http://localhost/E-Store/sign-up?err=".$count);
}
exit();

?>