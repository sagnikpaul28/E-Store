<?php

if (!$_POST['login']){
	wp_redirect(get_home_url());
}
else{
	$count = 0;
	$username = $_POST['username'];
	$password = $_POST['user-pwd'];


	$query = $wpdb ->get_row("SELECT * FROM user_list WHERE username = '".$username."';");
	
	if ($query->password !== $password){
		$count = 2;
	}
	if (!$query){
		$count = 1;
	}
	if ($count!==0){
		wp_redirect("http://localhost/E-Store/sign-up?err1=".$count);
	}
	else{
		$count = 0;
		$_SESSION['username'] = $username;
		wp_redirect(get_home_url());
	}
}