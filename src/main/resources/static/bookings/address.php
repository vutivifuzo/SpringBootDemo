<?php
	
	include("connect.php");	
	include("functions.php");	
	
	
	if(logged_in())
	{
		header("location:first.php");
		exit();
	}
	
	
if(isset($_POST['submit']))
     {
		
		 $address1 = mysqli_real_escape_string($con, $_POST['address1']);
	     $address2 = mysqli_real_escape_string($con, $_POST['address2']);
	     $address3 = mysqli_real_escape_string($con, $_POST['address3']);
		 
		 $contact_id =0;
	 
	    $sql = 'SELECT * FROM contact';
	 
	     $data=mysqli_query($con ,$sql);
	 
	     while($row = $data->fetch_assoc())
	     {
	        $contact_id++;
	     }
		 
		 $insertQuery = "INSERT INTO address(address_id, address1, address2, address3,contact_id) VALUES('address_id','$address1', '$address2', '$address3','$contact_id')";
		 
			
				if(mysqli_query($con,$insertQuery))
				{
						$error = "You are successfully registered";
						header("location:contact.php");	
				}	
					
			}
	
?>







<!DOCTYPE HTML>

<html>

	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
     <link rel = "stylesheet"  href = "css/style.css" />
  	<link rel = "stylesheet"  href = "css/styl.css" />
	<link rel = "stylesheet"  href = "css/newsign.css" />
    
	
	 <title>Info about companies</title>
	 
	 <style>
	 
			body{
					background: url(i/1.jpeg); background-size:100% 100%;
			
			        color:black;
					
					background-color: rgba(255,255,255,0.7);
    background-blend-mode: lighten;
			}
			
			
	 </style>
	 
	
	</head>
	
	<body>
	

       <div class="box">	   
   <img src="i/50.png" class="usrimg">
	  
	 <form  action="address.php"  method="post"  >

	   
	 
      <h2 >Company Address </h2>
	 
	
			<label>First address</label><br/>
			<input type="text" name="address1" class ="inputFields" placeholder="First address"  required/><br/><br/>
			
			<label>Second address</label><br/>
			<input type="text" name="address2" class ="inputFields" placeholder="Second address"  /><br/><br/>
			
			<label>Third address</label><br/>
            <input type="text" name="address3" class ="inputFields" placeholder="Third address"  /><br/><br/>

			<div>

					    <input type="submit" class ="theButtons" name="submit" /> 
           
		   </div>
		   
		   
		    <a href = "company.php" style = "float:left; padding:10px; border-radius:4px; margin-right:220px; background-color:darkgrey; color:bluesky; text-decoration:none;" >Prev</a>
		    <a href = "contact.php" style = "float:left; padding:10px; border-radius:4px; margin-right:30px; background-color:darkgrey; color:bluesky; text-decoration:none;" >Next</a>
		   
		   
		   <br/> <br/>
			 <h2 >Step 3 Out Of 4 </h2>
			
			
			
			</form>
			</div>
			<?php  echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";  ?>
		 
		 
	
		 
		 
	</body>
	
	
</html>	
