<?php session_start();
		include('database_info.php');
		
		$email=$_SESSION["email"];
$_SESSION["email"]=$email;
		$mysql = mysqli_connect("$dbservername", "$dbusername", "$dbpassword", "$dbname");
if($mysql->connect_error)
{
	echo "Not";
	die('Connection not established '. $mysql->connect_error());	
}
$sql="SELECT Name,Email,Gender,Category,DATE_FORMAT(Date_Of_Birth,'%d/%m/%Y') as DOB,Mobile,Rank from student_register where Email='$email'";

		$qry = mysqli_query($mysql,$sql);	
		if (!$qry) {	
		//echo "Hiiiii";	
				printf("Errormessage: %s\n", mysqli_error($conn));
		}
		while($row = mysqli_fetch_array($qry,MYSQLI_ASSOC))
		{

			$name=$row['Name'];
			$email=$row['Email'];
			$mobile=$row['Mobile'];
			$dob=$row['DOB'];
			$category=$row['Category'];
			$gender=$row['Gender'];
			$rank=$row['Rank'];
			
			
			
		}
		
		
		
		$mysql->close();
		
		
		
		
		
	
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
				width:400px;
				padding:20px 0px;
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
	.form_head{
			font-size:23px;
			color:black;
			font-style:bold;
			font-weight:500;
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
				<li><a href="#">View Profile</a></li>
				<li><a href="student_predict_college.php">Predict College </a></li>
				<li><a href="student_feedback.php">Give Feedback</a></li>
	   			<li><a href="student_logout.php">Logout</a></li>
	   			
		</ul>
    
	</div>
	
	</div>	
	<div class="row">
		<div class="col-md-12 student-head">
			<p>Student Profile</p>
	
		</div>
	
	<div class="col-md-12 student-form">
	
	
	<table align="center">
	<tbody>
	
	<tr>	
	<td class="form_head">Name</td>
	<td class="profile"><?php echo $name;?></td>
			</tr>
	
	

	<tr>	
	<td class="form_head">Date of Birth</td>
	<td class="profile"><?php echo $dob;?></td>
			</tr>


	<tr>	
	<td class="form_head">Email</td>
	<td class="profile"><?php echo $email;?></p>
	</td>
			</tr>

<tr>	<td class="form_head">Category</td>
	<td class="profile"><?php echo $category;?></td>

</tr>
<tr>	<td class="form_head">Gender</td>
	<td class="profile"><?php echo $gender;?></td>

</tr>
	<tr>	
	<td class="form_head">Mobile Number</td>
	<td class="profile"><?php echo $mobile;?></td>
			</tr>
	
	<tr>	
	<td class="form_head">JEE Main Rank</td>
	<td class="profile"><?php echo $rank;?></td>
			</tr>
		
	</tbody>
	</table>
	
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
