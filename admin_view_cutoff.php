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
				<li><a href="admin_add_college.php">Add College</a></li>
				<li><a href="admin_add_cutoff.php">Add Cutoff</a></li>
				<li><a href="admin_view_college.php">View College</a></li>
				<li><a href="#">View Cutoff</a></li>
				<li><a href="admin_view_student.php">View Student</a></li>
				<li><a href="admin_view_feedback">View Feedback</a></li>
				<li><a href="admin_logout.php">Logout</a></li>
	   			
		</ul>
    
	</div>
	
	</div>











	
	<div class="row">
		<div class="col-md-12 student-head">
			<p>View Cutoff</p>
	
		</div>
	<form action="#" method="post">
	
	<div class="col-md-12 student-form">
	
		<div id="form-table">
		<table align="center">
	<tbody>
	<tr>	
	<td class="form_head">College Name</td>
	<td><select name="clg_name" id="clg_name" >
  <option value="----Select----" selected>----Select----</option>
	<!--</select></td>
			</tr>-->
<?php	//$sql = "SELECT distinct College_Name FROM college_list";

//echo "<td>";
//echo "<select name='clg_name' id='clg_name' onchange=".branch().">";
//echo "<option value='----Select----' selected>----Select----</option>";
if ($result = $mysql->query("SELECT distinct College_Name from college_branch"))
	{
	if($result->num_rows > 0)
	{
	while($row=$result->fetch_assoc())
	{
		echo "<option value='" . $row['College_Name'] ."'>" . $row['College_Name'] ."</option>";
}
	}
	}
//echo "</select>";
//echo "</td>";


	?>
</select>
	<p id="nerror"></p>
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
	<tr>	
	<td class="form_head">Year</td>
	<td><select name="year" id="year">
  <option value="----Select----" selected>----Select----</option>
  <option value="2017">2017</option>  
	</select><p id="yerror"></p></td>
			</tr>

	<tr>	
	<td class="form_head">Category</td>
	<td><select name="category" id="category">
  <option value="All" selected>All</option>
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
			var clg_name = document.getElementById("clg_name").value;
			var branch=document.getElementById("branch_name").value;
			var year=document.getElementById("year").value;
			var flag=true;

	
			
	
	if( clg_name.toString() === "----Select----" )
	 {
			
		document.getElementById("nerror").innerHTML="Select College Name";
			flag=false;//flag=false;
	}
	else 
	{
			document.getElementById("nerror").innerHTML="";
			
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
		if( year.toString() === "----Select----" )
	 {
			
		document.getElementById("yerror").innerHTML="Select Year";
			flag=false;
	 }
	else 
	{
			document.getElementById("yerror").innerHTML="";
			
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
       
	   $clg_name = $_POST["clg_name"];
        $branch_name=$_POST["branch_name"];
	$year=$_POST["year"];
	$category=$_POST["category"];
	

			
			
if($mysql->connect_error)
{
	echo "Not";
	die('Connection not established '. $mysql->connect_error());	
}
			
			$i=1;
			echo "<div class='student-head'>";
			echo "<p>Cutoff List</p>";
			echo "</div><br><br>";
			echo  "<table align='center' border='1' style='margin:30px' >
			<tr>
			<th>S.no.</th>
			<th>College Name</th>
			<th>Branch</th>
			<th>Year</th>
			<th>Category</th>
			<th>Opening Rank</th>
			<th>Closing Rank</th>
			
		</tr>";
		
if($category == "All")
{
	$sql= "SELECT * from college_cutoff where (College_Name = '$clg_name' AND Branch = '$branch_name' AND Year = '$year')";
}	
else {
	$sql= "SELECT * from college_cutoff where (College_Name = '$clg_name' AND Branch = '$branch_name' AND Year = '$year' AND Category = '$category')";
}	

		
	if ($result = $mysql->query($sql))
	{
	if($result->num_rows > 0)
	{
	while($row=$result->fetch_assoc())
	{
		echo "<tr>
				<td>".$i.".</td>
				<td>".$row['College_Name']."</td>
				<td>".$row['Branch']."</td>
				<td>".$row['Year']."</td>
				<td>".$row['Category']."</td>
				<td>".$row['Opening_Rank']."</td>
				<td>".$row['Closing_Rank']."</td>
			</tr>";
			$i++;
		
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
