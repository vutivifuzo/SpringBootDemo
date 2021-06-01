
<?php

  include("connects.php");
  include("function.php");
  
  if(logged_in())
  {
	header("location:first.php");
	exit();
  }
  
    $error  = "";
	
  
//  @mysql_connect('localhost','root','') or die($conn_errror);
 // mysql_select_db('registration') or die($conn_errror);
  
  //echo 'connected';

  if(isset($_POST['submit']))
  {
  
     $firstName = mysqli_real_escape_string($con,$_POST['fname']);
	 $lastName = mysqli_real_escape_string($con, $_POST['lname']);
	 $email = mysqli_real_escape_string($con, $_POST['email']);
	 $password = $_POST['password'];
	 $passwordConfirm = $_POST['passwordConfirm'];
	 
	 $conditions = isset($_POST['conditions']);
	 
	 if(strlen($firstName) < 3)
	 {
	     $error = "first name must have at least 3 characters";
	 
	 }
	 else if(strlen($lastName) < 3)
	 {
	    $error = "last name must have atleast 3 characters";
	 }
	 else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	 {
	     $error = "Invalid email format";
	 }
	 else if(email_exists($email , $con))
	 {
	 
		$error = "Someone is already registered with this email";
	 }
	 else if(strlen($password) < 4)
	 {
	      $error = "please enter password greater than 3 characters";
	 }
	 else if($password !== $passwordConfirm)
	 {
	     $error = "password does not match";
	 
	 }
	 else
	 {
	   
	    $password = $password;
	  
	  $query = "INSERT INTO users( id,firstName ,lastName ,email,password)VALUES('id','$firstName','$lastName','$email','$password')";


		
		mysqli_query($con ,$query);
		
		 header ("Location:company.php");
	 }
	 	 	  
  }

?>


<!doctype html>

<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
      <title>Registration Page</title>
      <link rel = "stylesheet"  href = "css/style.css" />
	  <link rel = "stylesheet"  href = "css/styl.css" />
	  <link rel = "stylesheet"  href = "css/newsign.css" />
	  
	        <style>
	  
	      body{
		          background: url(i/17.jpg);background-size: 100%;

				  
		  }
	  
	  </style>



</head>
<body>		

			   <div id = "error" style="<?php if($error !=""){ ?> display:block;<?php }?>"><?php echo $error; ?>
	   
	   </div>
	   
	
	   
	
		 
		 
       
	     <div class="box">
	       <img src="i/50.png" class="usrimg">
		   <h2>Register</h2>
		   
			   
		    <form method="Post" action="add.php"  enctype ="multipart/form-data" >
			
			<p>First Name:</p>
			<input type="text" name="fname" class ="inputFields" placeholder="First Name" required/><br/>
			
			<p>Last Name:</p>
			<input type="text" name="lname" class ="inputFields" placeholder="Last Name" required/><br/>
			
			<p>Email:</p>
            <input type="text" name="email" class ="inputFields" placeholder="Email" required/><br/>
			
			<p>Password:</p>
			<input type="password" name="password" class ="inputFields" placeholder="Password" required/><br/>
			
			<p>Re-Enter Password:</p>
			<input type="password" name="passwordConfirm" class ="inputFields" placeholder="Re-enter Password" required/><br/>
				
		
			
			<input type="submit" class ="theButtons" name="submit"/>
	   
				<div id = "menu" >
		 
		 <a href = "company.php" style = "float:right; padding:10px; border-radius:4px; margin-right:40px; background-color:darkgrey; color:bluesky; text-decoration:none;">Next</a>
		 		 <a href = "index.html" style = "float:right; padding:10px; border-radius:4px; margin-right:130px; background-color:darkgrey; color:bluesky; text-decoration:none;" >Cancel</a>
		 
		 </div>
	  <br/><br/><br/> <h2 > Step 1 Out Of 4 </h2>
	   			</form>
				
				
	   
	     </div>
	   
	</div>
	   
	   
	   </div>
	
  

  				<?php  echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";  ?>
<div class="footer-main">
	  <div class="footer-inner">
	    <div class="footer-left">
		<div class="footer-box">
		  <h6>Register</h6>
		 <ul>
				<li><a href="add.php" >User Register</a></li>
				<li><a href="company.php" >Company Register</a></li>
				<li><a href="address.php" >Address Register</a></li>
				<li><a href="compant.php" >Contacts Register</a></li>
				
		 </ul>
		 </div>
		    <div class="footer-box">
		    
		    <ul>
				
				
		     </ul>
		 </div>
		</div>
		
		<div class="footer-left">
		
		    <div class="footer-box">
		     <h6>ADDRESS</h6>
		    
		    <ul>
				    <li> <a>217 pretorius street</a></li>
		    <li><a>Van Erkom biulding</a></li>
			<li><a>Pretoria</a></li>
			<li><a>0002</a></li>
				
		     </ul>
		 </div>
		</div>
		
		<div class="footer-left">
		
		    <div class="footer-box">
		     <h6>Follow us</h6>
		    <ul>
				<li><img style=" right:250;" src="i/g.png"  height="20" width="20">    <a href="http://www.veronatel.com/index.php#" ><i class="fa fa-google-plus">Google+</i></a></li>
				<li><img style=" right:250;" src="i/twitter.png"  height="20" width="20"> <a href="https://twitter.com/Veron_Tech" ><i class="fa fa-twitter">Twitter</a></li>
				<li><img style=" right:250;" src="i/facebook.png"  height="20" width="20"> <a href="https://www.facebook.com/VeronaT-Technologies-1833521950226182/?ref=bookmarks" ><i class="fa fa-facebook">Facebook</a></li>
				<li><img style=" right:250;" src="i/linkedin.png"  height="20" width="20"> <a href="https://www.linkedin.com/" ><i class="fa fa-linkedin">Linkedin</a></li>
				<li><img style=" right:250;" src="i/rss.png"  height="20" width="20"> <a href="#" ><i class="fa fa-rss">RSS</a></li>
				
		     </ul>
		 </div>
		</div>
		
		<div class="footer-right">
		<div class="footer-box">
		<h6>Contact Us</h6>
		<ul>
		<li><a>Tel : +27-1277-27885</a></li>
		<li><a>Cell: +27-7219-04784</a></li>
		<li><a>Fax : +27-8622-41092</a></li>
		<li><img style=" right:250;" src="i/i.png"  height="20" width="30">  <a href="info@veronatel.com">info@veronatel.com</a></li>
         </ul>
		</div>
		
		</div>
		
		<div class="clr"></div>
	  </div>
	</div>
		   
</body>



</html>