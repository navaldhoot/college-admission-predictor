<?php	session_start();
		include('database_info.php');
	
	$name=$_SESSION["name"];
	$_SESSION["name"]=$name;

	$mysql = mysqli_connect("$dbservername", "$dbusername", "$dbpassword", "$dbname");
	
	

?>






<!DOCTYPE html>
<head>
	<title>College Admission Predictor</title>
	<link rel="shortcut icon" href="img/favicon.ico" />
	<!----------- INCLUSION OF FONT AWESOME LIBRARY------------->
	<script src="https://use.fontawesome.com/7d44bc7623.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
	
	<!---------- INCLUSION OF VIEWPORT --------------->
<!---------- INCLUSION OF VIEWPORT --------------->
	<meta name="viewport" content="width=1250">
	
	<!----------- INCLUSION OF  CSS FILES  ----------->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="stylesheet" type="text/css" href="css/common.css">
	<!----- INCLUSION OF BOOTSTRAP ------------>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style>
		
		.student-head	p{
			text-align:center;
			font-size:25px;
			color:#5abd56;
			font-weight:600;
			
		
		}
		.student-head{
			margin-top:50px!important;
			margin:20px 0px;
		}
		
		table{
			margin-bottom:70px;
		}
		tr,td {
				width:400px!important;
				padding:20px 0px;
		}
		
		input[type=text],input[type=email],select,input[type=password],input[type=date],input[type=number] {
				width: 100%;
				font-size:18px;
				padding: 12px 20px;
				margin: 8px 0;
				border-bottom
				box-sizing: border-box;
				border: 0;
				outline: 0;
				background: transparent;
				border-bottom: 1px solid black;
			}
			
		
		input[type=submit],input[type=button]{
			padding:10px;	
			
			background:#5abd56;
			border:1px solid;
			font-size:23px;
			margin:0% 75%;
		}
		.move-text{
			width:100%;
			font-size:18px;
			margin:0% 60%;
		}
		.form_head{
			font-size:23px;
			color:black;
			font-style:bold;
			font-weight:500;
		}
		.branch-name{
			font-size:18px;
			color:black;
			padding-left:7px;
		}
		.category-txt{
			font-size:20px;
		}
		
	</style>
</head>

