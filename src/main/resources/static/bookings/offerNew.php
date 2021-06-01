<?php
	
	include("connect.php");	
	include("functions.php");	
	
	

	
	$error = "";
	
	if(isset($_POST['submit']))
	{
		
	 $offer_name = mysqli_real_escape_string($con,$_POST['offer_name']);
	 $offer_code = mysqli_real_escape_string($con,$_POST['offer_code']);
	 $startdate = mysqli_real_escape_string($con,$_POST['startdate']);
	 $enddate = mysqli_real_escape_string($con,$_POST['enddate']);
     $full_name = mysqli_real_escape_string($con,$_POST['full_name']);
     $contact_number= mysqli_real_escape_string($con,$_POST['contact_number']);
     $email= mysqli_real_escape_string($con,$_POST['email']);

	 	$address_id =0;
	    $fees=0;
        $location="";
/*


						<select name="offer_name" id="offer_name">
	                    <option value="">------------------------Select Address (Location)------------------------</option>
                        <option value="4321 New Road,Midrand, SA 12345">4321 New Road,Midrand, SA 12345</option>
                        <option value="1167 New Ave,Randburg, SA 10101">1167 New Ave,Randburg, SA 10101</option>
                        <option value="5667 Wanderas,johannesburg, SA 20010">5667 Wanderas,johannesburg, SA 20010</option>
                        <option value="1321 pretorius street,Pretoria, SA 20010">1321 pretorius street,Pretoria, SA 20010</option>
    
    

*/
if ($offer_name=="4321 New Road,Midrand, SA 12345") {
	
$fees=950;
}else
 if ($offer_name=="1167 New Ave,Randburg, SA 10101") {
	
$fees=850;
}else 
if ($offer_name=="5667 Wanderas,johannesburg, SA 20010") {
	
$fees=750;
}else
if ($offer_name=="1321 pretorius street,Pretoria, SA 20010") {
	
$fees=949;
}else{
	$fees=0.0;
}



	    $sql = 'SELECT * FROM address';
	 
	     $data=mysqli_query($con ,$sql);
	 
	     while($row = $data->fetch_assoc())
	     {
	        $address_id++;
	     }
		 
		  date_default_timezone_set('Africa/johannesburg');
 
         $datetime = new DateTime();
         $DateTim = $datetime->format('Y-m-d H:i:s');
		 
		$query = "INSERT INTO offer(offer_id,full_name,contact_number,email,offer_name , offer_code,startdate,enddate,DateTim,fees, address_id) VALUES('offer_id','$full_name',
		  '$contact_number','$email', '$offer_name','$offer_code','$startdate','$enddate','$DateTim','$fees','$address_id')";
		 
	
				
				if(mysqli_query($con,$query))
				{
		  
		          echo "Office successfully Booked";
		  
				}else{
					echo "Office already Booked";
				}
			
			
		
		
	}
	
?>







<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Superior Rentals</title>
<meta name="description" content="">
<meta name="author" content="">

<html>

	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
      <title>Superior Rentals</title>
     
		<link rel = "stylesheet"  href = "css/styles.css" />
		<link rel = "stylesheet"  href = "css/styl.css" />
		
		
	 <style>
	 
			body{
					background: url(i/1.jpeg); background-size:100% 100%;
			
			     color:black;
				 
				 background-color: rgba(255,255,255,0.6);
    background-blend-mode: lighten;
			}
			
			
			
	 </style>
	 
	 
	</head>
	
	<body>
	
		<?php "<br/><br/><br/>"?>
	
	 <a href = "logout.php"  style = "float:right; padding:10px; margin-right:40px; background-color:grey; color:red; text-decoration:none;">Logout</a>

	 <a class="navbar-brand page-scroll" href="#page-top"><img src="i/Logo.png" alt="Logo" style="height:auto;width: 10%; float:left;"></a>
	 
	 <hr/>
	 
   
  
      <h1 style="color:black">Superior rentals</h1>
	  
	   <?php  echo "<br/><br/>"; ?>
	 
	  
	 
	  
	  <form action="upload.php" method="post" enctype="multipart/form-data">

	 
	   <div class="menu">
	  <a class="btn"  class="active" href="first.php">HOME</a>
		<a  class="btn" href="offerNew.php">BOOK OFFICE</a>

	   <a class="btn" class="active" href="search.php">BOOKED OFFICES</a>
	    
	  
	
			 
	 </div>
	 
	<?php  echo "<br/><br/>"; ?>
	  
      <h1 style="text-align:center; color:black">BOOK OFFICE</h1>
	 
	 <br/><br/><br/>
