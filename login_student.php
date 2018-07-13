<?php 
	session_start();
	
	include('database_info.php');
	
	$mysql = mysqli_connect("$dbservername", "$dbusername", "$dbpassword", "$dbname");
	
	$email=$_POST["stu_email"];
	$password=$_POST["stu_pswd"];


if($mysql->connect_error)
{
	echo "Not";
	die('Connection not established '. $mysql->connect_error());	
}

$sql="SELECT AES_DECRYPT(Password,'secret') AS 'Password' from student_register where Email='$email'";


		$qry = mysqli_query($mysql,$sql) ;
		//or die(mysql_error($mysql));	
		//echo "Hiii";
		
		if (!$qry) {	
		//echo "Hiiiii";
				echo "Email Not Exist";
				printf("Errormessage: %s\n", mysqli_error($conn));
		}
		/*if($qry -> )
		{
			die(mysqli_error());
			echo "Mobile Number Not Found";
			exit(1);
		}*/
		
		
		while($row = mysqli_fetch_array($qry,MYSQLI_ASSOC))
		{
			//echo "hii";
			
			$x=$row["Password"];
			
			
			if( $x == $password )
			{
			header('refresh:2;url=student_view_profile.php');					
				echo  "Login Sucessfully";
			}
			else
			{
					header('refresh:10;url=student_form.html');
					echo "Email  and Password Not Matches";

			}
			
			
			
			
		}
		//if(!$row){
			//echo "Email Not Found!";
			//header('refresh:5;url=student_form.html');

		//}
		
																											
	$_SESSION["email"]=$email;

/*



if (!$check1_res) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}




*/
?>