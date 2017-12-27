<?php
$count1 = 0;

if (isset($_GET['err1'])){
	$count1 = $_GET['err1'];
}

?>

<?php 
	if ($count1!== 0 ){
		echo "<script>";
		echo "jQuery(document).ready(function(){";
    	echo 'jQuery("#myModal").modal("show");';

    	echo 'jQuery("#close-modal").click(function(){';
        echo 'jQuery("#myModal").modal("hide");';
     	echo "});})";
     	echo "</script>";
     }
?>

<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="container-fluid">
					<button type="button" class="close" id="close-modal" data-dismiss="modal">×</button>
					<b><h4>LOGIN</h4></b>
				</div>
			</div>
			<div class="modal-body">
				<p>Dont have an account? <a href="http://localhost/E-Store/sign-up">Register</a></p>
				<form action="http://localhost/E-Store/login-script" method="post" >
					<div class="form-group">
						<label for="username">Username:</label>
						<h6 style="display: inline-block; color: red">
							<?php 
								if ($count1==='1'){
									echo "<b>Username Doesn't Exist</b>";
								}
							?>	
						</h6>
							<input type="text" class="form-control" name="username" required>
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<h6 style="display: inline-block; color: red">
							<?php 
								if ($count1==='2'){
									echo "<b>Incorrect Password</b>";
								}
							?>	
						</h6>
							<input type="password" class="form-control" name="user-pwd" required>
					</div>
					<input type="hidden" name="login" value="Yes">
					
					<button type="submit" onsubmit="return false" class="btn btn-primary btn-block login-modal-button">Login</button>
				</form>
				<br>
				<p><a href="#">Forgot Password</a></p>
			</div>
		</div>
	</div>
</div>
