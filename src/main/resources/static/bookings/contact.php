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
  
     
  
     $cell_number = mysqli_real_escape_string($con, $_POST['cell_number']);
	 $telephoneNo1 = mysqli_real_escape_string($con, $_POST['telephoneNo1']);
	 $telephoneNo2 = mysqli_real_escape_string($con, $_POST['telephoneNo2']);
	 $contact_email = mysqli_real_escape_string($con, $_POST['contact_email']);
	 
	 $company_id =0;
	 
	 $sql = 'SELECT * FROM company';
	 
	 $data=mysqli_query($con ,$sql);
	 
	  while($row = $data->fetch_assoc())
	  {
	     $company_id++;
	  }
	
	  
	  
	 $insertQuery = "INSERT INTO contact(contact_id ,cell_number,telephoneNo1, telephoneNo2,contact_email,company_id) VALUES('contact_id', '$cell_number','$telephoneNo1','$telephoneNo2', '$contact_email','$company_id')";
		

			
				if(mysqli_query($con,$insertQuery))
				{
						$error = "You are successfully registered";
						header("location:login.php");	
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
      
	  
	   
	  
	 <form action="contact.php"  method="post" >  <?php //align="center"?>
	
	  
	 
      <h2  >Company Contacts</h2>
	
	  
			
			
			<label>Cell Number</label><br/>
			<input type="text" name="cell_number" class ="inputFields" placeholder="Cell Number" required/><br/><br/>
			
			<label>First Telephone Number</label><br/>
            <input type="text" name="telephoneNo1" class ="inputFields" placeholder="First Telephone Number" required/><br/><br/>
			
			<label>Second Telephone Number</label><br/>
            <input type="text" name="telephoneNo2" class ="inputFields" placeholder="Second Telephone Number"  /><br/><br/>
		
			 
			<label>Company email</label><br/>
			<input type="text" name="contact_email" class ="inputFields" placeholder="Company Email"  required/><br/><br/>

			<div>

					    <input type="submit" class ="theButtons" name="submit"  /> 
           
		   </div>
			
			 <a href = "address.php" style = "float:left; padding:10px; border-radius:4px; margin-right:220px; background-color:darkgrey; color:bluesky; text-decoration:none;" >Prev</a>
		    <a href = "login.php" style = "float:left; padding:10px; border-radius:4px; margin-right:30px; background-color:darkgrey; color:bluesky; text-decoration:none;" >Next</a>
		   
			
			<br/> <br/>
			 <h2 >Step 4 Out Of 4 </h2>
			
			</form>
			</div>
				<?php  echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";  ?>
		 
		 

		 
	</body>
	
	
</html>	
