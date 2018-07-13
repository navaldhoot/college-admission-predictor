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
//border:1px solid black;
		margin-bottom:70px;
		width:auto!important;
		}
			tr,td {
	//		border:1px solid black;
				width:400px;
				padding:20px 20px;
		}
		
		
		select,input[type=text],input[type=email],input[type=password] {
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
			margin:0% 0% 0% 80%;
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
	<div class="row ">
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
				<li><a href="student_view_profile.php">View Profile</a></li>
				<li><a href="#">Predict College </a></li>
				<li><a href="student_feedback.php">Give Feedback</a></li>
	   			<li><a href="student_logout.php">Logout</a></li>
	   			   			
		</ul>
    
	</div>
	
	</div>











	
	<div class="row">
		<div class="col-md-12 student-head">
			<p>Predict College</p>
	
		</div>
	<form action="#" method="post">
	
	<div class="col-md-12 student-form">
	
		<div id="form-table">
		<table align="center">
	<tbody>
	<tr>	
	<td class="form_head">City</td>
	<td><select name="city" id="city" >
  <option value="----Select----" selected>----Select----</option>
	<!--</select></td>
			</tr>-->
<?php	//$sql = "SELECT distinct College_Name FROM college_list";

//echo "<td>";
//echo "<select name='clg_name' id='clg_name' onchange=".branch().">";
//echo "<option value='----Select----' selected>----Select----</option>";
if ($result = $mysql->query("SELECT distinct City from college_list"))
	{
	if($result->num_rows > 0)
	{
	while($row=$result->fetch_assoc())
	{
		echo "<option value='" . $row['City'] ."'>" . $row['City'] ."</option>";
}
	}
	}
//echo "</select>";
//echo "</td>";


	?>
</select>
	<p id="cityerror"></p>
	</td>
	</tr>
	<tr>	
	<td class="form_head">Branch</td>
<td><select name="branch_name" id="branch_name">
  <option value="----Select----" selected>----Select----</option>
	<!--</select></td>
-->

<?php 
	
	//echo "hiiiiiiii";	
//	echo "<td>";
	//echo "<select name='clg_name' id='clg_name'>";
	//echo "<option value='----Select----' selected>----Select----</option>";
	//$a = '<script>document.write(a)</script>';
	//echo $a;

	
if ($result = $mysql->query("SELECT distinct Branch from college_branch")) //where College_Name='$a'"))
	{
		//echo "Hiiii";
	if($result->num_rows > 0)
	{
	while($row=$result->fetch_assoc())
	{
		echo "<option value='" . $row['Branch'] ."'>" . $row['Branch'] ."</option>";
}
	}
	}
//echo "</select>";
//echo "</td>";
		
		
	//}
	
?>
	</select>
<p id="berror"></p>
</td></tr>
	<!--<tr>	
	<td class="form_head">Year</td>
	<td><select name="year" id="year">
  <option value="----Select----" selected>----Select----</option>
  <option value="2017">2017</option>  
	</select><p id="yerror"></p></td>
			</tr>
-->
	<tr>	
	<td class="form_head">Category</td>
	<td><select name="category" id="category">
  <option value="----Select----" selected>----Select----</option>
		<option  value="UR">UR</option>
			<option value="OBC">OBC</option>
  <option value="SC">SC</option>
  <option value="ST">ST</option>
</select><p id="cerror"></p></td>
			</tr>

	<tr>
	
		<td> 
			<input type="submit" value="View Cutoff" name="View_Cutoff" onclick="return validate()" ></td>
			<script>
		function validate(){
			var city = document.getElementById("city").value;
			var branch=document.getElementById("branch_name").value;
			var category=document.getElementById("category").value;
			var flag=true;

	
			
	
	if( city.toString() === "----Select----" )
	 {
			
		document.getElementById("cityerror").innerHTML="Select City";
			flag=false;//flag=false;
	}
	else 
	{
			document.getElementById("cityerror").innerHTML="";
			
	}
	
if( category.toString() === "----Select----" )
	 {
			
		document.getElementById("cerror").innerHTML="Select Category";
			flag=false;//flag=false;
	}
	else 
	{
			document.getElementById("cerror").innerHTML="";
			
	}
	
	 if( branch.toString() === "----Select----" )
	 {
			
		document.getElementById("berror").innerHTML="Select Branch";
			flag=false;//flag=false;
	}
	else 
	{
			document.getElementById("berror").innerHTML="";
			
	}
	return flag;
	
	}
	</script>
		
	</tr>
		
	</tbody>
	</table>
	
	</form>
	</div>
</div>

	</div>
			

		



















	<?php
 if(isset($_POST['View_Cutoff'])){
       
	    $branch_name=$_POST["branch_name"];
	$city=$_POST["city"];
	$category=$_POST["category"];
	$i=0;
	
	
	
	
	//echo "$branch_name\n$city\n$category";
	
	
	
	
 $year= date("Y") - 1 ;
 //echo "$year\n";
if($mysql->connect_error)
{
	echo "Not";
	die('Connection not established '. $mysql->connect_error());	
}
	

	
$final_rank="";
$query = "SELECT Rank FROM student_register WHERE Email = '$email' ";
$rank_result=mysqli_query($mysql,$query);
			
if($rank_result)
{
    while($row = mysqli_fetch_array($rank_result))
    {
        $final_rank= $row['Rank'];
    }
} else {
    echo 'Invalid query: ' . mysqli_error() . "\n";
}			

//echo "$final_rank";	

			$i=1;
			echo "<div class='student-head'>";
			echo "<p>College List</p>";
			echo "</div><br><br>";
			echo  "<table align='center' border='1' style='margin:30px' >
			<tr>
			<th>S.no.</th>
			<th>College Name</th>
			<th>Address</th>
			<th>City</th>
			<th>Pincode</th>
			<th>Contact Number</th>
			<th>Branch</th>
			
		</tr>";
	
	
	$sql= "SELECT C.College_Name AS Clg,C.Opening_Rank As First,C.Closing_Rank As Last from college_cutoff AS C,college_list as L  where (C.College_Name = L.College_Name AND L.City = '$city' AND C.Year = '2017' AND C.Category='$category' AND C.Branch='$branch_name' )";

		
	if ($result = $mysql->query($sql))
	{
//		echo "Hiii query2\n";
	
	if($result->num_rows > 0)
	{
	//	echo "Hiii query3\n";
	
	while($row=$result->fetch_assoc())
	{
		//echo "Hiii query4\n";
	
		$predicted_clg = $row['Clg'];
		$open = $row['First'];
		$close = $row['Last'];

		/*echo "$predicted_clg\n";
		echo "$open\n";
		echo "$close\n\n";*/
		if($final_rank >= $open && $final_rank <= $close  )
		{
			$college_query = "SELECT * FROM college_list WHERE College_Name = '$predicted_clg' ";
			$college_result=mysqli_query($mysql,$college_query);
			
			if($college_result)
			{
				while($row = mysqli_fetch_array($college_result))
				{
				echo "<tr>
					<td>".$i.".</td>
					<td>".$row['College_Name']."</td>
					<td>".$row['Address']."</td>
					<td>".$row['City']."</td>
					<td>".$row['Pincode']."</td>
					<td>".$row['Contact_Number']."</td>
					<td>".$branch_name."</td>
					</tr>";
					$i++;
				}
			} else {
					echo 'Invalid query: ' . mysqli_error() . "\n";
					}			
				
		}
		else{
			if($i<=1)	
			{	
				echo "<p style='color:black;font-size:20px;padding:120px 0px 0px 120px;position:absolute;'>No College Found</p>";
			}
		}
			
















		
	}

	}
	else{
					echo "<p style='color:black;font-size:20px;margin-top:100px;'>No Data Found</p>";
		}
	}			echo "</table>";
   }
   
   
   
$mysql->close();
?>
	
	</div>
	</div>
	<div style="height:150px;">
	
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
