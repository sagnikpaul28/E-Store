<?php
/*
Template Name: Forgot Your Password
*/

get_header(); ?>
<center>
	<div class="container">

		<?php 
		global $wpdb;

		if (isset($_POST['password1']) && isset($_POST['password2'])){
			$password = $_POST['password1'];
			$password = strip_tags($password);
			$password = esc_sql($password);
			$email = $_POST['forgot-email'];
			$email = strip_tags($email);
			$email = esc_sql($email);

			$wpdb->update(
				'user_list',
				array(
					'password' => $password
				),
				array(
					'email' => $email
				),
				array(
					'%s'
				),
				array(
					'%s'
				)
			);
			$wpdb->delete(
				'forgotpassword',
				array(
					'email' => $email
				),
				array(
					'%s'
				)
			);
			?>

			<h1 id="success-heading">Your Password has been reset. <a href="#myModal" data-toggle="modal">Click here</a> to login now.</h1>
			
			<?php
		}
		else if (isset($_POST['code']) && isset($_POST['forgot-email'])){
			
			$code = $_POST['code'];
			$code = strip_tags($code);
			$code = esc_sql($code);
			$forgot_email = $_POST['forgot-email'];
			$forgot_email = strip_tags($forgot_email);
			$forgot_email = esc_sql($forgot_email);

			if ($wpdb->get_row("SELECT * FROM forgotpassword WHERE email='".$forgot_email."' AND code='".$code."';")){ ?>
				<form action="" method="post" id="change-password-div">
					<input type="hidden" name="forgot-email" value="<?php echo $forgot_email; ?>">
					<div class="form-group">
						<label style="display: inline-block; float: left;">Enter new password:</label><span style="display: inline-block; float: right; color: red;" id="span1">Password too short</span>
						<input type="password" class="form-control" required name="password1" id="password1">
					</div>
					<div class="form-group">
						<label style="display: inline-block; float: left;">ReEnter new password:</label><span style="display: inline-block; float: right; color: red;" id="span2">Passwords don't match</span>
						<input type="password" class="form-control" required name="password2" id="password2">
					</div>
					<button id="reset" class="btn btn-primary btn-block">Reset Your Password</button>
				</form>

			<?php 
			}else{ 
			?>
				<form action="" method="post" id="confirmation-code-submit">
					<div class="form-group">
						<label>Enter your email:</label>
						<input type="email" class="form-control" required id="email-input" disabled value="<?php echo $forgot_email; ?>">
					</div>
					<input type="hidden" name="forgot-email" value="<?php echo $forgot_email; ?>">
					<p id="code-has-been-sent-heading">We have sent you an email to <?php echo $forgot_email; ?> containing a six digit code. Check your email.</p>
					<div class="form-group" id="six-digit-code">
						<label>Enter 6 digit Code:</label>
						<input type="text" name="code" class="form-control" required>
					</div>
					<button id="confirmation-code-button" class="btn btn-primary btn-block">Reset Your Password</button>
				</form>

			<?php 
			}

		}
		else if (isset($_POST['forgot-email'])){ 
			$random_number = rand(1, 999999);
			$forgot_email = $_POST['forgot-email'];
			$forgot_email = strip_tags($forgot_email);
			$forgot_email = esc_sql($forgot_email);

			$query = $wpdb->get_row("SELECT * FROM forgotpassword WHERE email='".$forgot_email."';" );
			if ($query){
				$wpdb->update(
					'forgotpassword',
					array(
						'code' => $random_number
					),
					array(
						'email' => $forgot_email
					),
					array(
						'%s'
					),
					array(
						'%s'
					)
				);
			}else{
				$wpdb->insert(
					'forgotpassword',
					array(
						'email' => $forgot_email,
						'code' => $random_number
					),
					array(
						'%s',
						'%s'
					)
				);
			}
			mail($forgot_email, 'Reset Your Password', 'Enter the following code to reset your password for Mobile Store: '.$random_number, 'From: Mobile Store <noreplymobilestore@gmail.com>\r\nTo: '.$forgot_email.'\r\n');

			?>

		<form action="" method="post" id="confirmation-code-submit">
			<div class="form-group">
				<label>Enter your email:</label>
				<input type="email" class="form-control" required id="email-input" disabled value="<?php echo $forgot_email; ?>">
			</div>
			<input type="hidden" name="forgot-email" value="<?php echo $forgot_email; ?>">
			<p id="code-has-been-sent-heading">We have sent you an email to <?php echo $forgot_email; ?> containing a six digit code. Check your email.</p>
			<div class="form-group" id="six-digit-code">
				<label>Enter 6 digit Code:</label>
				<input type="text" name="code" class="form-control" required>
			</div>
			<button id="confirmation-code-button" class="btn btn-primary btn-block">Reset Your Password</button>
		</form>

		<?php 
		}else{
		?>

		<form action="" method="post" id="forgot-password">
			<div class="form-group">
				<label>Enter your email:</label>
				<input type="email" name="forgot-email" class="form-control" required id="email-input">
			</div>
			<button id="send-email" class="btn btn-primary btn-block">Send Confirmation Email</button>
		</form>
		<?php 
		}
		?>
		
	</div>
</center>


<?php
get_footer();
?>

<script>
	jQuery('#reset').prop('disabled', true);
	var x = jQuery('#password1').val();
	var y = jQuery('#password2').val();
	jQuery('#span1').hide();
	jQuery('#span2').hide();

	jQuery('#password1').keyup(function(){
		jQuery('#reset').prop('disabled', true);
		var x = jQuery('#password1').val();
		var y = jQuery('#password2').val();
		jQuery('#span1').hide();
		jQuery('#span2').hide();
		if (x.length < 6){
			jQuery('#span1').show();
			jQuery('#reset').prop('disabled', true);
		}
		else if (x!=y){
			jQuery('#span2').show();
			jQuery('#reset').prop('disabled', true);
		}
		else{
			jQuery('#reset').prop('disabled', false);
		}		
	});
	jQuery('#password2').keyup(function(){
		jQuery('#reset').prop('disabled', true);
		var x = jQuery('#password1').val();
		var y = jQuery('#password2').val();
		jQuery('#span1').hide();
		jQuery('#span2').hide();
		if (x.length < 6){
			jQuery('#span1').show();
			jQuery('#reset').prop('disabled', true);
		}
		else if (x!=y){
			jQuery('#span2').show();
			jQuery('#reset').prop('disabled', true);
		}
		else{
			jQuery('#reset').prop('disabled', false);
		}		
	});

</script>