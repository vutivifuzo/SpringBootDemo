

<?php


    	session_start();
    
    $con=mysqli_connect("localhost","root"," ","superiorrentals");
	
	if(mysqli_connect_errno())
	{
	   echo "error occured while connecting to the database".mysqli_connect_errno();
	
	}


?>