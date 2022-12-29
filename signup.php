<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$dob = $_POST['dob'];
		$bgroup = $_POST['bgroup'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(5);
			$query = "insert into login (user_id,user_name,password,email,dob,bgroup) values ('$user_id','$user_name','$password','$email','$dob','$bgroup')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
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
        
		background-image: linear-gradient(to bottom, #000000, hsla(341, 90%, 25%, 0.7));
		margin: auto;
		width: 500px;
		padding: 20px;
	}



	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 30px;margin: 10px;color: orange;">Signup</div><br>
			<font size="3" color="white">Name: </font>
			<input id="text" type="text" name="user_name" placeholder="Enter Your Name" REQUIRED><br><br>
			<font size="3"  color="white">Password: </font>
			<input id="text" type="password" name="password" placeholder="Enter Password" REQUIRED><br><br>
			<font size="3" color="white">Email: </font>
			<input id="text" type="Email" name="email" placeholder="Enter Email" REQUIRED><br><br>
			<font size="3" color="white">Date of Birth:</font>
			<input id="text" type="DATE" name="dob" placeholder="Enter date of birth" REQUIRED><br><br>
			<font size="3" color="white">Blood Group:</font> &nbsp; &nbsp;
                <select name="bgroup">
                                <option>O+</option>
                                <option>A+</option>
                                <option>B+</option>
                                <option>AB+</option>
                                <option>O-</option>
                                <option>A-</option>
                                <option>B-</option>
                                <option>AB-</option>
                        </select><br><br><BR>

			<center><input id="button" type="submit" value="Signup"></center><br><br>

			<center>
				<h3> If you are already registered! </h3>
				<h2/><a href="login.php">Click to Login</a>
			</center><br>
		</form>
	</div>
</body>

</html>