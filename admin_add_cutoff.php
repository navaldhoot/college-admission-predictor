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
				width:400px;
				padding:20px 0px;
		}
		
		input[type=text],select,input[type=email],input[type=password],input[type=date],input[type=number] {
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
				<li><a href="#">Add Cutoff</a></li>
				<li><a href="admin_view_college.php">View College</a></li>
	   			<li><a href="admin_view_cutoff.php">View Cutoff</a></li>
				<li><a href="admin_view_student.php">View Student</a></li>
				<li><a href="admin_view_feedback.php">View Feedback</a></li>
				<li><a href="admin_logout.php">Logout</a></li>
		</ul>
    
	</div>
	
	</div>
	
	<div class="row">
		<div class="col-md-12 student-head">
			<p>Add Cutoff</p>
	
		</div>
	
	<form action="add_cutoff.php" method="post">
	
	<div class="col-md-12 student-form">
	
	
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
  <option value="----Select----" selected>----Select----</option>
		<option  value="UR">UR</option>
			<option value="OBC">OBC</option>
  <option value="SC">SC</option>
  <option value="ST">ST</option>
</select><p id="cerror"></p></td>
			</tr>
	

	<tr>	
	<td class="form_head">Opening Rank</td>
	<td><input type="number" name="clg_opn_rank" id="clg_opn_rank" placeholder="Opening Rank">
		<p id="opnerror"></p></td>	</tr>
	
	<tr>
	<tr>	
	<td class="form_head">Closing Rank</td>
	<td><input type="number" name="clg_cls_rank" id="clg_cls_rank" placeholder="Closing Rank">
		<p id="clserror"></p></td>	</tr>
	
	<tr>
	
		<td> 
			<input type="submit" value="Add Cutoff" onclick="return validate()" ></td>
			<script>
		function validate(){
			var clg_name = document.getElementById("clg_name").value;
			var branch=document.getElementById("branch_name").value;
			var category=document.getElementById("category").value;
			var  year=document.getElementById("year").value;
			var  open_rank=document.getElementById("clg_opn_rank").value;
			var  close_rank=document.getElementById("clg_cls_rank").value;
	
			console.log(clg_name);
	
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

	 if( category.toString() === "----Select----" )
	 {
			
		document.getElementById("cerror").innerHTML="Select Category";
			flag=false;
	}
	else 
	{
			document.getElementById("cerror").innerHTML="";
			
	}

	if(open_rank.toString().length === 0 )
		{
			document.getElementById("opnerror").innerHTML="Enter Opening Rank";
			flag=false;
		}
		else 
		{
			document.getElementById("opnerror").innerHTML="";
			
		}
		
		
		if(close_rank.toString().length === 0 )
		{
			document.getElementById("clserror").innerHTML="Enter Closing Rank";
			flag=false;
		}
		else 
		{
			document.getElementById("clserror").innerHTML="";
			
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
	<div class="row footer">
		
                <div class="col-md-12 cpy-text">
                		<p>CopyRight &copy 2018</p>
                </div>
            </div>
    </div>
		
		
		
	

	
	
	
	
	</div>
	
</body>	
</html>