<body>
	<div class="container">
	<div class="row">
	<div class="col-md-4 logo">
		<img src="img/logo.png" >
	</div>
		<div class="col-md-8 clg-heading">
			<h1>College Admission Predictor</h1`>
			<hr class="head-under">
			<h3>For Engineering</h3>
	</div>

	
	</div>
	<div class="row login-menu">
	
	<div class="col-md-12 menu-center">


		<ul>
				<li><a href="#">Add College</a></li>
				<li><a href="admin_add_cutoff.php">Add Cutoff</a></li>
				<li><a href="admin_view_college.php">View College</a></li>
	   			<li><a href="admin_view_cutoff.php">View Cutoff</a></li>
				<li><a href="admin_view_student.php">View Student</a></li>
				<li><a href="admin_add_feedback.php">View Feedback</a></li>
				<li><a href="admin_logout.php">Logout</a></li>
		</ul>
    
	</div>
	
	</div>
	
	<div class="row">
		<div class="col-md-12 student-head">
			<p>Add College</p>
	
		</div>
	
	<form action="add_college.php" method="post">
	
	<div class="col-md-12 student-form">
	
	
	<table align="center">
	<tbody>
	
	<tr>	
	<td class="form_head">College Name</td>
	<td><input type="text" name="clg_name"  id="clg_name" placeholder="College Name">
		<p id="nerror"></p></td>
			</tr>
	
	<tr>	
	<td class="form_head">Address</td>
	<td><input type="text" name="clg_addr" id="clg_addr" placeholder="Address">
	<p id="aerror"></p></td>
			</tr>
	
	
	
	<tr>	
	<td class="form_head">City</td>
	<td><input type="text" name="clg_city" id="clg_city" placeholder="City ">
	<p id="cierror"></p></td>
			</tr>


	<tr>	
	<td class="form_head">Pincode</td>
	<td><input type="number" name="clg_pin" id="clg_pin" placeholder="Pincode">
	<p id="perror"></p></td>
			</tr>

	

	<tr>	
	<td class="form_head">Contact Number</td>
	<td><input type="number" name="clg_contact" id="clg_contact" placeholder="Contact Number">
	<p id="conerror"></p></td>
			</tr>
	
	<tr>
	<td class="form_head">Branch</td>

		<td>	<input type="checkbox" name="clg_stream[]" id="clg_stream[]" value="Automobile Engineering(AUTO)" id="clg_stream"><span class="branch-name">Automobile Engineering(AUTO)</span><br>
				<input type="checkbox" name="clg_stream[]" id="clg_stream[]" value="Biomedical Engineering(BM)" id="clg_stream"><span class="branch-name">Biomedical Engineering(BM)</span><br>
				<input type="checkbox" name="clg_stream[]" id="clg_stream[]" value="Bio-Technology(BT)" id="clg_stream"><span class="branch-name">Bio-technology(BT)</span><br>
				<input type="checkbox" name="clg_stream[]" id="clg_stream[]" value="Chemical Engineering(CHEM)" id="clg_stream"><span class="branch-name">Chemical Engineering(CE)</span><br>
				<input type="checkbox" name="clg_stream[]" id="clg_stream[]" value="Civil Engineering(CE)" id="clg_stream"><span class="branch-name">Civil Engineering(CE)</span><br>
				<input type="checkbox" name="clg_stream[]" id="clg_stream[]" value="Computer Science & Engineering(CSE)" id="clg_stream"><span class="branch-name">Computer Science & Engineering(CSE)</span><br>
				<input type="checkbox" name="clg_stream[]" id="clg_stream[]" value="Electrical Engineering(EE)" id="clg_stream"><span class="branch-name">Electrical Engineering(EE)</span><br>
				<input type="checkbox" name="clg_stream[]" id="clg_stream[]" value="Electronics & Communication Engineering(ECE)" id="clg_stream"><span class="branch-name">Electronics & Communication Engineering(ECE)</span><br>
				<input type="checkbox" name="clg_stream[]" id="clg_stream[]" value="Electrical & Electronics Engineering(EEE)" id="clg_stream"><span class="branch-name">Electrical & Electronics Engineering(EEE)</span><br>
				<input type="checkbox" name="clg_stream[]" id="clg_stream[]" value="Electonics Instrumentation(EI)" id="clg_stream"><span class="branch-name">Electonics Instrumentation(EI)</span><br>
				<input type="checkbox" name="clg_stream[]" id="clg_stream[]" value="Electonics & Telecommunication Engineering(ETE)" id="clg_stream"><span class="branch-name">Electonics & Telecommunication Engineering(ETE)</span><br>
				<input type="checkbox" name="clg_stream[]" id="clg_stream[]" value="Fire Tech & Safety Engineering(FTE)" id="clg_stream"><span class="branch-name">Fire Tech & Safety Engineering(FTE)</span><br>
				<input type="checkbox" name="clg_stream[]" id="clg_stream[]" value="Industrial Production(IP)" id="clg_stream"><span class="branch-name">Industrial Production(IP)</span><br>
				<input type="checkbox" name="clg_stream[]" id="clg_stream[]" value="Information Technology(IT)" id="clg_stream"><span class="branch-name">Information Technology(IT)</span><br>
				<input type="checkbox" name="clg_stream[]" id="clg_stream[]" value="Mechanical Engineering(ME)" id="clg_stream"><span class="branch-name">Mechanical Engineering(ME)</span><br>
			<p id="berror"></p>	
		</td>
 	
	
	</tr>
	<tr>
	
		<td> 
			<input type="submit" value="Add College" onclick="return validate()"></td>
		<script>
		function validate(){
			var clg_name = document.getElementById("clg_name").value;
			var clg_addr=document.getElementById("clg_addr").value;
			var  clg_city=document.getElementById("clg_city").value;
			var  clg_pin=document.getElementById("clg_pin").value;
			var  clg_contact=document.getElementById("clg_contact").value;
			var  clg_stream=document.getElementById("clg_stream[]").value;
	
		console.log(clg_stream);
	
			var flag=true;

	
	var chklength = CheckForm();
		if(chklength === 0 )
		{
			document.getElementById("berror").innerHTML="Select AtLeast One Branch";
			flag=false;
		}
		else 
		{
			document.getElementById("berror").innerHTML="";
			
		}
			
	
	 if( clg_name.toString().length === 0 )//|| name.value.match(letters) )
	 {
			
		document.getElementById("nerror").innerHTML="Enter College Name";
			//alert("Confirmation fields do not match, please retype and try again.");
			flag=false;//flag=false;
			//return false;
	}
	else 
	{
			document.getElementById("nerror").innerHTML="";
			
	}

	if(clg_addr.toString().length === 0 )
		{
			document.getElementById("aerror").innerHTML="Enter College Address";
			flag=false;//flag=false;
		}
		else 
		{
			document.getElementById("aerror").innerHTML="";
			
		}
		
		if(clg_city.toString().length === 0 )
		{
			document.getElementById("cierror").innerHTML="Enter College City";
			flag=false;
		}
		else 
		{
			document.getElementById("cierror").innerHTML="";
			
		}
		if(clg_pin.toString().length != 6 )
		{
			document.getElementById("perror").innerHTML="Enter 6 digit Correct Pincode";
			flag=false;
		}
		else 
		{
			document.getElementById("perror").innerHTML="";
			
		}
		
		
		if(clg_contact.toString().length === 0 )
		{
			document.getElementById("conerror").innerHTML="Enter Contact Number";
			flag=false;
		}
		else 
		{
			document.getElementById("conerror").innerHTML="";
			
		}
		
	return flag;
	
	}
	function CheckForm(){
	var checked=false;
	var elements = document.getElementsByName("clg_stream[]");
	var j=0;
	for(var i=0; i < elements.length; i++){
		if(elements[i].checked) {
			checked = true;
			j=j+1;
		}
	}
	return j;
}	
	</script>

		
		
	</tr>
		
	</tbody>
	</table>
	
	</form>
	</div>


	</div>
	</div>
	<div class="row footer">
		
                <div class="col-md-12 cpy-text">
                		<p>CopyRight &copy 2018</p>
                </div>
            </div>
    </div>
		
		
		
	

	
	
	
	
	</div>
	
</body>	
</html>
