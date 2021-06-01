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
	 
	    
	   
	 </div>
	 
	 </form>
         <br/><br/>
	 <h1 style="text-align:center; color:black">HOME </h1>

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

$sql = "SELECT id, firstname, lastname FROM users where email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> Student Number:20200611 ". $row["id"]. " - Full Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
    }
} else {
    echo "";
}

$conn->close();
?>
<tr bgcolor="white" >


<th >Superior Rentals Welcomes you</th>
<th ><b><?php echo
htmlspecialchars($_SESSION["email"]); ?></b></th>

</tr>  

 
 
  
  
			  </div>
			
			
			</table>
			<br><br>
	 <!-- ajax live search -->
<h3>Search Available Space</h3><br>
<script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>

<form>
<input type="text" size="30" onkeyup="showResult(this.value)">
<div id="livesearch"></div>
</form>

	 <?php  echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";  ?>
	 		 

	<!-- Footer Section -->
<div id="footer">
  <div class="container text-center">
    <p>&copy; 2017 Superior. Design by <a href="#" rel="nofollow">group 1</a></p>
  </div>
</div>
		 
		 

  </body>

</html>