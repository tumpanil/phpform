<html>
	<head>
		<title>php form</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
				<h1 align="center">login</h1>
					<div class="well">
						<form  method="post">
							<div class="form-group">
								<label for="user-name">Username/Email</label>
								<input type="text" class="form-control" name="email">
								<?php echo @$_GET['name'];?>
							</div>
							<div class="form-group>	
								<label for="password">Password<a href="forgotpassword.php" style="float:right">forgot password?</a></label>
								<input type="password" class="form-control" name="pass">
								<?php echo @$_GET['pass'];?>
							</div>
							<button class="btn btn-success btn-block" type="submit" name="submit" style="position:relative;top:15px">login</button>
						<p style="position:relative;top:25px ;" align="center">new user?<a href="newuser.php">sign up</a></p>
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
		if($email=='')
		{
			echo "<script>window.open('login.php?name=name is required','_self')</script>";
			exit();
		}
		if($password=='')
		{
			echo "<script>window.open('login.php?pass=enter password','_self')</script>";
			exit();
		}
		$query="select * from user_table where EMAIL_ID='$email'";
		$run=mysqli_query($conn,$query);
		if(mysqli_num_rows($run)==1)
		{
			$query1="select * from user_table where EMAIL_ID='$email' and Password='$password'";
			$run1=mysqli_query($conn,$query1);
			if(mysqli_num_rows($run1)==1)
			{
				echo "<script>window.open('afterlogin.php','_self')</script>";
			}
			else{
				  echo"<script>alert('enter correct password')</script>";
			}
			
			
		}
		else
		{
			echo "user doesn't exist";
		}
	}

?>