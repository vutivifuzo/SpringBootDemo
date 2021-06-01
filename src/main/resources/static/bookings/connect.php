<?php
		session_start();
		
		$con = mysqli_connect("localhost","root","","superiorrentals");
		
		if(mysqli_connect_errno())
		{
			echo "Error occured while connecting to database ".mysqli_connect_errno();
		}
		

?>