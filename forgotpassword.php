<html>
	<head>
		<title>new password</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<h2 align="center">Reset your password</h2>
					<div class="well">
						<form action="forgotpassword.php" method="post">
							<div class="form-group">
								<label for="email" >enter your email address</label>
								<input type="text" class="form-control" name="email">
							</div>
							<div class="form-group">
								<label for="newpassword">new password</label>
								<input type="password" class="form-control" name="pass">
							</div>
							<div class="form-group">
								<label for="conformpassword">re-enter password</label>
								<input type="password" class="form-control" name="pass1">
							</div>
							<button class="btn btn-success btn-block" type="submit" name="submit">
								Reset your password
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"phpform");
if(isset($_POST['submit']))
{
	$email=$_POST['email'];
	$password=$_POST['pass'];
	$password1=$_POST['pass1'];
	$query="select * from user_table where EMAIL_ID='$email'";
	$run=mysqli_query($conn,$query);
	if(mysqli_num_rows($run)==1){
		if($password==$password1){
			$sql="update user_table set PASSWORD='$password' where EMAIL_ID='$email'";
			if(mysqli_query($conn,$sql)){
				echo "your password has changed successfully";
			}
		}
		else
		{
			echo "re-enter your password";
		}
	}
	else
	{
		echo "your email does't exist";
	}
}	
?>