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
	 
	  $company_name = mysqli_real_escape_string($con,$_POST['company_name']);
	  
	  $registration_no = mysqli_real_escape_string($con,$_POST['registration_no']);
	 $name = mysqli_real_escape_string($con,$_POST['name']);

	 $location = mysqli_real_escape_string($con, $_POST['location']);
	 $country = mysqli_real_escape_string($con, $_POST['country']);
	 
	 
	$insertQuery = "INSERT INTO company(company_id ,company_name,registration_no,name,location,country) VALUES('NULL', '$company_name','$registration_no','$name','$location', '$country')";
	 	 
	 
	 	if(mysqli_query($con,$insertQuery))
				{
						$error = "You are successfully registered";
						header("location:address.php");	
				}
		
	
		
	}
	
	
?>







<!DOCTYPE HTML>

<html>

	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel = "stylesheet"  href = "css/style.css" />

    
    <link rel = "stylesheet"  href = "css/styl.css" />
 
  <link rel = "stylesheet"  href = "css/newsign.css" />
 
	 <title>Info about companies</title>
	 
	 <style>
	 
			body{
					background: url(i/1.jpeg); background-size:100% 100%;
					
					background-color: rgba(255,255,255,0.7);
    background-blend-mode: lighten;
			
			   
			}
			
			
			
			
	 </style>
	
	</head>
	
	<body>
	
	  
   <div class="box">	   
   <img src="i/50.png" class="usrimg">

	  
	<form action="company.php"  method="post" >
	
      <h2 >Company Details</h2>
	
	   
	  
			<label>Company Name:</label><br/>
			<input type="text" class ="inputFields"  name="company_name" placeholder="Company Name" required/><br/><br/>
			
			
			
			<label>Company Registration NO:</label><br/>
			<input type="text" class ="inputFields"  name="registration_no" placeholder="Registration No" required/><br/><br/>
			
			<select name="name">
			
				<option>--SELECT COMPANY ACTIVITY--</option>
					<?php
						$Empnames= array(


"Agriculture and Mining",

"Farming and Ranching",

"Fishing, Hunting and Forestry and Logging",

"Mining and Quarrying",

"Agriculture & Mining Other",
"",

"Business Services",

"Accounting and Tax Preparation",

"Advertising, Marketing and PR",

"Data and Records Management",

"Facilities Management and Maintenance",

"HR and Recruiting Services",

"Legal Services",

"Management Consulting",

"Payroll Services",

"Sales Services",

"Security Services",

"Business Services Other",
"",


"Computer and Electronics",

"Audio, Video and Photography",

"Computers, Parts and Repair",

"Consumer Electronics, Parts and Repair",

"IT and Network Services and Support",

"Instruments and Controls",

"Network Security Products",

"Networking equipment and Systems",

"Office Machinery and Equipment",

"Peripherals Manufacturing",

"Semiconductor and Microchip Manufacturing",

"Computer and Electronics Other",
"",

"Consumer Services",

"Automotive Repair and Maintenance",

"Funeral Homes and Services",

"Laundry and Dry Cleaning",

"Parking Lots and Garage Management",

"Personal Care",

"Photofinishing Services",

"Consumer Services Other",
"",

"Education",

"Colleges and Universities",

"Elementary and Secondary Schools",

"Libraries, Archives and Museums",

"Sports, Arts, and Recreation Instruction",

"Technical and Trade Schools",

"Test Preparation",

"Education Other",
"",

"Energy and Utilities",

"Alternative Energy Sources",

"Gas and Electric Utilities",

"Gasoline and Oil Refineries",

"Sewage Treatment Facilities",

"Waste Management and Recycling",

"Water Treatment and Utilities",

"Energy and Utilities Other",
"",

"Financial Services",

"Banks",

"Credit Cards and Related Services",

"Credit Unions",

"Insurance and Risk Management",

"Investment Banking and Venture Capital",

"Lending and Mortgage",

"Personal Financial Planning and Private Banking",

"Securities Agents and Brokers",

"Trust, Fiduciary, and Custody Activities",

"Financial Services Other",
"",

"Government",

"International Bodies and Organizations",

"Local Government",

"National Government",

"State/Provincial Government",

"Government Other",
"",

"Health, Pharmaceuticals, and Biotech",

"Biotechnology",

"Diagnostic Laboratories",

"Doctors and Health Care Practitioners",

"Hospitals",

"Medical Devices",

"Medical Supplies and Equipment",

"Outpatient Care Centers",

"Personal Health Care Products",

"Pharmaceuticals",

"Residential and Long-term Care Facilities",

"Veterinary Clinics and Services",

"Health, Pharmaceuticals, and Biotech Other",
"",

"Manufacturing",

"Aerospace and Defense",

"Alcoholic Beverages",

"Automobiles, Boats and Motor Vehicles",

"Chemicals and Petrochemicals",

"Concrete, Glass and Building Materials",

"Farming and Mining Machinery and Equipment",

"Food and Dairy Product Manufacturing and Packaging",

"Furniture Manufacturing",

"Metals Manufacturing",

"Nonalcoholic Beverages",

"Paper and Paper Products",

"Plastics and Rubber Manufacturing",

"Textiles, Apparel and Accessories",

"Tools, Hardware and Light Machinery",

"Manufacturing Other",
"",

"Media and Entertainment",

"Adult Entertainment",

"Motion Picture Exhibitors",

"Motion Picture and Recording Producers",

"Newspapers, Books, and Periodicals",

"Performing Arts",

"Radio, Television Broadcasting",

"Media and Entertainment Other",
"",

"Non-profit",

"Advocacy Organizations",

"Charitable Organizations and Foundations",

"Professional Associations",

"Religious Organizations",

"Social and Membership Organizations",

"Trade Groups and Labor Unions",

"Non-profit Other",
"",

"Other",

"Other",
"",

"Real Estate and Construction",

"Architecture, Engineering and Design",

"Construction Equipment and Supplies",

"Construction and Remodeling",

"Property Leasing and Management",

"Real Estate Agents and Appraisers",

"Real Estate Investment and Development",

"Real Estate and Construction Other",
"",

"Retail",

"Automobile Dealers",

"Automobile Parts and Supplies",

"Beer, Wine and Liquor Stores",

"Clothing and Shoe Stores",

"Department Stores",

"Florist",

"Furniture Stores",

"Gasoline Stations",

"Grocery and Specialty Stores",

"Hardware and Building Material Dealers",

"Jewelry, Luggage, and Leather Goods",

"Office Supplies Stores",

"Restaurants and Bars",

"Sporting Goods, Hobby, Books and Music Stores",

"Retail Others",
"",

"Software and Internet",

"Data Analytics, Management, and Internet",

"E-Commerce and Internet Business",

"Games and Gaming",

"Software",

"Software and Internet Other",
"",

"Telecommunications",

"Cable and Television Providers",

"Telecommunications Equipment and Accessories",

"Telephone Service Providers and Carriers",

"Video and Teleconferencing",

"Wireless and Mobile",

"Telecommunications Other",
"",

"Transportation and Storage",

"Air Couriers and Caro Services",

"Airport, Harbor, and Terminal Operations",

"Freight Hauling (Rail and Truck)",

"Marine and Inland Shipping",

"Moving Companies and Services",

"Postal, Express Delivery and Couriers",

"Warehousing and Storage",

"Transportation and Storage Other",
"",

"Travel Recreation and Leisure",

"Amusement Parks and Attractions",

"Cruise Ship Operations",

"Gambling and Gaming Lodging",

"Participatory Sports and Recreation",

"Passenger Airlines",

"Rental Cars",

"Resorts and Casinos",

"Spectator Sports and Teams",

"Taxi, Buses and Transit Systems",

"Travel Agents and Services",

"Travel, Recreations and Leisure Other",
"",

"Wholesale and Distribution",

"Apparel Wholesalers",

"Automobile Parts Wholesalers",

"Beer, Wine and Liquor Wholesalers",

"Chemicals and Plastics Wholesalers",

"Grocery and Food Wholesalers",

"Lumber and Construction Materials Wholesalers",

"Metal and Mineral Wholesalers",

"Office Equipment and Suppliers Wholesalers",

"Petroleum Products Wholesalers",

"Wholesale and Distribution Other"

						);
						foreach($Empnames as $name){
					?>
					<option><?php echo $name; ?></option>
					<?php } ?>
			</select><br/><br/>
			
			<label>Company location:</label><br/>
            <input type="text" class ="inputFields"  name="location" placeholder="Company Location" required/><br/><br/>
			
			
			
			<select name="country">
				<option>--Select Country--</option>
					<?php
						$Empnames= array(

"Afghanistan",
"Albania",
"Algeria",
"Andorra",
"Angola",
"Antigua and Barbuda",
"Argentina",
"Armenia",
"Australia",
"Austria",
"Azerbaijan",

"The Bahamas",
"Bahrain",
"Bangladesh",
"Barbados",
"Belarus",
"Belgium",
"Belize",
"Benin",
"Bhutan",
"Bolivia",
"Bosnia and Herzegovina",
"Botswana",
"Brazil",
"Brunei",
"Bulgaria",
"Burkina Faso",
"Burundi",
"Advertisement",

"Cabo Verde",
"Cambodia",
"Cameroon",
"Canada",
"Central African Republic",
"Chad",
"Chile",
"China",
"Colombia",
"Comoros",
"Congo, Democratic Republic of the",
"Congo, Republic of the",
"Costa Rica",
"Côte d’Ivoire",
"Croatia",
"Cuba",
"Cyprus",
"Czech Republic",

"Denmark",
"Djibouti",
"Dominica",
"Dominican Republic",

"East Timor (Timor-Leste)",
"Ecuador",
"Egypt",
"El Salvador",
"Equatorial Guinea",
"Eritrea",
"Estonia",
"Ethiopia",

"Fiji",
"Finland",
"France",

"Gabon",
"The Gambia",
"Georgia",
"Germany",
"Ghana",
"Greece",
"Grenada",
"Guatemala",
"Guinea",
"Guinea-Bissau",
"Guyana",

"Haiti",
"Honduras",
"Hungary",

"Iceland",
"India",
"Indonesia",
"Iran",
"Iraq",
"Ireland",
"Israel",
"Italy",

"Jamaica",
"Japan",
"Jordan",

"Kazakhstan",
"Kenya",
"Kiribati",
"Korea, North",
"Korea, South",
"Kosovo",
"Kuwait",
"Kyrgyzstan",

"Laos",
"Latvia",
"Lebanon",
"Lesotho",
"Liberia",
"Libya",
"Liechtenstein",
"Lithuania",
"Luxembourg",

"Macedonia",
"Madagascar",
"Malawi",
"Malaysia",
"Maldives",
"Mali",
"Malta",
"Marshall Islands",
"Mauritania",
"Mauritius",
"Mexico",
"Micronesia, Federated States of",
"Moldova",
"Monaco",
"Mongolia",
"Montenegro",
"Morocco",
"Mozambique",
"Myanmar (Burma)",

"Namibia",
"Nauru",
"Nepal",
"Netherlands",
"New Zealand",
"Nicaragua",
"Niger",
"Nigeria",
"Norway",

"Oman",

"Pakistan",
"Palau",
"Panama",
"Papua New Guinea",
"Paraguay",
"Peru",
"Philippines",
"Poland",
"Portugal",

"Qatar",

"Romania",
"Russia",
"Rwanda",

"Saint Kitts and Nevis",
"Saint Lucia",
"Saint Vincent and the Grenadines",
"Samoa",
"San Marino",
"Sao Tome and Principe",
"Saudi Arabia",
"Senegal",
"Serbia",
"Seychelles",
"Sierra Leone",
"Singapore",
"Slovakia",
"Slovenia",
"Solomon Islands",
"Somalia",
"South Africa",
"Spain",
"Sri Lanka",
"Sudan",
"Sudan, South",
"Suriname",
"Swaziland",
"Sweden",
"Switzerland",
"Syria",

"Taiwan",
"Tajikistan",
"Tanzania",
"Thailand",
"Togo",
"Tonga",
"Trinidad and Tobago",
"Tunisia",
"Turkey",
"Turkmenistan",
"Tuvalu",

"Uganda",
"Ukraine",
"United Arab Emirates",
"United Kingdom",
"United States",
"Uruguay",
"Uzbekistan",


"Vanuatu",
"Vatican City",
"Venezuela",
"Vietnam",

"Yemen",

"Zambia",
"Zimbabwe"

						);
						foreach($Empnames as $country){
					?>
					<option><?php echo $country; ?></option>
					<?php } ?>
			</select>
			
			<br/><br/>
			
			
            <div>

					    <input type="submit" class ="theButtons" name="submit" /> 
           
		   </div>
		   
		   
		    <a href = "signup.php" style = "float:left; padding:10px; border-radius:4px; margin-right:220px; background-color:darkgrey; color:bluesky; text-decoration:none;" >Prev</a>
		    <a href = "address.php" style = "float:left; padding:10px; border-radius:4px; margin-right:30px; background-color:darkgrey; color:bluesky; text-decoration:none;" >Next</a>
		   
		   <br/> <br/>
			 <h2 >Step 2 Out Of 5 </h2>
		   
		</form>
		</div>
		<?php  echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";  ?>
	 		 
	 		 
	 		  
	
		 
		   
	</body>
	
	
</html>	
