<?php
	
	include("connect.php");	
	include("functions.php");	
	
	if(logged_in())
	{
		header("location:first.php");
		exit();
		
		
		
	}
	
	$error = "";
	
	if(isset($_POST['submit']))
	{
		
		$email = $_POST['email'];
		$password = $_POST['password'];
		$checkBox = isset($_POST['keep']);
		
		
		if(email_exists($email,$con))
		{
			$result = mysqli_query($con,"SELECT password FROM users WHERE email='$email' ");
			$retrievePassword = mysqli_fetch_assoc($result);
			
			
			if($password !== $retrievePassword['password'])
			{
				
				$error = "Password is incorrect";
			}
			
			else
			{
				
				$_SESSION['email']= $email;
				
				if($checkbox=="on")
				{
					setcookie("email",$email, time()+3600);
				}
				
				header("location:first.php");
				
			}
			
		}
		else
		{
			$error = "Email does not exist in our database, proceed to register";
		}
		
		
	}
?>







<!DOCTYPE HTML>

<html>

	<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	
	
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="css/newcss.css"> 
		<title>Login Page</title>
			
		
		<style>
			body{
					background: url(i/1.jpeg);background-size: 100% ;
		  
				};
		</style>
	</head>
	
	<body>
	    
	    
	<div class="box">
	       <img src="i/50.png" class="usrimg">
		   <h2>Login</h2>
		   
		   	       <div  id= "formDiv">
		
			
			<div id="formDiv">
					
					<form method="POST" action="login.php" >
					
						
						<p>Email</p>
            <input type="text" class ="inputFields"  name="email" placeholder="Enter Password" required/><br/>
			
			<p>Password</label></p>
			<input type="password" class ="inputFields" name="password" placeholder="Enter Password" required/><br/>
				
						
	
				
						<input type="submit" class="theButtons" name ="submit" value ="login"/><br/><br/>
						
						
						 <a href = "signup.php"  style = "float:right; padding:10px; border-radius:4px; margin-right:20px; background-color:darkgrey; color:bluesky; text-decoration:none;"  >Sign Up </a>
		 <a href = "../index.html" style = "float:right; padding:10px; border-radius:4px; margin-right:80px; background-color:darkgrey; color:bluesky; text-decoration:none;" >Cancel</a>
		 
						
						
						
					</form>
   </div>
	   
	   
	   
	   
	   <div id = "error" style="<?php if($error !=""){ ?> display:block;<?php }?>"><?php echo $error; ?></div>
	  
	   
	   </div>
	   
	   

	</body>
	
	
</html>	
