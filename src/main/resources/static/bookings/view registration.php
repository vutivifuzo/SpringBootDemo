<?php
	
	include("connect.php");	
	include("functions.php");	
	
	?>

<!DOCTYPE html>
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
  
	<link rel = "stylesheet"  href = "css/styles.css" />
	<link rel = "stylesheet"  href = "css/styl.css" />
	 <title>Superior rentals</title>
	  <style>
	 
	 
			
			body{
					background: url(i/1.jpeg); background-size:100%;
			
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
	 <form>
	 
	   <div class="menu">
	   <a class="btn"  class="active" href="first.php">HOME</a>
		<a  class="btn" href="offerNew.php">BOOK OFFICE</a>

	   <a class="btn" class="active" href="search.php">BOOKED OFFICES</a>
	   <a class="btn" class="active" href="view registration.php">VIEW PROOF</a>
	    
	   
	 </div>
	 
	 </form>
         <br/><br/>
         <h1 style="text-align:center; color:black">Proof of Booked Office</h1>
         <br>
	 <table align="center"  style="margin: 0px auto;" width="600"  border="4" cellpadding="1" cellspacing="6" bgcolor="#333">
 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smartverst";

$email = $_SESSION["email"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname,course,date FROM users where email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	

        echo "<br> Student Number:20200611 ". $row["id"]. " - Full Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
        echo "<br> Coure Name: ". $row["course"]. "<br>";
        echo "<br> Registration Date: ". $row["date"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

<p>Registered Subjects:</p>

<tr bgcolor="white" >



<th ><b><?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smartverst";

$email = $_SESSION["email"];
$course="";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
$sql = "SELECT course FROM users where email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	

        $course=$row["course"];
    }
} else {
    echo "0 results";
}
/*

								 <select name="Course" id="Course" required/><br/>
	  <option value="Media Studies (humanities)">Media Studies (humanities)</option>
    <option value="Public Relations (humanities)">Public Relations (humanities)</option>
    <option value="Somatology (humanities)">Somatology (humanities)</option>
    <option value="Network Sytems (science & technology)">Network Sytems (science & technology)</option>
    <option value="Technical Support (science & technology)">Technical Support (science & technology)</option>
    <option value="Business Information (science & technology)">Business Information (science & technology)</option>
    <option value="Data Science (science & technology)">Data Science (science & technology)</option>
    <option value="Artificial Intelligence Engineer (science & technology)">Artificial Intelligence Engineer (science & technology)</option>
    <option value="Computer Systems Engineering (science & technology)">Computer Systems Engineering (science & technology)</option>

    <option value="BSc in Biomedicine (Health Science)">BSc in Biomedicine (Health Science)</option>
    <option value="Biotechnology(Health Science)">Biotechnology(Health Science)</option>
    <option value="Chemistry(Health Science)">Chemistry(Health Science)</option>
    <option value="Charted Accounting (Economic and Management)">Charted Accounting (Economic and Management)</option>
    <option value="Business Management (Economic and Management)">Business Management (Economic and Management)</option>
    <option value="Retail Management(Economic and Management)">Retail Management(Economic and Management)</option>
  
  </select><br/>



*/
if ($course=="Network Sytems (science & technology)" || $course=="Technical Support (science & technology)"  || $course=="Business Information (science & technology)" || $course=="Data Science (science & technology)" || $course=="Artificial Intelligence Engineer (science & technology)" || $course=="Computer Systems Engineering (science & technology)") {
	
echo "<br> Mathematics 1 <br>";
echo "<br> Applied Engineerin<br>"; 
echo "<br> Programming 1 <br>";
echo "<br> Digital Systems 1 <br>";
echo "<br> Applied Research 1 <br>";
echo "<br> Engineering Communication 1 <br>";
echo "<br> Course Fees : R8800.10<br>";
}else 
if($course=="Media Studies (humanities)" || $course=="Public Relations (humanities)" || $course=="Somatology (humanities)"){

echo "<br> Communication Skills 1 <br>";
echo "<br> Research Skills 1 <br>"; 
echo "<br> Managemant system 1 <br>";
echo "<br> Economics 1 <br>";
echo "<br> Course Fees : R6100.10<br>";


}
else
if($course=="BSc in Biomedicine (Health Science)" || $course=="Biotechnology(Health Science)" || $course=="Chemistry(Health Science)"){



echo "<br> Chemistry 1 <br>";
echo "<br> Statistic Mathematics 1 <br>"; 
echo "<br> Applied research 1 <br>";
echo "<br> Communication Skills 1 <br>";
echo "<br> Applied Communication english 1 <br>";
echo "<br> Course Fees : R7200.10<br>";

}
else
if($course=="Charted Accounting (Economic and Management)" || $course=="Business Management (Economic and Management)" || $course=="Retail Management(Economic and Management)"){

echo "<br> Communication Skills 1 <br>";
echo "<br> Research Skills 1 <br>"; 
echo "<br> Applied Managemant 1 <br>";
echo "<br> Applied Economics 1 <br>";
echo "<br> Accounting 1 <br>";
echo "<br> Applied Mathematics 1 <br>";
echo "<br> Course Fees : R7999.99<br>";


}
else{
	echo "<br>You currently have no Subjects,please contact Our Admin <br>";
echo "<br> Course Fees : R00.00<br>";
} ?></b></th>


</tr>  

 
 
  
  
			  </div>
			
			
			</table>
			<br><br>
	 <div class="imgBx">
	

		


</div>

	 <?php  echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";  ?>
	 	
	 	<style >
	 		
	 		footer {
	background-color: White;
	padding: 10px;
	text-align: center;
	color: gray;
	overflow: hidden;
}

footer .media{
	float: left;
}

footer .lang_selector{
	display: inline;
	color: white;
	padding-right: 10%;
	float: right;
}
	 	</style>	 
		 
	<footer>
			 <p>&copy; 2017 Superior. Design by <a href="#" rel="nofollow">group 1</a></p>
			<div class="media">
				
			</div>
			<div class="lang_selector">
				<
			</div>
		</footer>

	</BODY>
</HTML>