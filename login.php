<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from login where user_name = '$user_name'";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body background="https://images.unsplash.com/photo-1626866059866-90456ddd67ab?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8bW9ybmluZyUyMGJhY2tncm91bmR8ZW58MHx8MHx8&w=1700&q=80s">

	<style type="text/css">
	
	#text{

		height: 25spx;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 140px;
		height: 50px;
		color: white;
		background-color: green;
		border: none;
	}

	#box{
        
		background-image: linear-gradient(to bottom, #000000	, hsla(350, 150%, 25%, 0.7));
		margin: auto;
		width: 400px;
		padding: 20px;
	}
    
    
	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 30px;margin: 10px;color: orange;">Login</div><br>

			<font size="3" color="white">Username:</font>
			<input id="text" type="text" name="user_name" placeholder="Enter Valid Username" REQUIRED><br><br>

			<font size="3" color="white">Password:</font>
			<input id="text" type="password" name="password" placeholder="Enter Password"REQUIRED><br><br><br>

			<center><input id="button" type="submit" value="Login"></center><br><br>

			<center>
				<h3/> If you are new user!
				<h2><a href="signup.php">Click to Signup</a></h2>
			</center><br>
		</form>
	</div>
</body>
</html>