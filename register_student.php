<?php	//session_start();
		include('database_info.php');
$mysql = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

	$name=$email=$mobile=$rank=$dob=$gender=$category=$password="";
	$name=$_POST["stu_name"];
	$email=$_POST["stu_email"];
	$mobile=$_POST["stu_mobile"];
	$rank=$_POST["stu_rank"];
	$dob=$_POST["stu_date"];
	$gender=$_POST["gender"];
	$category=$_POST["category"];
	$password = $_POST["stu_pswd"];
	
	
	//$encrypt_pswd = AES_ENCRYPT($password,'secret');
/*	$password = md5($_POST["password"]);
*/


$sql= "INSERT INTO student_register( Name, Email, Gender, Category, Date_Of_Birth, Mobile, Rank, Password) 
            VALUES ('$name', '$email', '$gender', '$category','$dob','$mobile', '$rank', AES_ENCRYPT('$password','secret'))";


			
			
	
//$sql1="INSERT INTO login( Mobile, Password) VALUES ('$mobile',AES_ENCRYPT('$password','secret'))";


//$sql2="INSERT INTO Services(Service_Name,Amount(in BitCoin)) VALUES ('Parking','0'),('Flight','0'),('Movie','0'),('Recharge','0')";



if($mysql->query($sql)  ===  TRUE  )//&&  $mysql->query($sql1)  ===  TRUE )//&& $mysql->query($sql2)  ===  TRUE)
{
	header('refresh:5;url=student_form.html');
	echo "<h3>Data entered successfully</h3><br/><br/>";
	echo "<h1>Thank You!</h1><br/><br/>";
	echo "You will be redirected in 5 seconds!";
}
else
{
echo "Error:". $sql ."<br/>". $mysql->error;
}

	


$mysql->close();


?>
