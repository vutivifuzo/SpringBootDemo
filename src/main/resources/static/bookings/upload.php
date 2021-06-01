<?php
  
  include("connect.php"); 
  include("functions.php"); 
  $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  

  
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



        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

      if($check !== true) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
      } else {
      echo "File is not an image.";
      $uploadOk = 0;
      }
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



// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "pdf") {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

  
    $query = "INSERT INTO offer(offer_id,full_name,contact_number,email,offer_name , offer_code,startdate,enddate,DateTim,fees, address_id) VALUES('offer_id','$full_name',
      '$contact_number','$email', '$offer_name','$offer_code','$startdate','$enddate','$DateTim','$fees','$address_id')";
     
  
        

 
   

        if(mysqli_query($con,$query))
        {
      

                   // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                 // if everything is ok, try to upload file
               } else {
               if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
              echo "Office successfully Booked";
              header("location:search.php?office successfully booked=1"); 

              } else {
              echo "Sorry, there was an error uploading your file.";
               }
}


              
      
        }else{
          echo "Office already Booked";
           header("location:offerNew.php?office book denied=1");
        }
      
      
    
    
  }
  
?>





