<?php	session_start();
		include('database_info.php');
$mysql = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

	$email=$_SESSION["email"];
$_SESSION["email"]=$email;
	
	
	$feedback=$_POST["feedback"];
	
	//$encrypt_pswd = AES_ENCRYPT($password,'secret');
/*	$password = md5($_POST["password"]);
*/


$sql= "INSERT INTO student_feedback(  Email, Feedback) 
            VALUES ('$email', '$feedback')";


			
			
	
//$sql1="INSERT INTO login( Mobile, Password) VALUES ('$mobile',AES_ENCRYPT('$password','secret'))";


//$sql2="INSERT INTO Services(Service_Name,Amount(in BitCoin)) VALUES ('Parking','0'),('Flight','0'),('Movie','0'),('Recharge','0')";



if($mysql->query($sql)  ===  TRUE  )//&&  $mysql->query($sql1)  ===  TRUE )//&& $mysql->query($sql2)  ===  TRUE)
{
	header('refresh:5;url=student_view_profile.php');
	echo "<h3>Feedback Saved Successfully.</h3><br/><br/>";
	echo "<h1>Thank You!</h1><br/><br/>";
	echo "You will be redirected in 2 seconds!";
}
else
{
echo "Error:". $sql ."<br/>". $mysql->error;
}

	


$mysql->close();


?>
