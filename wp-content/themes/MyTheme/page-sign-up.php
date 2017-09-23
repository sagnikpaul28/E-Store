<?php
if (isset($_SESSION['username'])){
	wp_redirect(get_home_url());
}

if (isset($_GET['err'])){
	$count = $_GET['err'];
}

?>

<?php get_header(); ?>


<div class="container">
	<br>
	<div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-5" style="border: 1px #ddd solid; border-radius: 5px;">
		<h3>Create Account</h3>
		<form action="http://localhost/E-Store/sign-up-script" method="post">
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" class="form-control" name="user-name" required>
			</div>
			<div class="form-group">
				<label for="username">Username:</label>
				<h6 style="display: inline-block; color: red">
					<?php 
					if ($count==='5'){
						echo "<b>Username Already Exists</b>";
					}
					?>	
				</h6>
				<input type="text" class="form-control" name="username" required>
			</div>
			<div class="form-group">
				<label for="email">Email address:</label>
				<h6 style="display: inline-block; color: red">
					<?php 
					if ($count==='3'){
						echo "<b>Email Already Exists</b>";
					}
					?>	
				</h6>
				<input type="email" class="form-control" name="user-email" required>
			</div>
			<div class="form-group">
				<label for="number">Number:</label>
				<h6 style="display: inline-block; color: red">
					<?php 
					if ($count==='4'){
						echo "<b>Number Already Exists</b>";
					}
					?>	
				</h6>
				<input type="number" class="form-control" name="user-number" required>
				</div>
			<div class="form-group">
				<label for="pwd">Password:</label>
				<h6 style="display: inline-block; color: red">
					<?php 
					if ($count==='2'){
						echo "<b>Password must be of atleast 6 characters</b>";
					}
					?>	
				</h6>
				<input type="password" class="form-control" name="user-pwd" required>
			</div>
			<div class="form-group">	
				<label for="pwd2">ReEnter Password:</label>
				<h6 style="display: inline-block; color: red">
					<?php 
					if ($count==='1'){
						echo "<b>Password's don't match</b>";
					}
					?>	
				</h6>
				<input type="password" class="form-control" name="user-pwd2" required>
			</div>
			<input type="hidden" name="signup" value="Yes">
			<hr>
			<button type="Submit" class="btn btn-primary btn-block">Submit</button>
		</form>
		<br>
		<p>Already have an Account? <a href="#myModal" data-toggle="modal">Log In</a>.</p>
	</div>
</div>


<?php



?>
<?php get_footer(); ?>