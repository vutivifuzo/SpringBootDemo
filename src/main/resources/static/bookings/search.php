<?php
	
	include("connect.php");	
	include("functions.php");	
	
	


	
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
  
  	<link rel = "stylesheet"  href = "css/styles.css" />
<link rel = "stylesheet"  href = "css/sty.css" />
<link rel = "stylesheet"  href = "css/styl.css" />


	 
	 <style>
	 
			body{
					background: url(i/1.jpeg); background-size:100% 100%;
			       
				   color:white;
			
			}
			
		
			
				.pagination{margin-top:30px;}
.pagination li{display:inline-block; margin:0 5px;}
.pagination li a{display: inline-block; padding:8px 12px; border:1px solid #eee;background:grey;}
.pagination li a.active{font-weight:bold; background:#f5f5f5;}
			
			
		
			
			
			
	 </style>
	 
	
	</head>
	
	<body>

   
  
    	<?php "<br/><br/><br/><br"?>
	
	 <a href = "logout.php"  style = "float:right; padding:10px; margin-right:40px; background-color:grey; color:red; text-decoration:none;">Logout</a>

	 <a class="navbar-brand page-scroll" href="#page-top"><img src="i/Logo.png" alt="Logo" style="height:auto;width: 10%; float:left;"></a>
	 
	 <hr/>
	 
   
  
      <h1 style="color:black">Superior rentals</h1>
	  
	   <?php  echo "<br/><br/>"; ?>	
	  
	 <form  action="search.php"  method="post" >
	
	   <div class="menu">
	    <a class="btn"  class="active" href="first.php">HOME</a>
		<a  class="btn" href="offerNew.php">BOOK OFFICE</a>

	   <a class="btn" class="active" href="search.php">BOOKED OFFICES</a>
	    
	  
	  
		
		 
	 </div>
	 
	  <?php  echo "<br/><br/>"; ?>
	  
      <h1 style="text-align:center; color:black">VIEW BOOKED OFFICES</h1>
	 
	 <br/>		
	   	
			
		      <div>
			 
			 <?php echo "</br></br>" ?>
			  
			<table align="center" style="margin: 0px auto;"  width="600"  border="4" cellpadding="1" cellspacing="6" bgcolor="#333">
 
<tr bgcolor="black" >


<th>LOCATION</th>
<th>OFFICE</th>
<th>TIME BOOKED</th>

<th>START AND END DATE</th>
<th>COST/H</th>



</tr>
			  
			    
			  </div>
			
			
			 <?php
			 
							if(isset($_GET['page']))
							{
								$page = $_GET['page'];
							}
							else
							{
								$page = 1;
							}
							
							if($page == '' || $page == 1)
							{
								$page1 = 0;
							}
							else
							{
								$page1 = ($page*10)-10;
							}
			 
						  
				/*	  $query = 'SELECT *
					            From offer
						       ORDER BY offer_id DESC LIMIT '.$page1.', 10';
							   
							   
					*/		    $query = '  SELECT offer.offer_id, offer.offer_name, offer.offer_code, offer.startDate,offer.endDate, offer.DateTim ,offer.fees, ROUND(AVG(rate.ratings),2) AS ratings
 from offer
 LEFT JOIN rate
 ON offer.offer_id = rate.articles
 GROUP BY offer.offer_id 
 ORDER BY offer.offer_id DESC LIMIT '.$page1.', 10';
							   
							   
							   
						
						 $data=mysqli_query($con,$query) or die(mysql_error()) ;

						  while($row = $data->fetch_assoc())
						 {
						  
													  echo "<tr>";
													  
													 
													  echo "<td>".$row['offer_name']."</td>";
													  
													  echo "<td>".$row['offer_code']."</td>";

													  
													  date_default_timezone_set('Africa/Johannesburg');  
  
      $time_ago = strtotime($row['DateTim']);  
      $current_time = time();  
      $time_difference = $current_time - $time_ago;  
      $seconds = $time_difference;  
      $minutes      = round($seconds / 60 );           // value 60 is seconds  
      $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
      $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
      $weeks          = round($seconds / 604800);          // 7*24*60*60;  
      $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
      $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
      
	  
	  if($seconds <= 60)  
      {  
     echo "<td>"."Just Now"."</td>";  
   }  
      else if($minutes <=60)  
      {  
     if($minutes==1)  
           {  
       echo  "<td>"."one minute ago"."</td>";  
     }  
     else  
           {  
       echo "<td>"."$minutes minutes ago"."</td>";  
     }  
   }  
      else if($hours <=24)  
      {  
     if($hours==1)  
           {  
       echo "<td>"."an hour ago"."</td>";  
     }  
           else  
           {  
       echo "<td>"."$hours hours ago"."</td>";  
     }  
   }  
      else if($days <= 7)  
      {  
     if($days==1)  
           {  
       echo "<td>"."yesterday"."</td>";  
     }  
           else  
           {  
       echo "<td>"."$days days ago"."</td>";  
     }  
   }  
     else  if($weeks <= 4.3) //4.3 == 52/12  
      {  
     if($weeks==1)  
           {  
       echo "<td>"."a week ago"."</td>";  
     }  
           else  
           {  
       echo "<td>"."$weeks weeks ago"."</td>";  
     }  
   }  
       else if($months <=12)  
      {  
     if($months==1)  
           {  
       echo "<td>"."a month ago"."</td>";  
     }  
           else  
           {  
       echo "<td>"."$months months ago"."</td>";  
     }  
   }  
      else  
      {  
     if($years==1)  
           {  
       echo "<td>"."one year ago"."</td>";  
     }  
           else  
           {  
       echo "<td>"."$years years ago"."</td>";  
     }  
   }  			

			?>	<div class="offer">
					 <td>

					 <div class="articles-rating">Start:<?php echo $row['startDate']; ?> </div>
					 <div class="articles-rating">End:<?php echo $row['endDate']; ?> </div>

					 </td> 

					  <td>

					 <div class="articles-rating">R<?php echo $row['fees']; ?> </div>
					 

					 </td> 
					 
				</div>	<?php
   
   
   
													  
													  echo "<tr>";
						 }
                   
			   ?>
			    
			</table>
			
<?php	
   $sql = '  SELECT offer.offer_id, offer.offer_name, offer.offer_code, offer.DateTim , ROUND(AVG(rate.ratings),2) AS ratings
 from offer
 LEFT JOIN rate
 ON offer.offer_id = rate.articles
 GROUP BY offer.offer_id ';
			
			 
 $data=mysqli_query($con ,$sql);
 $records = $data->num_rows;
 $records_pages = $records/10;
 $records_pages = ceil($records_pages);
 $prev = $page-1;
 $next = $page+1;
 
 echo '<ul class="pagination">';
 
  if($prev >= 5)
 {
    echo '<li><a href="?page= 1">First</a></li>';
 }
 
 if($prev >= 1)
 {
    echo '<li><a href="?page='.$prev.'">Prev</a></li>';
 }
 
 if($records_pages >= 2)
 {
	for($r = 1; $r <= $records_pages; $r++)
	{
	    $active = $r ==$page? 'class="active"':'';
		echo '<li><a href="?page='.$r.'"'.$active.'>'.$r.'</a></li>';
	}
 }
 
  if($next <= $records_pages && $records_pages >= 2)
 {
    echo '<li><a href="?page='.$next.'">Next</a></li>';
 }
 
   if($next != $records_pages && $records_pages >= 5)
 {
    echo '<li><a href="?page='.$records_pages.'">Last</a></li>';
 }

    echo '</ul>';
 
?>
			
			
			
		 </form>
	
	 <?php  echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";  ?>
	 		 
		 
		<!-- Footer Section -->
<div id="footer">
  <div class="container text-center">
    <p>&copy; 2017 Superior. Design by <a href="#" rel="nofollow">group 1</a></p>
  </div>
</div>
		 
		 
		 
	</body>
	
	
</html>	
