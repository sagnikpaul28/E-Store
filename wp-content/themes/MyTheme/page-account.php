<?php

/*
Template Name: My Account Page
*/

if (!isset($_SESSION['username'])){
	wp_redirect(get_home_url());
}

get_header();

global $wpdb;
$table_name = 'user_list';

$query = $wpdb->get_row("SELECT * FROM user_list WHERE username='".$_SESSION['username']."';");

if ($_POST['first-name'] && $_POST['last-name'] && $_POST['email'] && $_POST['number'] && $_POST['gender']){

	$firstname = $_POST['first-name'];
	$lastname = $_POST['last-name'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	$gender = $_POST['gender'];

	$wpdb->update(
		$table_name,
		array(
			'name' => $firstname,
			'surname' => $lastname,
			'email' => $email,
			'number' => $number,
			'gender' => $gender
		),
		array(
			'username' => $_SESSION['username']
		),
		array(
			'%s',
			'%s',
			'%s',
			'%s',
			'%s'
		),
		array(
			'%s'
		)
	);
}

$err = 0;

if ($_POST['oldpassword'] && $_POST['newpassword'] && $_POST['newpassword2']){
	$pass = $query->password;
	$oldpassword = $_POST['oldpassword'];
	$newpassword = $_POST['newpassword'];
	$newpassword2 = $_POST['newpassword2'];

	if ($pass !== $oldpassword){
		$err = 1;
	}
	else if ($newpassword !== $newpassword2){
		$err = 2;
	}
	else if (strlen($newpassword) < 6){
		$err = 3;
	}
	else{
		$err = 0;
	}

	$wpdb->update(
		$table_name,
		array(
			'password' => $newpassword
		),
		array(
			'username' => $_SESSION['username']
		),
		array(
			'%s'
		),
		array(
			'%s'
		)
	);
}

if ($_POST['reset']){
	$err = 0;
}
?>
<br><br><br>

<div class="container">
	<div class="col-xs-12 col-sm-4" id="account-info">
		<h3 id="account-hello">Hello,</h3>
		<h2 id="account-username"><?php echo $_SESSION['username']; ?></h2>
		<br>
		<h4 id="account-subheading"><a href="http://localhost/E-Store/log-out">Not <?php echo $_SESSION['username']; ?>? Log out.</a></h5>
		<h4 id="account-subheading" onclick="PasswordChange()">Change Password</h5>

	</div>

	<div class="col-xs-12 col-sm-8" id="account-div">


		<?php if ($err === 0){ ?>
		<form action="" method="post" style="display: inherit;" id="info" class="account-form">
		
		<?php }else{ ?>
		<form action="" method="post" style="display: none" id="info"  class="account-form">
		
		<?php } ?>
		
		<h3 style="display: inline-block;">Personal Information</h3>
		
		<h5 id="account-edit-button" onclick="AtrributeDisable()">Edit</h5>
		
		<div class="form-group">
			<label>First Name:</label>
			<input disabled type="text" name="first-name" value="<?php echo $query->name; ?>" class="form-control" id="first-name">
		</div>
		<div class="form-group">
			<label>Last Name:</label>
			<input disabled type="text" name="last-name" value="<?php echo $query->surname; ?>" class="form-control" id="last-name">
		</div>
		<label>Gender:</label>
		<br>
		<div class="radio-inline">
			<label class="radio-inline"><input <?php if ($query->gender === 'M'){echo "checked='checked'"; } ?> disabled type="radio" name="gender" value="M" id="gender-male">Male</label>
		</div>
		<div class="radio-inline">
			<label class="radio-inline"><input disabled type="radio" name="gender" value="F" id="gender-female">Female</label>
		</div>
		<br>
		<div class="form-group">
			<label>Email:</label>
			<input disabled type="email" name="email" value="<?php echo $query->email; ?>" class="form-control" id="email">
		</div>
		<div class="form-group">
			<label>Number:</label>
			<input disabled type="number" name="number" value="<?php echo $query->number; ?>" class="form-control" id="number">
		</div>

		<button type="submit" class="btn btn-primary btn-block" id="change" name="change" style="display: inline-block; display: none;">Save Changes</button>

		<button type="button" class="btn btn-primary btn-block" id="cancel" style="display: inline-block; display: none;" onclick="AttributeEnable()">Cancel</button>
		</form>

		
		<?php if ($err === 0 ){ ?>
		<div id="passwordchange" style="display: none;">
		<?php }else{ ?>
		<div id="passwordchange" style="display: inherit;">
		<?php } ?>

		
			
		<form action="" method="post"  class="account-form">	
			<br>
			
			<div class="form-group">
				<label id="account-password-fields">Old Password:</label>
				<?php if ($err === 1){ ?>
				<h5 id="account-password-fields-incorrect">Password isn't correct</h5>
				<?php } ?>
				<input type="password" id="oldpassword" name="oldpassword" class="form-control" required>
			</div>
			<div class="form-group">
				<label id="account-password-fields">New Password:</label>
				<?php if ($err === 3){ ?>
				<h5 id="account-password-fields-incorrect">Password is too small</h5>
				<?php } ?>
				<input type="password" id="newpassword" name="newpassword" class="form-control" required>
			</div>
			<div class="form-group">
				<label id="account-password-fields">ReEnter New Password:</label>
				<?php if ($err === 2){ ?>
				<h5 id="account-password-fields-incorrect">Passwords don't match</h5>
				<?php } ?>
				<input type="password" id="newpassword2" name="newpassword2" class="form-control" required>
			</div>

			<button type="submit" class="btn btn-block btn-primary" id="password_change">Submit</button>
		</form>
		<br>

		<?php if ($err !== 0){ ?>
		<form action="" method="post" id="cancelpasswordchange" style="display: inherit"  class="account-form">
		<?php }else{ ?>
		<form action="" method="post" id="cancelpasswordchange" style="display: none" class="account-form">
		<?php } ?>

			<input type="hidden" value="1" name="reset">
			<button type="submit" class="btn btn-primary btn-block" id="cancell">Cancel</button>
		</form>
	</div>

	
</div>

	<?php 
	if($_POST['first-name']){ ?>

	<center><h3 id="account-submitted">Changes Saved</h3></center>

	<?php 
	}
	else if ($_POST['oldpassword'] && $err === 0){ ?>
	<center><h3 id="account-submitted">Password Changed</h3></center>

	<?php }

	?>



<?php
get_footer();
?>