<label>Full Name:</label><br/>
			<input type="text" class ="inputFields"  name="full_name" placeholder="Enter Full Name" required/><br/><br/>

			<label>Contact Number:</label><br/>
			<input type="text" class ="inputFields"  name="contact_number" placeholder="Enter Contact Number" required/><br/><br/>

			<label>Email Address:</label><br/>
			<input type="text" class ="inputFields"  name="email" placeholder="Enter Email Address" required/><br/><br/>

			<label>Bank Statement (pdf or image):</label><br/>
			<input type="file" name="fileToUpload" id="fileToUpload" accept="application/pdf , application/vnd.ms-excel"/><br><br>

	         <label>Select Location:</label><br/>
	
						<select name="offer_name" id="offer_name" required>
	                    <option value="">------------------------Select Address (Location)------------------------</option>
                        <option value="4321 New Road,Midrand, SA 12345">4321 New Road,Midrand, SA 12345</option>
                        <option value="1167 New Ave,Randburg, SA 10101">1167 New Ave,Randburg, SA 10101</option>
                        <option value="5667 Wanderas,johannesburg, SA 20010">5667 Wanderas,johannesburg, SA 20010</option>
                        <option value="1321 pretorius street,Pretoria, SA 20010">1321 pretorius street,Pretoria, SA 20010</option>
    
    
  
                    </select><br/><br>
						
						<label>Select Flow:</label><br/>
	
						<select name="offer_code" id="offer_code" required>
	                    <option value="">------------------------Select Office------------------------</option>
                        <option value="floor 2, office 08">floor 2, office 08</option>
                        <option value="floor 2, office 09">floor 2, office 09</option>    
                        <option value="floor 2, office 10">floor 2, office 10</option> 
                        <option value="floor 2, office 11">floor 2, office 11</option> 
                        <option value="floor 2, office 12">floor 2, office 12</option> 
                        <option value="floor 2, office 13">floor 2, office 13</option>
                        <option value="floor 2, office 14">floor 2, office 14</option>
                         <option value="floor 2, office 15">floor 2, office 15</option>   

                         <option value="floor 3, auditorium A1">floor 3, auditorium A1</option> 
                        <option value="floor 3, auditorium A2">floor 3, auditorium A2</option>
                        <option value="floor 3, auditorium A3">floor 3, auditorium A3</option>
                         <option value="floor 3, auditorium A4">floor 3, auditorium A4</option>

                          <option value="floor 4">floor 4</option> 
                        <option value="floor 5">floor 5</option>
                        <option value="floor 6">floor 6</option>
                         <option value="floor 7">floor 7</option>  
  
                    </select><br/><br>
			
              <label>Select Start Date:</label><br/>
	
						<input type="date" name="startdate" required><br/><br>

						<label>Select End Date:</label><br/>
	
						<input type="date" name="enddate" required><br/><br>	
            		


			<div>

					    <input type="submit" name="submit" style="height:25px; width:70px"/> 
           
		   </div>


	
  				<?php  echo "<br/><br/><br/><br/><br/><br/>";  ?>	 
		<!-- Footer Section -->
<div id="footer">
  <div class="container text-center">
    <p>&copy; 2017 Superior. Design by <a href="#" rel="nofollow">group 1</a></p>
  </div>
</div>
		 
		 
	</body>
	
	
</html>	
