<?php session_start();
		include('database_info.php');
		
		$name=$_SESSION["name"];
$_SESSION["name"]=$name;
		$mysql = mysqli_connect("$dbservername", "$dbusername", "$dbpassword", "$dbname");
if($mysql->connect_error)
{
	echo "Not";
	die('Connection not established '. $mysql->connect_error());	
}
		
		
		
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
			border:1px solid black;
		margin-bottom:70px;
		}
		tr,td {
			border:1px solid black;
				width:auto;
				padding:20px 20px;
		}
		
		input[type=text],input[type=email],input[type=password] {
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
			margin:0% 40%;
		}
		.move-text{
			
			font-size:18px;
			margin:0% 0% 0% 25%;
		}
	.form_head,th{
			font-size:23px;
			color:black;
			font-style:bold;
			font-weight:700;
			padding:20px 20px;
			text-align:center;
		}
		td{
			font-size:20px;
			color:black;
			
			
		}
		.profile{
			font-size:20px;
			
		}
		
		
		tr{
			text-align:center;
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
				<li><a href="admin_add_college.php">Add College</a></li>
				<li><a href="admin_add_cutoff.php">Add Cutoff</a></li>
				<li><a href="admin_view_college.php">View College</a></li>
	   			<li><a href="admin_view_cutoff.php">View Cutoff</a></li>
				<li><a href="#">View Student</a></li>
				<li><a href="admin_view_feedback">View Feedback</a></li>
				<li><a href="admin_logout.php">Logout</a></li>
	   			
		</ul>
    
	</div>
	
	</div>	
	<div class="row">
		<div class="col-md-12 student-head">
			<p>View Students</p>
	
		</div>
	
	<div class="col-md-12 student-form">
	
	
	<?php
			

if($mysql->connect_error)
{
	echo "Not";
	die('Connection not established '. $mysql->connect_error());	
}
			
			$i=1;
			
			echo "<br><br>";
			echo  "<table align='center' border='1' >
			<tr>
			<th>S.no.</th>
			<th>Name</th>
			<th>Email</th>
			<th>Date of Birth</th>
			<th>Gender</th>
			<th>Category</th>
			<th>Mobile</th>
			
		</tr>";
	if ($result = $mysql->query("SELECT Name,Email,Gender,Category,DATE_FORMAT(Date_Of_Birth,'%d/%m/%Y') as DOB,Mobile from student_register"))
	{
	if($result->num_rows > 0)
	{
	while($row=$result->fetch_assoc())
	{
		$x=$row['Name'];
		if($x!="Admin")
		{
		echo "<tr>
				<td>".$i.".</td>
				<td>".$row['Name']."</td>
				<td>".$row['Email']."</td>
				<td>".$row['DOB']."</td>
				<td>".$row['Gender']."</td>
				<td>".$row['Category']."</td>
				<td>".$row['Mobile']."</td>
			</tr>";
			$i++;
		}
	}

	}
		else{
			
			echo "<p>No Data Found";
		}
	}			echo "</table>";

$mysql->close();
?>
	
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
